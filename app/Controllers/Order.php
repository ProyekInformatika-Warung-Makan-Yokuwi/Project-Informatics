<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\MenuModel;
use CodeIgniter\Controller;

class Order extends Controller
{
    // =========================
    // 1️⃣ Menampilkan halaman checkout
    // =========================
    public function checkout()
{
    $selected = $this->request->getPost('selected');

    if (!$selected) {
        return redirect()->to('/cart')->with('error', 'Pilih minimal 1 item.');
    }

    $cart = session()->get('cart') ?? [];

    $items = [];
    $total = 0;

    foreach ($cart as $c) {
        if (in_array($c['id'], $selected)) {
            $items[] = $c;
            $total += $c['harga'] * $c['qty'];
        }
    }

    if (empty($items)) {
        return redirect()->to('/menu');
    }

    return view('checkout', [
        'items' => $items,
        'total' => $total
    ]);
}


    // =========================
    // 2️⃣ Menuju halaman pembayaran
    // =========================
    public function payment()
    {
        $session = session();
        $checkoutItem = $session->get('checkoutItem');

        // Debugging: Pastikan checkoutItem ada di session
        log_message('debug', 'Checkout Item at Payment: ' . print_r($checkoutItem, true));

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

        // Simpan item yang dipesan ke session checkoutItem
        $checkoutItem = [
            'idMenu' => $menu['idMenu'],
            'namaMenu' => $menu['namaMenu'],
            'hargaMenu' => $menu['hargaMenu'],
            'qty' => $qty,
        ];

        $session->set('checkoutItem', $checkoutItem);

        // Debugging: Pastikan checkoutItem sudah diset dengan benar
        log_message('debug', 'Checkout Item After Order: ' . print_r($checkoutItem, true));

        return redirect()->to('/order/checkout');
    }

    // =========================
    // 4️⃣ Setelah klik “Saya sudah bayar”
    // =========================
    public function confirmPayment()
    {
        $metode = $this->request->getPost('metode');
        $session = session();
        $checkoutItem = $session->get('checkoutItem');

        // Debugging: Pastikan metode pembayaran dan checkoutItem ada
        log_message('debug', 'Metode Pembayaran: ' . $metode);
        log_message('debug', 'Checkout Item at ConfirmPayment: ' . print_r($checkoutItem, true));

        if (!$metode || !$checkoutItem) {
            return redirect()->back()->with('error', 'Silakan pilih metode pembayaran dan pastikan pesanan ada.');
        }

        // Tentukan status berdasarkan metode pembayaran
        if ($metode === 'qris') {
            $status = 'Lunas (Pembayaran QRIS berhasil)';
        } else {
            $status = 'Menunggu Konfirmasi Admin (Pembayaran Tunai)';
        }

        // Simpan status pembayaran ke session
        $session->set('paymentStatus', $status);
        $session->set('paymentMethod', $metode);

        // Simpan pesanan ke tabel `pesanan` tanpa `idAdmin`
        $pesananModel = new PesananModel();
        $dataPesanan = [
            'namaPelanggan' => 'Pelanggan',  // Bisa diambil dari session atau form input pelanggan
            'tanggalPemesanan' => date('Y-m-d'),
            'metodePembayaran' => $metode,
            'statusPembayaran' => $status,
            'total' => $checkoutItem['hargaMenu'] * $checkoutItem['qty']
        ];

        // Insert pesanan dan dapatkan ID pesanan yang baru
        $pesananModel->insert($dataPesanan);
        $idPesanan = $pesananModel->getInsertID();

        // Simpan detail pesanan ke tabel `detailpesanan`
        $detailPesananModel = new DetailPesananModel();
        $dataDetailPesanan = [
            'idPesanan' => $idPesanan,
            'idMenu' => $checkoutItem['idMenu'],
            'jumlah' => $checkoutItem['qty'],
            'hargaTransaksi' => $checkoutItem['hargaMenu'],
            'subTotal' => $checkoutItem['hargaMenu'] * $checkoutItem['qty']
        ];

        $detailPesananModel->insert($dataDetailPesanan);

        // Hapus semua item dari keranjang setelah pembayaran
        $session->remove('cart');
        $session->remove('checkoutItem');

        // Debugging: Pastikan keranjang dihapus
        log_message('debug', 'Cart after payment: ' . print_r($session->get('cart'), true));

        // Redirect ke halaman sukses pembayaran
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
