<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\AdminModel;
use App\Models\NotificationModel;

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
    public function tambahAkun()
{
    if (session()->get('role') !== 'pemilik') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    return view('akun_tambah', [
        'title' => 'Tambah Akun Admin'
    ]);
}
public function simpanAkun()
{
    if (session()->get('role') !== 'pemilik') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    $adminModel = new AdminModel();

    $data = [
        'nama' => $this->request->getPost('nama'),
        'email' => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role' => $this->request->getPost('role')
    ];

    $adminModel->insert($data);

    return redirect()->to('/daftar_login')->with('success', 'Akun berhasil ditambahkan!');
}
public function editAkun($id)
{
    if (session()->get('role') !== 'pemilik') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    $adminModel = new AdminModel();
    $akun = $adminModel->find($id);

    return view('akun_edit', [
        'title' => 'Edit Akun Admin',
        'akun' => $akun
    ]);
}
public function updateAkun($id)
{
    if (session()->get('role') !== 'pemilik') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    $adminModel = new AdminModel();

    $data = [
        'nama' => $this->request->getPost('nama'),
        'email' => $this->request->getPost('email'),
        'role' => $this->request->getPost('role')
    ];

    if ($this->request->getPost('password')) {
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $adminModel->update($id, $data);

    return redirect()->to('/daftar_login')->with('success', 'Akun berhasil diperbarui!');
}
public function hapusAkun($id)
{
    if (session()->get('role') !== 'pemilik') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    $adminModel = new AdminModel();
    $adminModel->delete($id);

    return redirect()->to('/daftar_login')->with('success', 'Akun berhasil dihapus!');
}

    // =========================
    // GET NOTIFICATIONS (AJAX)
    // =========================
    public function getNotifications()
    {
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return $this->response->setJSON(['error' => 'Unauthorized'])->setStatusCode(403);
        }

        $notificationModel = new NotificationModel();
        $notifications = $notificationModel->getUnreadNotifications();
        $count = $notificationModel->getUnreadCount();

        return $this->response->setJSON([
            'notifications' => $notifications,
            'count' => $count
        ]);
    }

    // =========================
    // MARK NOTIFICATION AS READ
    // =========================
    public function markNotificationRead($id)
    {
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return $this->response->setJSON(['error' => 'Unauthorized'])->setStatusCode(403);
        }

        $notificationModel = new NotificationModel();
        $notificationModel->markAsRead($id);

        return $this->response->setJSON(['success' => true]);
    }

    // =========================
    // MARK ALL NOTIFICATIONS AS READ
    // =========================
    public function markAllRead()
    {
        if (!in_array(session()->get('role'), ['admin', 'pemilik'])) {
            return $this->response->setJSON(['error' => 'Unauthorized'])->setStatusCode(403);
        }

        $notificationModel = new NotificationModel();
        $notificationModel->where('is_read', 0)->set(['is_read' => 1])->update();

        return $this->response->setJSON(['success' => true]);
    }

}
