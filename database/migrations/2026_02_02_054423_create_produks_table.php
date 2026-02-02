<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->uuid('id_produk')->primary();
            $table->string('nama_produk');
            $table->decimal('harga', 15, 2);
            $table->foreignUuid('kategori_id')->constrained('kategoris', 'id_kategori');
            $table->foreignUuid('status_id')->constrained('statuses', 'id_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
