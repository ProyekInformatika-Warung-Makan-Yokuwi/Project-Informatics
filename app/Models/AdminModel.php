<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'password', 'role'];

    // Menambahkan fungsi untuk mengambil semua data admin
    public function getAllAdmins()
    {
        return $this->findAll(); // Mengambil semua data admin dari database
    }
}
