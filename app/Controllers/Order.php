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
            'idMenu' => $menu['idMenu'],
            'namaMenu' => $menu['namaMenu'],
            'hargaMenu' => $menu['hargaMenu'],
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
        $checkoutItem = $session->get('checkoutItem');

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
