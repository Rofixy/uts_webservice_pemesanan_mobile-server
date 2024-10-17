<?php

namespace App\Controllers;

use App\Models\PemesananMobilModel;
use CodeIgniter\RESTful\ResourceController;

class PemesananMobil extends ResourceController
{
    protected $pemesananMobilModel;

    public function __construct()
    {
        // Memastikan model PemesananMobilModel diinisialisasi dengan benar
        $this->pemesananMobilModel = new PemesananMobilModel();
    }

    // Menampilkan semua data pemesanan mobil
    public function index()
    {
        $data_pemesanan_mobil = $this->pemesananMobilModel->findAll();
        return $this->respond($data_pemesanan_mobil, 200)->setContentType('application/json');
    }

    // Membuat pemesanan mobil baru
    public function create()
    {
        $input_data = $this->request->getJSON(true);
        if ($input_data) {
            $data = [
                'id_mobil'          => $input_data['id_mobil'] ?? '',
                'id_customer'       => $input_data['id_customer'] ?? '',
                'id_sopir'          => $input_data['id_sopir'] ?? '',
                'tanggal_mulai'     => $input_data['tanggal_mulai'] ?? '',
                'tanggal_selesai'   => $input_data['tanggal_selesai'] ?? '',
                'total_harga'       => $input_data['total_harga'] ?? '',
                'status_pemesanan'  => $input_data['status_pemesanan'] ?? ''
            ];

            if ($this->pemesananMobilModel->insert($data)) {
                return $this->respondCreated([
                    'status' => 'success',
                    'message' => 'Pemesanan Mobil berhasil ditambahkan'
                ])->setContentType('application/json');
            } else {
                return $this->fail('Gagal menambah pemesanan mobil', 400)->setContentType('application/json');
            }
        } else {
            return $this->fail('Invalid JSON input', 400)->setContentType('application/json');
        }
    }

    // Menampilkan pemesanan mobil berdasarkan ID
    public function show($id = null)
    {
        $pemesanan_mobil = $this->pemesananMobilModel->find($id);

        if ($pemesanan_mobil) {
            return $this->respond($pemesanan_mobil)->setContentType('application/json');
        } else {
            return $this->failNotFound('Pemesanan Mobil tidak ditemukan')->setContentType('application/json');
        }
    }

    // Mengambil data pemesanan mobil
    public function getPemesananMobil()
    {
        // Mengambil data pemesanan mobil
        $dataPemesananMobil = $this->pemesananMobilModel->getPemesananMobil(); // Menggunakan metode dari model

        // Mengembalikan data dalam format JSON
        return $this->respond($dataPemesananMobil, 200);
    }



    // Memperbarui pemesanan mobil
    public function update($id = null)
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $data = [
                'id_mobil'          => $input_data['id_mobil'] ?? '',
                'id_customer'       => $input_data['id_customer'] ?? '',
                'id_sopir'          => $input_data['id_sopir'] ?? '',
                'tanggal_mulai'     => $input_data['tanggal_mulai'] ?? '',
                'tanggal_selesai'   => $input_data['tanggal_selesai'] ?? '',
                'total_harga'       => $input_data['total_harga'] ?? '',
                'status_pemesanan'  => $input_data['status_pemesanan'] ?? ''
            ];

            if ($this->pemesananMobilModel->update($id, $data)) {
                return $this->respond(['status' => 'success', 'message' => 'Pemesanan Mobil berhasil diperbarui'], 200)->setContentType('application/json');
            } else {
                return $this->fail('Gagal memperbarui pemesanan mobil', 400)->setContentType('application/json');
            }
        } else {
            return $this->fail('Invalid JSON input', 400)->setContentType('application/json');
        }
    }

    // Menghapus pemesanan mobil
    public function delete($id = null)
    {
        if ($this->pemesananMobilModel->delete($id)) {
            return $this->respondDeleted(['status' => 'success', 'message' => 'Pemesanan Mobil berhasil dihapus'])->setContentType('application/json');
        } else {
            return $this->fail('Gagal menghapus Pemesanan Mobil', 400)->setContentType('application/json');
        }
    }
}
