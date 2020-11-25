<?php

// Set variables
$target_dir = './workdir/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$allowedFileTypes = array("jpg", "png", "jpeg", "gif");
$errors = array();

//Check if image file is a actual image or fake image and if the file has actually reached the server
if (isset($_POST) && isset($_FILES['file'])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']) or die('bla');
    // Check the mime type and not the extension
    if (!explode('/', $check['mime'])[0] == "image") {
        array_push($errors, "File is not an image.");
    }
}

//Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "File already exists.");
}

// Check file size
if ($_FILES['fileToUpload']['size'] > 500000) {
    array_push($errors, "File is too large.");
}

// Allow certain file formats
if (!in_array($imageFileType, $allowedFileTypes)) {
    array_push($errors, "Only files of type JPG, JPEG, PNG or GIF are allowed.");
}

// Check if the upload went OK, otherwise print the errors to the page
if (count($errors) == 0) {
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
    header('Location: /index.php');  
} else {
    header('Location: /index.php?errors=' . join("-", $errors));
}


?>