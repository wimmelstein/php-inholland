<?php

require 'model/mypdf.php';
require 'model/user.php';
require 'lib/phpqrcode.php';

$user = new User(null, 'Wim', 'Wiltenburg', 51);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 20);


$pdf->Cell(0, 10, 'Wimmelsoft CodeFest', 0, 1, 'C');


$pdf->SetFont('Arial', '', 12 );

$pdf->Ln(30);

$pdf->Cell(0, 10, 'Dear ' . $user->getUserName(), 0, 1, 'L');

$pdf->Ln();

$pdf->Cell(0, 10, 'This ticket is to grant access to Wimmelsoft Codefest to: ', 0, 1, 'L');

$pdf->Ln();

$pdf->Cell(0, 10, 'First name: ' . $user->getFirstName(), 0, 1, 'L');
$pdf->Cell(0, 10, 'Last name: ' . $user->getLastName(), 0, 1, 'L');

$pdf->Ln();

$pdf->Cell(0,10, 'Date: ' . date('d-m-Y'), 0, 1, 'L');

$pdf->Ln();

$filename = 'output/' . str_replace(' ', '_', $user->getUserName()) . '.png';

QRcode::png(md5($user->getUserName()), $filename, 'L', 4, 2);

$pdf->Image($filename);

$pdf->Output('F', 'output/ticket.pdf');

// Remove image for privacy reasons
unlink($filename);
?>