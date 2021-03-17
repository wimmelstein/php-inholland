<?php
include_once dirname(__FILE__) . '/../bootstrap.php';

use app\model\PDF;
use chillerlan\QRCode\QRCode;

$pdo = Bootstrap::getPDO();
$ticketId = $_GET['id'];
$stmt = $pdo->prepare("select * from tickets where id=:id");
$stmt->execute(['id' => $ticketId]);
$ticket = $stmt->fetch();

$stmt = $pdo->prepare("select * from users u, tickets t, events e where u.id = t.user_id and t.id = :ticketId and t.event_id = e.id");
$stmt->execute(['ticketId' => $ticketId]);
$data = $stmt->fetch();

$fullUserName = sprintf("%s %s", $data['first_name'], $data['last_name']);
$outputUserName = str_replace(' ', '_', $fullUserName);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 20);

$output = dirname(__FILE__) . '/output/';
$pdf->Cell(0, 10, $data['type'], 0, 1, 'C');


$pdf->SetFont('Arial', '', 12);

$pdf->Ln(30);

$pdf->Cell(0, 10, 'Dear ' . $fullUserName, 0, 1, 'L');

$pdf->Ln();

$pdf->Cell(0, 10, "This ticket gives access to Inholland Haarlem Festival to: ", 0, 1, 'L');

$pdf->Ln();

$pdf->Cell(0, 10, 'First name: ' . $data['first_name'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Last name: ' . $data['last_name'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Event: ' . $data['type'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Date: ' . $data['date'], 0, 1, 'L');


$pdf->Ln();


$pdf->Ln();

$pdf->Cell(0, 10, 'Present your ticket with QR Code below at the entrance of the event', 0, 1, 'L');

$filename = $ticketId . '.png';

$qrcode = new QRCode();

$url = sprintf('<a href="http://wiltenburg.tech/checkin.php?id=%s">Checkin to the event</a>', $ticketId);
$qrcode->render($url, $filename);
$pdf->Image($filename);

$pdfname = $ticketId . '.pdf';
if (file_exists($output . $pdfname)) {
    unlink($output . $pdfname);
}
$pdf->Output('F', $output . $pdfname);

// Remove image for privacy reasons
unlink($filename);

header("Location: /index.php?generatedTicket=$ticketId");
