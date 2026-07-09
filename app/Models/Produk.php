<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'produk';

    protected $primaryKey = 'id_produk';
    
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'id_kategori',
        'deskripsi',
        'foto_produk',
        'status',
        'stok_s',
        'stok_m',
        'stok_l',
        'stok_xl',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
