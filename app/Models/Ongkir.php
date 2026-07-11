<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    protected $table = 'ongkir';
    protected $primaryKey = 'id_ongkir';
    public $timestamps = false;

    protected $fillable = [
        'id_kota_tujuan',
        'tarif_flat',
    ];

    public static function getTarif(string $idKotaTujuan): int
    {
        $ongkir = self::where('id_kota_tujuan', $idKotaTujuan)->first();
        return $ongkir ? $ongkir->tarif_flat : 45000;
    }
}
