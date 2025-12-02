<?php

namespace App\Controllers;
use App\Models\MenuModel;

class Menu extends BaseController
{
    public function index()
    {
        $menuModel = new MenuModel();
        $search = $this->request->getGet('search');

        if ($search) {
            $data['menuList'] = $menuModel->like('namaMenu', $search)->findAll();
        } else {
            $data['menuList'] = $menuModel->findAll();
        }

        $data['title'] = 'Daftar Menu Yokuwi';
        $data['searchQuery'] = $search;

        return view('menu', $data);
    }

    public function detail($idMenu)
    {
        $menuModel = new MenuModel();
        $menu = $menuModel->find($idMenu);

        if (!$menu) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Menu tidak ditemukan");
        }

        // Get related menu items (excluding current menu, limit to 4)
        $relatedMenus = $menuModel->where('idMenu !=', $idMenu)->limit(4)->findAll();

        $data['menu'] = $menu;
        $data['relatedMenus'] = $relatedMenus;
        $data['title'] = 'Detail Menu - ' . $menu['namaMenu'];

        // ✅ arahkan ke file view yang benar
        return view('menu_detail', $data);
    }

    // ✅ Fungsi baru untuk "Pesan Sekarang"
    public function orderNow()
    {
        $menuModel = new MenuModel();
        $idMenu = $this->request->getPost('idMenu');
        $qty = $this->request->getPost('quantity') ?? 1;

        // Validasi quantity minimal 1
        $qty = max(1, (int)$qty);

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
            'qty' => $qty
        ]);

        // Arahkan ke halaman checkout
        return redirect()->to('/order/checkout');
    }
}
