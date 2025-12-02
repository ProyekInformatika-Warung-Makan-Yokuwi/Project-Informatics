<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'idPesanan';
    protected $allowedFields = ['idAdmin', 'namaPelanggan', 'nomorTelepon', 'tanggalPemesanan', 'waktuPemesanan', 'metodePembayaran', 'statusPembayaran', 'total'];
}