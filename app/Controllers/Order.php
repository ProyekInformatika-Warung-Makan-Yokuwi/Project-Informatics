<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\MenuModel;
use CodeIgniter\Controller;

class Order extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    // =========================
    // 1️⃣ Menampilkan halaman checkout
    // =========================
    public function checkout()
{
    $selected = $this->request->getPost('selected');
    $checkoutItem = $this->session->get('checkoutItem');

    // Jika ada checkoutItem di session (dari menu detail), gunakan itu
    if ($checkoutItem && is_array($checkoutItem)) {
        if (isset($checkoutItem['idMenu'])) {
            // Single item dari menu detail
            $items = [$checkoutItem];
            $total = (isset($checkoutItem['hargaMenu']) && isset($checkoutItem['qty'])) ?
                     $checkoutItem['hargaMenu'] * $checkoutItem['qty'] : 0;
        } elseif (is_array($checkoutItem) && count($checkoutItem) > 0 && isset($checkoutItem[0]['idMenu'])) {
            // Array of items dari cart
            $items = $checkoutItem;
            $total = 0;
            foreach ($items as $item) {
                if (is_array($item) && isset($item['hargaMenu']) && isset($item['qty'])) {
                    $total += $item['hargaMenu'] * $item['qty'];
                }
            }
        } else {
            // Fallback
            $items = [];
            $total = 0;
        }

        return view('checkout', [
            'items' => $items,
            'total' => $total
        ]);
    }

    // Jika tidak ada checkoutItem, berarti dari cart dengan selected items
    if (!$selected) {
        return redirect()->to('/cart')->with('error', 'Pilih minimal 1 item.');
    }

    $cart = $this->session->get('cart') ?? [];

    $items = [];
    $total = 0;

    foreach ($cart as $c) {
        if (is_array($c) && isset($c['id']) && in_array($c['id'], $selected)) {
            $items[] = $c;
            $total += (isset($c['harga']) && isset($c['qty'])) ? $c['harga'] * $c['qty'] : 0;
        }
    }

    if (empty($items)) {
        return redirect()->to('/menu');
    }

    // Simpan item yang dipilih ke session checkoutItem
    $checkoutItems = [];
    foreach ($items as $item) {
        if (is_array($item)) {
            $checkoutItems[] = [
                'idMenu' => $item['id'] ?? 0,
                'namaMenu' => $item['nama'] ?? '',
                'hargaMenu' => $item['harga'] ?? 0,
                'qty' => $item['qty'] ?? 1,
                'gambar' => $item['gambar'] ?? 'default.jpg'
            ];
        }
    }
    $this->session->set('checkoutItem', $checkoutItems);

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
        $checkoutItem = $this->session->get('checkoutItem');

        // Debugging: Pastikan checkoutItem ada di session
        log_message('debug', 'Checkout Item at Payment: ' . print_r($checkoutItem, true));

        if (!$checkoutItem) {
            return redirect()->to('/menu')->with('error', 'Belum ada item yang dipesan.');
        }

        // Hitung total dari checkoutItem
        $total = 0;
        if (is_array($checkoutItem)) {
            if (isset($checkoutItem[0])) {
                // Array of items
                foreach ($checkoutItem as $item) {
                    $total += $item['hargaMenu'] * $item['qty'];
                }
            } else {
                // Single item
                $total = $checkoutItem['hargaMenu'] * $checkoutItem['qty'];
            }
        } else {
            // Fallback
            $total = 0;
        }

        $data = [
            'title' => 'Pembayaran',
            'total' => $total
        ];

        return view('payment', $data);
    }

    // =========================
    // 3️⃣ Menangani tombol "Pesan Sekarang" dari halaman detail menu
    // =========================
    public function orderNow()
    {

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

        $this->session->set('checkoutItem', $checkoutItem);

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
        $checkoutItem = $this->session->get('checkoutItem');

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
        $this->session->set('paymentStatus', $status);
        $this->session->set('paymentMethod', $metode);

        // Hitung total dari checkoutItem dengan validasi ketat
        $total = 0;
        if (is_array($checkoutItem)) {
            if (isset($checkoutItem['idMenu'])) {
                // Single item
                $total = (isset($checkoutItem['hargaMenu']) && isset($checkoutItem['qty'])) ?
                         $checkoutItem['hargaMenu'] * $checkoutItem['qty'] : 0;
            } elseif (is_array($checkoutItem) && count($checkoutItem) > 0 && isset($checkoutItem[0]['idMenu'])) {
                // Array of items
                foreach ($checkoutItem as $item) {
                    if (is_array($item) && isset($item['hargaMenu']) && isset($item['qty'])) {
                        $total += $item['hargaMenu'] * $item['qty'];
                    }
                }
            }
        }

        // Simpan pesanan ke tabel `pesanan` tanpa `idAdmin`
        $pesananModel = new PesananModel();
        $dataPesanan = [
            'namaPelanggan' => 'Pelanggan',  // Bisa diambil dari session atau form input pelanggan
            'tanggalPemesanan' => date('Y-m-d'),
            'metodePembayaran' => $metode,
            'statusPembayaran' => $status,
            'total' => $total
        ];

        // Insert pesanan dan dapatkan ID pesanan yang baru
        $pesananModel->insert($dataPesanan);
        $idPesanan = $pesananModel->getInsertID();

        // Simpan detail pesanan ke tabel `detailpesanan` dengan validasi ketat
        $detailPesananModel = new DetailPesananModel();
        if (is_array($checkoutItem)) {
            if (isset($checkoutItem['idMenu'])) {
                // Single item
                $dataDetailPesanan = [
                    'idPesanan' => $idPesanan,
                    'idMenu' => $checkoutItem['idMenu'] ?? 0,
                    'jumlah' => $checkoutItem['qty'] ?? 1,
                    'hargaTransaksi' => $checkoutItem['hargaMenu'] ?? 0,
                    'subTotal' => ($checkoutItem['hargaMenu'] ?? 0) * ($checkoutItem['qty'] ?? 1)
                ];
                $detailPesananModel->insert($dataDetailPesanan);
            } elseif (is_array($checkoutItem) && count($checkoutItem) > 0 && isset($checkoutItem[0]['idMenu'])) {
                // Array of items
                foreach ($checkoutItem as $item) {
                    if (is_array($item)) {
                        $dataDetailPesanan = [
                            'idPesanan' => $idPesanan,
                            'idMenu' => $item['idMenu'] ?? 0,
                            'jumlah' => $item['qty'] ?? 1,
                            'hargaTransaksi' => $item['hargaMenu'] ?? 0,
                            'subTotal' => ($item['hargaMenu'] ?? 0) * ($item['qty'] ?? 1)
                        ];
                        $detailPesananModel->insert($dataDetailPesanan);
                    }
                }
            }
        }

        // Hapus semua item dari keranjang setelah pembayaran
        $this->session->remove('cart');
        $this->session->remove('checkoutItem');

        // Debugging: Pastikan keranjang dihapus
        log_message('debug', 'Cart after payment: ' . print_r($this->session->get('cart'), true));

        // Redirect ke halaman sukses pembayaran
        return redirect()->to('/order/success');
    }

    // =========================
    // 5️⃣ Halaman sukses pembayaran
    // =========================
    public function success()
    {
        $status = $this->session->get('paymentStatus');
        $metode = $this->session->get('paymentMethod');

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
