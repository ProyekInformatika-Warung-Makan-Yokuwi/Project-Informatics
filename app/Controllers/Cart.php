<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Cart extends BaseController
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        $data['cart'] = $cart;
        $data['title'] = 'Keranjang Belanja';
        return view('cart', $data);
    }

    public function add()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        $menuId = $this->request->getPost('idMenu');
        $menuModel = new MenuModel();
        $menu = $menuModel->find($menuId);

        if ($menu) {
            if (isset($cart[$menuId])) {
                $cart[$menuId]['qty']++;
            } else {
                $cart[$menuId] = [
                    'id' => $menu['idMenu'],
                    'nama' => $menu['namaMenu'],
                    'harga' => $menu['hargaMenu'],
                    'gambar' => $menu['gambar'],
                    'qty' => 1
                ];
            }
        }

        $session->set('cart', $cart);
        return redirect()->back();
    }

    public function remove($id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }

    public function updateQty($id)
{
    $session = session();
    $cart = $session->get('cart') ?? [];

    if (!isset($cart[$id])) {
        return redirect()->to('/cart');
    }

    $action = $this->request->getPost('action');
    if ($action === 'plus') {
        $cart[$id]['qty']++;
    } elseif ($action === 'minus' && $cart[$id]['qty'] > 1) {
        $cart[$id]['qty']--;
    }

    $session->set('cart', $cart);
    return redirect()->to('/cart');
}

}
