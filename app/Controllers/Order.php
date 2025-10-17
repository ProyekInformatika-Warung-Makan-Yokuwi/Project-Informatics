<?php

namespace App\Controllers;

class Order extends BaseController
{
    public function checkout()
    {
        $session = session();
        $checkoutItem = $session->get('checkoutItem');

        // Jika belum ada item, arahkan balik
        if (!$checkoutItem) {
            return redirect()->to('/menu')->with('error', 'Belum ada item yang dipesan.');
        }

        // Format data agar cocok dengan view checkout.php
        $data['items'] = [
            [
                'nama' => $checkoutItem['namaMenu'],
                'harga' => $checkoutItem['hargaMenu'],
                'gambar' => $checkoutItem['gambar'],
                'qty' => $checkoutItem['qty']
            ]
        ];
        $data['total'] = $checkoutItem['hargaMenu'] * $checkoutItem['qty'];
        $data['title'] = 'Checkout Pesanan';

        return view('checkout', $data);
    }
}
