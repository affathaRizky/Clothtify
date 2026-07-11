<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'detail_pemesanan';
    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_pemesanan',
        'id_produk',
        'id_provinsi',
        'id_kota',
        'id_kecamatan',
        'nama_pembeli',
        'detail_alamat',
        'size_produk',
        'jumlah_produk',
        'metode_pengantaran',
        'metode_pembayaran',
        'subtotal',
        'ongkir',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}