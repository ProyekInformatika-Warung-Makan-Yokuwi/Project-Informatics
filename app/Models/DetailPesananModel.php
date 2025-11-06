<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPesananModel extends Model
{
    protected $table = 'detailpesanan';
    protected $primaryKey = 'idDetailPesanan';
    protected $allowedFields = ['idPesanan', 'idMenu', 'jumlah', 'hargaTransaksi', 'subTotal'];
}
