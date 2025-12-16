<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\PesananModel;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Selamat Datang di Warung Makan Yokuwi';
        return view('home', $data);
    }

    public function login()
    {
        $data['title'] = 'Login Admin';
        return view('halaman_login', $data);
    }

    public function daftar_login()
    {
        $data['title'] = 'daftar_login';
        return view('daftar_login', $data);
    }

    public function kelolaMenu()
    {
        $menuModel = new MenuModel();
        $data['menuList'] = $menuModel->findAll();
        $data['title'] = 'Kelola Menu Yokuwi';

        return view('menu', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // hapus semua data session

        return redirect()->to('halaman_login')->with('success', 'Anda berhasil logout.');
    }

    public function home()
    {
        return $this->index();
    }

    public function riwayatPesanan()
{
    $session = session();

    if (!$session->get('isLoggedIn')) {
        return redirect()->to('halaman_login');
    }

    $pesananModel = new PesananModel();

    // Ambil pesanan (opsional: filter by user jika ada idUser)
    $data['pesanan'] = $pesananModel
        ->orderBy('waktuPemesanan', 'DESC')
        ->findAll();

    $data['title'] = 'Riwayat Pesanan';

    return view('riwayat_pesanan', $data);
}
}

