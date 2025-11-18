<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\AdminModel;

class Admin extends BaseController
{
    // =========================
    // HALAMAN KELOLA MENU
    // =========================
    public function kelolaMenu()
    {
        // ❗ Admin dan pemilik boleh akses
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        $menuModel = new MenuModel();
        $data = [
            'title' => 'Kelola Menu',
            'menuList' => $menuModel->findAll(),
        ];

        return view('kelola_menu', $data);
    }

    // =========================
    // HALAMAN INFORMASI AKUN
    // =========================
    public function daftarLogin()
    {
        // ❗ HANYA pemilik yang boleh akses
        if (session()->get('role') !== 'pemilik') {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki izin mengakses halaman ini.');
        }

        $adminModel = new AdminModel();

        $data = [
            'title' => 'Daftar Akun Admin',
            'admins' => $adminModel->getAllAdmins(),
            'isLoggedIn' => session()->get('isLoggedIn'),
            'username'   => session()->get('username'),
            'role'       => session()->get('role'),
            'email'      => session()->get('email')
        ];

        return view('daftar_login', $data);
    }

    // =========================
    // EDIT MENU
    // =========================
    public function editMenu($idMenu)
    {
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        $menuModel = new MenuModel();
        $menu = $menuModel->find($idMenu);

        if (!$menu) {
            return redirect()->to('/admin/kelola-menu')->with('error', 'Menu tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Menu',
            'menu'  => $menu,
        ];

        return view('kelola_menu_edit', $data);
    }

    // =========================
    // UPDATE MENU
    // =========================
    public function updateMenu($idMenu)
    {
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        $menuModel = new MenuModel();

        $data = [
            'namaMenu'  => $this->request->getPost('namaMenu'),
            'hargaMenu' => $this->request->getPost('hargaMenu'),
        ];

        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $newName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'images', $newName);
            $data['gambar'] = $newName;
        }

        $menuModel->update($idMenu, $data);
        return redirect()->to('/admin/kelola-menu')->with('success', 'Menu berhasil diperbarui!');
    }

    // =========================
    // HAPUS MENU
    // =========================
    public function deleteMenu($idMenu)
    {
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        $menuModel = new MenuModel();
        $menuModel->delete($idMenu);

        return redirect()->to('/admin/kelola-menu')->with('success', 'Menu berhasil dihapus!');
    }

    // =========================
    // TAMBAH MENU BARU
    // =========================
    public function tambahMenu()
    {
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        return view('kelola_menu_tambah', ['title' => 'Tambah Menu Baru']);
    }

    // =========================
    // SIMPAN MENU BARU
    // =========================
    public function simpanMenu()
    {
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        $menuModel = new MenuModel();
        $namaMenu  = $this->request->getPost('namaMenu');
        $hargaMenu = $this->request->getPost('hargaMenu');

        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'images', $newName);
        } else {
            $newName = 'default.jpg';
        }

        $menuModel->insert([
            'namaMenu'  => $namaMenu,
            'hargaMenu' => $hargaMenu,
            'gambar'     => $newName
        ]);

        return redirect()->to('/admin/kelola-menu')->with('success', 'Menu baru berhasil ditambahkan!');
    }
}
