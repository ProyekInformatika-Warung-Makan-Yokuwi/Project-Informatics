<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\AdminModel;

class Admin extends BaseController
{
    // ✅ Halaman utama kelola menu
    public function kelolaMenu()
    {
        // Hanya admin yang boleh
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        $menuModel = new MenuModel();
        $data = [
            'title' => 'Kelola Menu',
            'menuList' => $menuModel->findAll(),
        ];

        return view('kelola_menu', $data);
    }

    // ✅ Halaman daftar admin
    public function daftarLogin()
    {
        // Cek jika hanya admin yang dapat mengakses
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        // Mengambil data admin dari model
        $adminModel = new AdminModel();
        
        // Ambil data session untuk status login dan informasi pengguna
        $isLoggedIn = session()->get('isLoggedIn');
        $username = session()->get('username'); // Mengambil username dari session
        $role = session()->get('role');
        $email = session()->get('email'); // Ambil email dari session

        // Mengirim data ke view
        $data = [
            'title' => 'Daftar Akun Admin',
            'admins' => $adminModel->getAllAdmins(),
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'email' => $email
        ];

        return view('daftar_login', $data);
    }

    // ✅ Halaman edit menu
    public function editMenu($idMenu)
    {
        $menuModel = new MenuModel();
        $menu = $menuModel->find($idMenu);

        if (!$menu) {
            return redirect()->to('/admin/kelola-menu')->with('error', 'Menu tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Menu',
            'menu' => $menu,
        ];

        return view('kelola_menu_edit', $data);
    }

    // ✅ Proses update menu
    public function updateMenu($idMenu)
    {
        $menuModel = new MenuModel();

        $data = [
            'namaMenu' => $this->request->getPost('namaMenu'),
            'hargaMenu' => $this->request->getPost('hargaMenu'),
        ];

        // Upload gambar baru jika ada
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $newName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'images', $newName);
            $data['gambar'] = $newName;
        }

        $menuModel->update($idMenu, $data);
        return redirect()->to('/admin/kelola-menu')->with('success', 'Menu berhasil diperbarui!');
    }

    // ✅ Hapus menu
    public function deleteMenu($idMenu)
    {
        $menuModel = new MenuModel();
        $menuModel->delete($idMenu);
        return redirect()->to('/admin/kelola-menu')->with('success', 'Menu berhasil dihapus!');
    }

    // ✅ Form tambah menu baru
    public function tambahMenu()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak');
        }

        $data = [
            'title' => 'Tambah Menu Baru'
        ];

        return view('kelola_menu_tambah', $data);
    }

    // ✅ Proses simpan menu baru
    public function simpanMenu()
    {
        $menuModel = new MenuModel();

        $namaMenu = $this->request->getPost('namaMenu');
        $hargaMenu = $this->request->getPost('hargaMenu');
        $gambar = $this->request->getFile('gambar');

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $newName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'images', $newName);
        } else {
            $newName = 'default.jpg';
        }

        $menuModel->insert([
            'namaMenu' => $namaMenu,
            'hargaMenu' => $hargaMenu,
            'gambar' => $newName
        ]);

        return redirect()->to('/admin/kelola-menu')->with('success', 'Menu baru berhasil ditambahkan!');
    }
}
