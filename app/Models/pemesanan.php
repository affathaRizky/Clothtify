<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_pembeli',
        'tanggal',
        'total_harga',
        'status',
        'bukti_pembayaran'
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli', 'id_pembeli');
    }

    public function detailPemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }
}