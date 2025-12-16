<?php

namespace App\Controllers;

use App\Libraries\PdfGenerator;

class Laporan extends BaseController
{
    protected $pesananModel;
    
    public function __construct()
    {
        $this->pesananModel = new \App\Models\PesananModel();
    }
    
    public function downloadLaporan()
    {
        // Ambil semua data pesanan
        $pesanan = $this->pesananModel->orderBy('waktuPemesanan', 'DESC')->findAll();
        
        // Hitung statistik
        $totalPesanan = count($pesanan);
        $totalPendapatan = array_sum(array_column($pesanan, 'total'));
        
        // Generate PDF
        $pdf = new PdfGenerator();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        
        // Judul Laporan
        $pdf->ReportTitle('LAPORAN KEUANGAN', 'Periode: Semua Data');
        
        // Info Boxes
        $infoData = [
            ['label' => 'Total Pesanan', 'value' => $totalPesanan . ' Pesanan']
        ];
        $pdf->InfoBox($infoData);
        
        // Table
        if (!empty($pesanan)) {
            $pdf->Ln(5);
            
            // Table headers
            $headers = ['No', 'ID', 'Pelanggan', 'Total', 'Metode', 'Status', 'Tanggal'];
            $widths = [10, 15, 45, 35, 30, 25, 30];
            $pdf->TableHeader($headers, $widths);
            
            // Table rows
            $no = 1;
            foreach ($pesanan as $index => $p) {
                $data = [
                    $no++,
                    '#' . $p['idPesanan'],
                    substr($p['namaPelanggan'], 0, 20),
                    'Rp ' . number_format($p['total'], 0, ',', '.'),
                    $p['metodePembayaran'],
                    $p['statusPembayaran'],
                    date('d/m/Y H:i', strtotime($p['waktuPemesanan']))
                ];
                
                $pdf->TableRow($data, $widths, $index % 2 == 0);
            }
            
            // Summary
            $pdf->Ln(10);
            $pdf->SummaryBox('TOTAL PENDAPATAN', 'Rp ' . number_format($totalPendapatan, 0, ',', '.'), 'success');
            
            // Breakdown by payment method
            $pdf->Ln(5);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetTextColor(52, 73, 94);
            $pdf->Cell(0, 10, 'Rincian Berdasarkan Metode Pembayaran', 0, 1, 'L');
            
            $metodePembayaran = [];
            foreach ($pesanan as $p) {
                $metode = $p['metodePembayaran'];
                if (!isset($metodePembayaran[$metode])) {
                    $metodePembayaran[$metode] = ['jumlah' => 0, 'total' => 0];
                }
                $metodePembayaran[$metode]['jumlah']++;
                $metodePembayaran[$metode]['total'] += $p['total'];
            }
            
            foreach ($metodePembayaran as $metode => $data) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->SetTextColor(100, 100, 100);
                $label = $metode . ' (' . $data['jumlah'] . ' pesanan)';
                $value = 'Rp ' . number_format($data['total'], 0, ',', '.');
                
                $pdf->Cell(140, 8, $label, 0, 0, 'L');
                $pdf->SetFont('Arial', 'B', 10);
                $pdf->SetTextColor(46, 204, 113);
                $pdf->Cell(50, 8, $value, 0, 1, 'R');
            }
            
        } else {
            $pdf->SetFont('Arial', 'I', 12);
            $pdf->SetTextColor(150, 150, 150);
            $pdf->Cell(0, 20, 'Tidak ada data untuk ditampilkan', 0, 1, 'C');
        }
        
        // Output PDF
        $filename = 'Laporan_Keuangan_' . date('Y-m-d_His') . '.pdf';
        $pdf->Output('D', $filename);
    }
    
    public function downloadLaporanDetail()
    {
        // Ambil semua data pesanan
        $pesanan = $this->pesananModel->orderBy('waktuPemesanan', 'DESC')->findAll();
        
        // Generate PDF
        $pdf = new PdfGenerator();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        
        $pdf->ReportTitle('LAPORAN DETAIL TRANSAKSI', 'Periode: Semua Data');
        
        foreach ($pesanan as $p) {
            // Box untuk setiap pesanan
            $pdf->SetFillColor(245, 245, 245);
            $pdf->Rect(10, $pdf->GetY(), 190, 8, 'F');
            
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetTextColor(231, 76, 60);
            $pdf->Cell(95, 8, 'Pesanan #' . $p['idPesanan'], 0, 0, 'L');
            
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetTextColor(100, 100, 100);
            $pdf->Cell(95, 8, date('d/m/Y H:i', strtotime($p['waktuPemesanan'])), 0, 1, 'R');
            
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(50, 6, 'Pelanggan:', 0, 0, 'L');
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(0, 6, $p['namaPelanggan'], 0, 1, 'L');
            
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(50, 6, 'Metode Pembayaran:', 0, 0, 'L');
            $pdf->Cell(70, 6, $p['metodePembayaran'], 0, 0, 'L');
            $pdf->Cell(35, 6, 'Status:', 0, 0, 'R');
            
            // Status dengan warna
            if ($p['statusPembayaran'] == 'Siap') {
                $pdf->SetTextColor(46, 204, 113);
            } else {
                $pdf->SetTextColor(243, 156, 18);
            }
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(0, 6, $p['statusPembayaran'], 0, 1, 'L');
            
            $pdf->SetFont('Arial', '', 9);
            $pdf->SetTextColor(100, 100, 100);
            $pdf->Cell(50, 6, 'Total:', 0, 0, 'L');
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetTextColor(46, 204, 113);
            $pdf->Cell(0, 6, 'Rp ' . number_format($p['total'], 0, ',', '.'), 0, 1, 'L');
            
            $pdf->Ln(5);
        }
        
        // Total akhir
        $totalPendapatan = array_sum(array_column($pesanan, 'total'));
        $pdf->Ln(5);
        $pdf->SummaryBox('TOTAL KESELURUHAN', 'Rp ' . number_format($totalPendapatan, 0, ',', '.'), 'success');
        
        $filename = 'Laporan_Detail_' . date('Y-m-d_His') . '.pdf';
        $pdf->Output('D', $filename);
    }
}