<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\RequestException;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Support\Str;
use DateTime;
use DateTimeZone;

class FetchProduk extends Command
{
    protected $signature = 'fastprint:fetch';
    protected $description = 'Fetch data produk dari API FastPrint';

    public function handle()
    {
        $now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

        $day   = $now->format('d');
        $month = $now->format('m');
        $year  = $now->format('y');
        $hour  = (int) $now->format('H');
        $date  = $now->format('dmy');

        // kandidat password (hari ini, kemarin, besok)
        $passwordCandidates = [
            "bisacoding-$day-$month-$year",
            "bisacoding-" . str_pad($day - 1, 2, '0', STR_PAD_LEFT) . "-$month-$year",
            "bisacoding-" . str_pad($day + 1, 2, '0', STR_PAD_LEFT) . "-$month-$year",
        ];

        // toleransi perbedaan jam server
        $hourCandidates = [];
        for ($i = -2; $i <= 2; $i++) {
            $h = $hour + $i;
            if ($h >= 0 && $h <= 23) {
                $hourCandidates[] = str_pad($h, 2, '0', STR_PAD_LEFT);
            }
        }

        $client = new Client([
            'cookies' => new CookieJar(),
            'timeout' => 20,
        ]);

        $responseData = null;

        foreach ($passwordCandidates as $plainPassword) {
            $hashedPassword = md5($plainPassword);

            foreach ($hourCandidates as $h) {
                $username = "tesprogrammer{$date}C{$h}";

                try {
                    $response = $client->post(
                        'https://recruitment.fastprint.co.id/tes/api_tes_programmer',
                        [
                            'form_params' => [
                                'username' => $username,
                                'password' => $hashedPassword,
                            ],
                            'headers' => [
                                'Accept' => 'application/json',
                                'User-Agent' => 'Mozilla/5.0',
                            ],
                        ]
                    );

                    $json = json_decode((string) $response->getBody(), true);

                    if (!empty($json) && ($json['error'] ?? 1) === 0) {
                        $this->info("Login berhasil menggunakan {$username}");
                        $responseData = $json['data'] ?? [];
                        break 2;
                    }
                } catch (RequestException $e) {
                    $this->error(" Request error: " . $e->getMessage());
                }
            }
        }

        if (!$responseData) {
            $this->error('Gagal mendapatkan data dari API.');
            return Command::FAILURE;
        }

        $this->info('Menyimpan data produk...');
        $total = 0;

        foreach ($responseData as $item) {
            if (empty($item['nama_produk'])) {
                continue;
            }

            $kategori = Kategori::firstOrCreate(
                ['nama_kategori' => trim($item['kategori'] ?? '-')],
                ['id_kategori' => (string) Str::uuid()]
            );

            $status = Status::firstOrCreate(
                ['nama_status' => trim($item['status'] ?? '-')],
                ['id_status' => (string) Str::uuid()]
            );

            Produk::updateOrCreate(
                ['nama_produk' => trim($item['nama_produk'])],
                [
                    'harga'       => $item['harga'] ?? 0,
                    'kategori_id' => $kategori->id_kategori,
                    'status_id'   => $status->id_status,
                ]
            );

            $total++;
        }

        $this->info("Selesai. Total produk diproses: {$total}");

        return Command::SUCCESS;
    }
}
