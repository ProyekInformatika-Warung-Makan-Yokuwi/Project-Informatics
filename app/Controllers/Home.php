<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Selamat Datang di Warung Makan Yokuwi';
        return view('home', $data);
    }

    /**
     * --> TAMBAHKAN FUNGSI INI <--
     * Fungsi ini akan dipanggil oleh Routes untuk menampilkan halaman login.
     */
    public function login()
    {
        $data['title'] = 'Login Admin';
        return view('halaman_login', $data);
    }
}