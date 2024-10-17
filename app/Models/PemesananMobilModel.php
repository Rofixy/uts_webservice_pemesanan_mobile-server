<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananMobilModel extends Model
{
    protected $table = 'pemesanan_mobil'; // Nama tabel
    protected $primaryKey = 'id_pemesanan'; // Primary key
    protected $allowedFields = [
        'id_pemesanan',
        'id_mobil',
        'id_customer',
        'id_sopir',
        'tanggal_mulai',
        'tanggal_selesai',
        'total_harga',
        'status_pemesanan'
    ];

    // Method untuk mengambil semua data pemesanan mobil
    public function getPemesananMobil()
    {    
        return $this->findAll();
    }

    // Method untuk mengambil data pemesanan mobil berdasarkan ID
    public function getPemesananMobilById($id)
    {
        return $this->find($id);
    }

    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
    public function savePemesananMobil($data)
    {
        return $this->save($data);
    }

    // Method untuk memperbarui data pemesanan mobil berdasarkan ID
    public function updatePemesananMobil($id, $data)
    {
        return $this->update($id, $data);
    }

    // Method untuk menghapus data pemesanan mobil berdasarkan ID
    public function deletePemesananMobil($id)
    {
        return $this->delete($id);
    }
}
