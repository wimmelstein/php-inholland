<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
    <form action="index.php" method="post">
        <button type="submit" name="generate" class="button btn btn-primary">Generate PDF</button>
    </form>
    <div id="message"></div>
</body>

</html>

<?php

require 'model/mypdf.php';
require 'model/user.php';
require 'lib/phpqrcode.php';

if (isset($_POST['generate'])) {
    $user = new User(null, 'Wim', 'Wiltenburg', 51);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 20);


    $pdf->Cell(0, 10, 'Wimmelsoft CodeFest', 0, 1, 'C');


    $pdf->SetFont('Arial', '', 12);

    $pdf->Ln(30);

    $pdf->Cell(0, 10, 'Dear ' . $user->getUserName(), 0, 1, 'L');

    $pdf->Ln();

    $pdf->Cell(0, 10, 'This ticket is to grant access to Wimmelsoft Codefest to: ', 0, 1, 'L');

    $pdf->Ln();

    $pdf->Cell(0, 10, 'First name: ' . $user->getFirstName(), 0, 1, 'L');
    $pdf->Cell(0, 10, 'Last name: ' . $user->getLastName(), 0, 1, 'L');

    $pdf->Ln();

    $pdf->Cell(0, 10, 'Date: ' . date('d-m-Y'), 0, 1, 'L');

    $pdf->Ln();

    $filename = 'output/' . str_replace(' ', '_', $user->getUserName()) . '.png';

    QRcode::png(md5($user->getUserName()), $filename, 'L', 4, 2);

    $pdf->Image($filename);

    $pdf->Output('F', 'output/ticket.pdf');

    // Remove image for privacy reasons
    unlink($filename);

    //echo "PDF created in output folder";

    echo <<<END
    <script type="text/javascript" src="js/script.js"></script>
END;

}
?>