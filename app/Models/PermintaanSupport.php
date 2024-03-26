<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanSupport extends Model
{
    use HasFactory;

    protected $fillable = ['detail_support','pembuat' ,'tgl_dibuat','tgl_harus_selesai', 'tgl_selesai','status'];
}
