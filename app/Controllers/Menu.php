<?php

namespace App\Controllers;
use App\Models\MenuModel;

class Menu extends BaseController
{
    public function index()
    {
        $menuModel = new MenuModel();
        $data['menuList'] = $menuModel->findAll();
        $data['title'] = 'Daftar Menu Yokuwi';

        return view('menu', $data);
    }

    public function detail($idMenu)
    {
        $menuModel = new MenuModel();
        $menu = $menuModel->find($idMenu);

        if (!$menu) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Menu tidak ditemukan");
        }

        $data['menu'] = $menu;
        $data['title'] = 'Detail Menu - ' . $menu['namaMenu'];

        return view('menu', $data);
    }

    // ✅ Fungsi baru untuk "Pesan Sekarang"
    public function orderNow()
    {
        $menuModel = new MenuModel();
        $idMenu = $this->request->getPost('idMenu');
        $menu = $menuModel->find($idMenu);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan.');
        }

        // Simpan data sementara di sesi checkout
        $session = session();
        $session->set('checkoutItem', [
            'idMenu' => $menu['idMenu'],
            'namaMenu' => $menu['namaMenu'],
            'hargaMenu' => $menu['hargaMenu'],
            'gambar' => $menu['gambar'],
            'qty' => 1
        ]);

        // Arahkan ke halaman checkout
        return redirect()->to('/order/checkout');
    }
}
