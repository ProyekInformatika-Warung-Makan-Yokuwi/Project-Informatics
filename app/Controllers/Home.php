<?php

namespace App\Controllers;

use App\Models\MenuModel;

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
}
