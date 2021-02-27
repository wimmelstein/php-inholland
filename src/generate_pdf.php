<?php

include_once('Database/DatabaseConnection.php');
include_once 'model/mypdf.php';

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
$outputUserName = str_replace(' ', '_', $fullUserName);

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


$filename = $outputUserName . '.png';

$qrcode = new QRCode();

$url = sprintf('<a href="http://wiltenburg.tech/checkin.php?id=%s">Checkin to the Code Fest</a>', $ticketId);
$qrcode->render($url, $filename);
$pdf->Image($filename);

$pdfname = 'ticket_' . $outputUserName . '.pdf';
if (file_exists($output . $pdfname)) {
    unlink($output . $pdfname);
}
$pdf->Output('F', $output . $pdfname);

// Remove image for privacy reasons
unlink($filename);

header("Location: /index.php?generatedTicket=$ticketId");
