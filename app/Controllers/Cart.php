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

        // ✅ Jika request dari AJAX → kirim JSON response
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'count' => array_sum(array_column($cart, 'qty'))
            ]);
        }

        // Jika bukan AJAX → redirect biasa
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

    public function checkout()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        $selectedIds = $this->request->getPost('selected') ?? [];

        if (empty($selectedIds)) {
            return redirect()->to('/cart')->with('error', 'Pilih minimal satu item untuk checkout!');
        }

        $checkoutItems = [];
        $total = 0;

        foreach ($selectedIds as $id) {
            if (isset($cart[$id])) {
                $checkoutItems[] = $cart[$id];
                $total += $cart[$id]['harga'] * $cart[$id]['qty'];
            }
        }

        $data = [
            'title' => 'Checkout',
            'items' => $checkoutItems,
            'total' => $total
        ];

        return view('checkout', $data);
    }

    public function updateQtyAjax($id)
    {
        if ($this->request->isAJAX()) {
            $session = session();
            $cart = $session->get('cart') ?? [];
            $data = $this->request->getJSON(true);
            $qty = max(1, (int)($data['qty'] ?? 1));

            if (isset($cart[$id])) {
                $cart[$id]['qty'] = $qty;
                $session->set('cart', $cart);
            }

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setStatusCode(400);
    }
}
