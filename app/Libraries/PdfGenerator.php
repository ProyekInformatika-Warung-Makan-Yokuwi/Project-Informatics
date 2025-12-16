<?php

namespace App\Libraries;

require_once APPPATH . 'Libraries/fpdf/fpdf.php';

class PdfGenerator extends \FPDF
{
    private $primaryColor = [231, 76, 60]; // #E74C3C
    private $secondaryColor = [52, 73, 94]; // #34495E
    private $accentColor = [46, 204, 113]; // #2ECC71
    
    // Header
    function Header()
    {
        // Logo atau Nama Restoran
        $this->SetFont('Arial', 'B', 24);
        $this->SetTextColor($this->primaryColor[0], $this->primaryColor[1], $this->primaryColor[2]);
        $this->Cell(0, 15, 'WARUNG MAKAN YOKUWI', 0, 1, 'C');
        
        // Subtitle
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 5, 'Jl. Paingan', 0, 1, 'C');
        $this->Cell(0, 5, 'Telp: 081234567890 | Email: yokuwi@gmail.com', 0, 1, 'C');
        
        // Line separator
        $this->SetDrawColor($this->primaryColor[0], $this->primaryColor[1], $this->primaryColor[2]);
        $this->SetLineWidth(0.5);
        $this->Line(10, $this->GetY() + 5, 200, $this->GetY() + 5);
        $this->Ln(10);
    }
    
    // Footer
    function Footer()
    {
        $this->SetY(-20);
        
        // Line separator
        $this->SetDrawColor($this->primaryColor[0], $this->primaryColor[1], $this->primaryColor[2]);
        $this->SetLineWidth(0.5);
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        $this->Ln(3);
        
        // Footer text
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 5, 'Dicetak pada: ' . date('d/m/Y H:i:s'), 0, 0, 'L');
        $this->Cell(0, 5, 'Halaman ' . $this->PageNo() . ' dari {nb}', 0, 0, 'R');
    }
    
    // Judul Laporan
    function ReportTitle($title, $period = '')
    {
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor($this->secondaryColor[0], $this->secondaryColor[1], $this->secondaryColor[2]);
        $this->Cell(0, 10, $title, 0, 1, 'C');
        
        if ($period) {
            $this->SetFont('Arial', '', 12);
            $this->SetTextColor(100, 100, 100);
            $this->Cell(0, 8, $period, 0, 1, 'C');
        }
        
        $this->Ln(5);
    }
    
    // Info Box
    function InfoBox($data)
    {
        $this->SetFillColor(245, 245, 245);
        $boxWidth = 60;
        $boxHeight = 20;
        $startX = 10;
        $gap = 5;
        
        $x = $startX;
        foreach ($data as $item) {
            $this->SetXY($x, $this->GetY());
            
            // Box background
            $this->Rect($x, $this->GetY(), $boxWidth, $boxHeight, 'F');
            
            // Label
            $this->SetFont('Arial', '', 9);
            $this->SetTextColor(100, 100, 100);
            $this->SetXY($x + 2, $this->GetY() + 3);
            $this->Cell($boxWidth - 4, 5, $item['label'], 0, 0, 'L');
            
            // Value
            $this->SetFont('Arial', 'B', 12);
            $this->SetTextColor($this->primaryColor[0], $this->primaryColor[1], $this->primaryColor[2]);
            $this->SetXY($x + 2, $this->GetY() + 8);
            $this->Cell($boxWidth - 4, 8, $item['value'], 0, 0, 'L');
            
            $x += $boxWidth + $gap;
        }
        
        $this->Ln($boxHeight + 5);
    }
    
    // Table Header
    function TableHeader($headers, $widths)
    {
        $this->SetFillColor($this->primaryColor[0], $this->primaryColor[1], $this->primaryColor[2]);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor($this->primaryColor[0], $this->primaryColor[1], $this->primaryColor[2]);
        $this->SetLineWidth(0.3);
        $this->SetFont('Arial', 'B', 10);
        
        foreach ($headers as $i => $header) {
            $this->Cell($widths[$i], 10, $header, 1, 0, 'C', true);
        }
        $this->Ln();
    }
    
    // Table Row
    function TableRow($data, $widths, $isAlternate = false)
    {
        if ($isAlternate) {
            $this->SetFillColor(248, 248, 248);
        } else {
            $this->SetFillColor(255, 255, 255);
        }
        
        $this->SetTextColor(50, 50, 50);
        $this->SetDrawColor(220, 220, 220);
        $this->SetFont('Arial', '', 9);
        
        $height = 8;
        foreach ($data as $i => $item) {
            $align = is_numeric(str_replace(['Rp ', '.', ','], '', $item)) ? 'R' : 'C';
            $this->Cell($widths[$i], $height, $item, 1, 0, $align, true);
        }
        $this->Ln();
    }
    
    // Summary Box
    function SummaryBox($label, $value, $color = 'primary')
    {
        $colors = [
            'primary' => $this->primaryColor,
            'success' => $this->accentColor,
            'secondary' => $this->secondaryColor
        ];
        
        $selectedColor = $colors[$color] ?? $this->primaryColor;
        
        $this->SetFillColor($selectedColor[0], $selectedColor[1], $selectedColor[2]);
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('Arial', 'B', 12);
        
        $boxHeight = 12;
        $labelWidth = 140;
        $valueWidth = 50;
        
        $this->Cell($labelWidth, $boxHeight, $label, 1, 0, 'L', true);
        $this->Cell($valueWidth, $boxHeight, $value, 1, 1, 'R', true);
    }
}