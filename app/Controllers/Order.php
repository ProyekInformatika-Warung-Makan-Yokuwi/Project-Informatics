<?php

namespace App\Controllers;

use App\Models\MenuModel;
use CodeIgniter\Controller;

class Order extends Controller
{
    // =========================
    // 1️⃣ Menampilkan halaman checkout
    // =========================
    public function checkout()
    {
        $session = session();
        $checkoutItem = $session->get('checkoutItem');

        if (!$checkoutItem) {
            return redirect()->to('/menu')->with('error', 'Belum ada item yang dipesan.');
        }

        $data = [
            'title' => 'Checkout',
            'item' => $checkoutItem,
            'total' => $checkoutItem['hargaMenu'] * $checkoutItem['qty']
        ];

        return view('checkout', $data);
    }

    // =========================
    // 2️⃣ Menuju halaman pembayaran
    // =========================
    public function payment()
    {
        $session = session();
        $checkoutItem = $session->get('checkoutItem');

        if (!$checkoutItem) {
            return redirect()->to('/menu')->with('error', 'Belum ada item yang dipesan.');
        }

        $data = [
            'title' => 'Pembayaran',
            'total' => $checkoutItem['hargaMenu'] * $checkoutItem['qty']
        ];

        return view('payment', $data);
    }

    // =========================
    // 3️⃣ Menangani tombol "Pesan Sekarang" dari halaman detail menu
    // =========================
    public function orderNow()
    {
        $session = session();

        $menuId = $this->request->getPost('menu_id');
        $qty = $this->request->getPost('qty');

        $menuModel = new MenuModel();
        $menu = $menuModel->find($menuId);

        if (!$menu) {
            return redirect()->to('/menu')->with('error', 'Menu tidak ditemukan.');
        }

        $checkoutItem = [
            'idMenu' => $menu['id'],
            'namaMenu' => $menu['nama_menu'],
            'hargaMenu' => $menu['harga'],
            'qty' => $qty,
        ];

        $session->set('checkoutItem', $checkoutItem);

        return redirect()->to('/order/checkout');
    }

    // =========================
    // 4️⃣ Setelah klik “Saya sudah bayar”
    // =========================
    public function confirmPayment()
    {
        $metode = $this->request->getPost('metode');
        $session = session();

        if (!$metode) {
            return redirect()->back()->with('error', 'Silakan pilih metode pembayaran.');
        }

        // ✅ Tentukan status berdasarkan metode
        if ($metode === 'qris') {
            // QRIS langsung dianggap Lunas
            $status = 'Lunas (Pembayaran QRIS berhasil)';
        } else {
            // Tunai menunggu konfirmasi admin
            $status = 'Menunggu Konfirmasi Admin (Pembayaran Tunai)';
        }

        // Simpan status ke session
        $session->set('paymentStatus', $status);
        $session->set('paymentMethod', $metode);

        // (Opsional) Jika nanti ada tabel orders, bisa disimpan ke database di sini
        // $orderModel = new OrderModel();
        // $orderModel->insert([...]);

        return redirect()->to('/order/success');
    }

    // =========================
    // 5️⃣ Halaman sukses pembayaran
    // =========================
    public function success()
    {
        $session = session();
        $status = $session->get('paymentStatus');
        $metode = $session->get('paymentMethod');

        if (!$status) {
            return redirect()->to('/menu')->with('error', 'Tidak ada data pembayaran ditemukan.');
        }

        $data = [
            'title' => 'Status Pembayaran',
            'status' => $status,
            'metode' => ucfirst($metode)
        ];

        return view('success', $data);
    }
}
