<?php
namespace App\Services;

use App\Models\DbConn;

class adminServices {
    
    public function tambahProduk(array $data) {
        $db = new DbConn();
        $conn = $db->getConnection();

        $nama = $data['nama_produk'];
        $harga = $data['harga'];
        $deskripsi = $data['deskripsi'];
        $gambar = $data['gambar'];

        $sql = "INSERT INTO produk (nama_produk, harga, deskripsi, gambar) 
                VALUES ('$nama', '$harga', '$deskripsi', '$gambar')";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close(); 
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
}
?>