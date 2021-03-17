<?php

namespace app\model;

require_once dirname(__FILE__) . '/../bootstrap.php';

use Fpdf\Fpdf;


class PDF extends FPDF {
// Page header
    function Header() {
        // Logo
        $this->Image('logo.png', 10, 6, 30);
        // New Line
        $this->Ln();
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(100, 10, 'Ticket to Inholland Haarlem Festival', 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
