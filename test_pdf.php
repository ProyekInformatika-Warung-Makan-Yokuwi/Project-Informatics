<?php
// Simple test for FPDF
require_once 'app/Libraries/fpdf/fpdf.php';

try {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Test PDF Generation');
    $pdf->Output('F', 'test_output.pdf');
    echo "PDF generated successfully: test_output.pdf\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
