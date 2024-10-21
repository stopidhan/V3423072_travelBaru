<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        "nama_paket",
        "deskripsi",
        "harga_total",
        "rating",
        "total_pembelian",
        "destinasi",
        "hotel",
        "transport",
        "layanan_tambahan"
    ];
    protected $casts = [
        'layanan_tambahan' => 'array'
    ];
}
