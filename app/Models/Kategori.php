<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kategori extends Model
{
    use HasUuids;

    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori'];
}
