<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\MenuModel;
use App\Models\AdminModel;
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
    $postQty = $this->request->getPost('qty') ?? []; // Get qty from POST

    $items = [];
    $total = 0;

    foreach ($cart as $c) {
        if (is_array($c) && isset($c['id']) && in_array($c['id'], $selected)) {
            // Use qty from POST if available, otherwise from session
            $qty = isset($postQty[$c['id']]) ? (int)$postQty[$c['id']] : ($c['qty'] ?? 1);
            $c['qty'] = $qty; // Update the qty in the item
            $items[] = $c;
            $total += (isset($c['harga']) && isset($qty)) ? $c['harga'] * $qty : 0;
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
                'qty' => $item['qty'] ?? 1, // Now uses the updated qty
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
            'total' => $total,
            'isLoggedIn' => $this->session->get('isLoggedIn')
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

        // Validate customer data for non-logged-in users
        if (!$this->session->get('isLoggedIn')) {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'namaPelanggan' => 'required|min_length[2]|max_length[100]',
                'nomorTelepon' => 'required|regex_match[/^[0-9]{10,13}$/]'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
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

        // Get customer data based on login status
        if (!$this->session->get('isLoggedIn')) {
            $namaPelanggan = $this->request->getPost('namaPelanggan');
            $nomorTelepon = $this->request->getPost('nomorTelepon');
        } else {
            // For logged-in users, get the full name from admin table
            $adminModel = new AdminModel();
            $userId = $this->session->get('id'); // Login controller sets 'id', not 'userId'
            if ($userId) {
                $admin = $adminModel->find($userId);
                $namaPelanggan = $admin ? $admin['nama'] : 'Pelanggan';
            } else {
                $namaPelanggan = 'Pelanggan';
            }
            $nomorTelepon = null; // Could be added to user profile later
        }

        $dataPesanan = [
            'namaPelanggan' => $namaPelanggan,
            'nomorTelepon' => $nomorTelepon,
            'waktuPemesanan' => date('Y-m-d H:i:s'),
            'metodePembayaran' => $metode,
            'statusPembayaran' => $status,
            'total' => $total
        ];

        // Insert pesanan dan dapatkan ID pesanan yang baru
        $pesananModel->insert($dataPesanan);
        $idPesanan = $pesananModel->getInsertID();

        // Create notification for admin
        try {
            $notificationModel = new \App\Models\NotificationModel();
            $notificationModel->createNotification($idPesanan, 'payment_confirmation');
        } catch (\Exception $e) {
            // Log error but don't stop the payment process
            log_message('error', 'Failed to create notification: ' . $e->getMessage());
        }

        // Simpan order_id ke session agar tidak berubah
        $this->session->set('order_id', $idPesanan);

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

        // Get the order from session
        $order_id = $this->session->get('order_id');
        if (!$order_id) {
            return redirect()->to('/menu')->with('error', 'Pesanan tidak ditemukan.');
        }

        $pesananModel = new PesananModel();
        $latestOrder = $pesananModel->find($order_id);

        if (!$latestOrder) {
            return redirect()->to('/menu')->with('error', 'Pesanan tidak ditemukan.');
        }

        // Calculate queue number (orders today with status not completed)
        $today = date('Y-m-d');
        $queue_number = $pesananModel->where('DATE(waktuPemesanan)', $today)
                                      ->whereNotIn('statusPembayaran', ['Selesai'])
                                      ->countAllResults() ?: 1; // Default if no data

        // Get order details
        $detailPesananModel = new DetailPesananModel();
        $menuModel = new MenuModel();
        $details = $detailPesananModel->where('idPesanan', $order_id)->findAll();

        $order_items = [];
        foreach ($details as $detail) {
            $menu = $menuModel->find($detail['idMenu']);
            $order_items[] = [
                'namaMenu' => $menu ? $menu['namaMenu'] : 'Menu Tidak Ditemukan',
                'jumlah' => $detail['jumlah'],
                'hargaTransaksi' => $detail['hargaTransaksi'],
                'subTotal' => $detail['subTotal']
            ];
        }

        // Estimate cooking time based on number of items
        $total_items = array_sum(array_column($order_items, 'jumlah'));
        $estimasi_masak = $total_items <= 2 ? '10-15 menit' : ($total_items <= 5 ? '15-20 menit' : '20-30 menit');

        $data = [
            'title' => 'Pesanan Berhasil',
            'status' => $status,
            'metode' => ucfirst($metode),
            'order_id' => $order_id,
            'queue_number' => $queue_number,
            'total' => $latestOrder['total'],
            'namaPelanggan' => $latestOrder['namaPelanggan'],
            'nomorTelepon' => $latestOrder['nomorTelepon'],
            'waktuPemesanan' => $latestOrder['waktuPemesanan'],
            'order_items' => $order_items,
            'estimasi_masak' => $estimasi_masak
        ];

        return view('success_new', $data);
    }

    // =========================
    // 6️⃣ Halaman status pesanan
    // =========================
    public function status()
    {
        $pesananModel = new PesananModel();
        $detailPesananModel = new DetailPesananModel();
        $menuModel = new MenuModel();

        $isLoggedIn = $this->session->get('isLoggedIn');
        $userId = $this->session->get('id');

        $pesanan = [];
        $detailPesanan = [];

        if ($isLoggedIn && $userId) {
            // Fetch orders for logged-in user
            $pesanan = $pesananModel->where('idAdmin', $userId)->findAll();
        } else {
            // For non-logged-in users, perhaps fetch based on session or show empty
            // Since session is cleared, maybe redirect to login or show message
            // For now, fetch all orders (not recommended for production)
            $pesanan = $pesananModel->findAll();
        }

        // Fetch details for each order
        foreach ($pesanan as $order) {
            $details = $detailPesananModel->where('idPesanan', $order['idPesanan'])->findAll();
            foreach ($details as &$detail) {
                // Add menu name
                $menu = $menuModel->find($detail['idMenu']);
                $detail['namaMenu'] = $menu ? $menu['namaMenu'] : 'Menu Tidak Ditemukan';
            }
            $detailPesanan = array_merge($detailPesanan, $details);
        }

        $data = [
            'title' => 'Status Pesanan',
            'pesanan' => $pesanan,
            'detailPesanan' => $detailPesanan
        ];

        return view('order_status', $data);
    }

    // =========================
    // 7️⃣ Download Nota PDF
    // =========================
    public function downloadNota($order_id)
    {
        // Include FPDF library
        require_once APPPATH . 'Libraries/fpdf/fpdf.php';

        // Fetch order data
        $pesananModel = new PesananModel();
        $detailPesananModel = new DetailPesananModel();
        $menuModel = new MenuModel();

        $order = $pesananModel->find($order_id);
        if (!$order) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Order not found');
        }

        $details = $detailPesananModel->where('idPesanan', $order_id)->findAll();
        $order_items = [];
        foreach ($details as $detail) {
            $menu = $menuModel->find($detail['idMenu']);
            $order_items[] = [
                'namaMenu' => $menu ? $menu['namaMenu'] : 'Menu Tidak Ditemukan',
                'jumlah' => $detail['jumlah'],
                'hargaTransaksi' => $detail['hargaTransaksi'],
                'subTotal' => $detail['subTotal']
            ];
        }

        // Calculate queue number
        $today = date('Y-m-d');
        $queue_number = $pesananModel->where('DATE(waktuPemesanan)', $today)
                                      ->whereNotIn('statusPembayaran', ['Selesai'])
                                      ->countAllResults() ?: 1;

        // Estimate cooking time
        $total_items = array_sum(array_column($order_items, 'jumlah'));
        $estimasi_masak = $total_items <= 2 ? '10-15 menit' : ($total_items <= 5 ? '15-20 menit' : '20-30 menit');

        // Create PDF
        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetMargins(15, 15, 15);

        // Logo
        $logoPath = FCPATH . 'public/images/logo.png';
        if (file_exists($logoPath)) {
            $pdf->Image($logoPath, 80, 10, 50, 0, 'PNG');
            $pdf->Ln(40);
        } else {
            $pdf->Ln(10);
        }

        // Header
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->SetFillColor(240, 240, 240); // Light gray background
        $pdf->Cell(0, 15, 'Nota Pesanan Yokuwi', 0, 1, 'C', true);
        $pdf->Ln(10);

        // Order Info
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Informasi Pesanan', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(50, 8, 'ID Pesanan:', 0, 0);
        $pdf->Cell(0, 8, '#' . $order['idPesanan'], 0, 1);
        $pdf->Cell(50, 8, 'Nomor Antrian:', 0, 0);
        $pdf->Cell(0, 8, '#' . $queue_number, 0, 1);
        $pdf->Cell(50, 8, 'Estimasi Masak:', 0, 0);
        $pdf->Cell(0, 8, $estimasi_masak, 0, 1);
        $pdf->Cell(50, 8, 'Tanggal Pemesanan:', 0, 0);
        $pdf->Cell(0, 8, date('d/m/Y H:i', strtotime($order['waktuPemesanan'])), 0, 1);
        $pdf->Ln(5);

        // Customer Info
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Informasi Pelanggan', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(50, 8, 'Nama Pelanggan:', 0, 0);
        $pdf->Cell(0, 8, $order['namaPelanggan'], 0, 1);
        $pdf->Cell(50, 8, 'Nomor Telepon:', 0, 0);
        $pdf->Cell(0, 8, $order['nomorTelepon'] ?? '-', 0, 1);
        $pdf->Cell(50, 8, 'Metode Pembayaran:', 0, 0);
        $pdf->Cell(0, 8, ucfirst($order['metodePembayaran']), 0, 1);
        $pdf->Cell(50, 8, 'Status Pembayaran:', 0, 0);
        $pdf->Cell(0, 8, $order['statusPembayaran'], 0, 1);
        $pdf->Ln(10);

        // Order Items Table
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Detail Pesanan', 0, 1, 'L');
        $pdf->SetFillColor(200, 200, 200); // Darker gray for table header
        $pdf->Cell(80, 10, 'Menu', 1, 0, 'C', true);
        $pdf->Cell(20, 10, 'Qty', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Harga', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Subtotal', 1, 1, 'C', true);

        $pdf->SetFont('Arial', '', 11);
        $pdf->SetFillColor(255, 255, 255); // White for table rows
        foreach ($order_items as $item) {
            $pdf->Cell(80, 8, $item['namaMenu'], 1, 0, 'L', true);
            $pdf->Cell(20, 8, $item['jumlah'], 1, 0, 'C', true);
            $pdf->Cell(40, 8, 'Rp ' . number_format($item['hargaTransaksi'], 0, ',', '.'), 1, 0, 'R', true);
            $pdf->Cell(40, 8, 'Rp ' . number_format($item['subTotal'], 0, ',', '.'), 1, 1, 'R', true);
        }

        // Total
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(240, 240, 240);
        $pdf->Cell(140, 10, 'Total Pembayaran:', 1, 0, 'R', true);
        $pdf->Cell(40, 10, 'Rp ' . number_format($order['total'], 0, ',', '.'), 1, 1, 'R', true);

        $pdf->Ln(15);

        // Footer
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(0, 8, 'Terima kasih telah memesan di Yokuwi!', 0, 1, 'C');
        $pdf->Cell(0, 8, 'Tanggal Cetak: ' . date('d/m/Y H:i:s'), 0, 1, 'C');
        $pdf->Cell(0, 8, 'Warung Makan Yokuwi - Makanan Berkualitas untuk Anda', 0, 1, 'C');

        // Output PDF using CodeIgniter response
        $response = $this->response;
        $response->setHeader('Content-Type', 'application/pdf');
        $response->setHeader('Content-Disposition', 'attachment; filename="nota_pesanan_yokuwi_' . $order_id . '.pdf"');
        $response->setBody($pdf->Output('S'));
        return $response;
    }
}
