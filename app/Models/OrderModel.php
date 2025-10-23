<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'idOrder';
    protected $allowedFields = [
        'idMenu', 'namaMenu', 'hargaMenu', 'qty', 'total',
        'metode', 'status_pembayaran', 'tanggal'
    ];
}
