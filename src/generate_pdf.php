<?php

include_once 'Database\DatabaseConnection.php';
include_once 'model\mypdf.php';

use app\model\PDF;
use chillerlan\QRCode\QRCode;

$pdo = DatabaseConnection::getInstance();
$ticketId = $_GET['id'];
$stmt = $pdo->prepare("select * from tickets where id=:id");
$stmt->execute(['id' => $ticketId]);
$ticket = $stmt->fetch();

$stmt = $pdo->prepare("select * from users u, tickets t where u.id = t.user_id and t.id = :ticketId");
$stmt->execute(['ticketId' => $ticketId]);
$user = $stmt->fetch();
$fullUserName = sprintf("%s %s", $user['first_name'], $user['last_name']);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 20);

$output = __DIR__ . '/output/';
$pdf->Cell(0, 10, 'Wimmelsoft CodeFest', 0, 1, 'C');


$pdf->SetFont('Arial', '', 12);

$pdf->Ln(30);

$pdf->Cell(0, 10, 'Dear ' . $fullUserName, 0, 1, 'L');

$pdf->Ln();

$pdf->Cell(0, 10, 'This ticket is to grant access to Wimmelsoft Codefest to: ', 0, 1, 'L');

$pdf->Ln();

$pdf->Cell(0, 10, 'First name: ' . $user['first_name'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Last name: ' . $user['last_name'], 0, 1, 'L');

$pdf->Ln();

$pdf->Cell(0, 10, 'Date: ' . date('d-m-Y'), 0, 1, 'L');

$pdf->Ln();


$filename = $output . $fullUserName . '.png';


$qrcode = new QRCode();
$qrcode->render('<a href="https://wiltenburgit.nl/checkin?id=$ticketId">Wiltenburg IT</a>', $filename);
$pdf->Image($filename);

$pdfname = 'ticket_' . $fullUserName . '.pdf';
$pdf->Output('F', $output . $pdfname);

// Remove image for privacy reasons
unlink($filename);

echo 'Done...';
