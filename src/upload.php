<?php

// Set variables
$target_dir = './workdir/';
$baseFile = $_FILES['fileToUpload'];
$uploadFile = $baseFile['name'];
$tmpFile = $baseFile['tmp_name'];
$fileSize = $baseFile['size'];
$target_file = $target_dir . basename($uploadFile);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$allowedFileTypes = array("jpg", "png", "jpeg", "gif");
$errors = array();

if (isset($_POST['submit'])) {

    // Check the mime type and not the extension
    if (!(isImage($tmpFile))) {
        array_push($errors, 'File is not an image.');
    }


    //Check if file already exists
    if (file_exists($target_file)) {
        array_push($errors, "File already exists.");
    }

    // Check file size
    if ($fileSize > 500000) {
        array_push($errors, "File is too large.");
    }

    // Allow certain file formats
    if (!in_array($imageFileType, $allowedFileTypes)) {
        array_push($errors, "Only files of type JPG, JPEG, PNG or GIF are allowed.");
    }

    // Check if the upload went OK, otherwise print the errors to the page
    if (count($errors) == 0) {
        move_uploaded_file($tmpFile, $target_file);
        header('Location: /index.php');  
    } else {
        header('Location: /index.php?errors=' . join("-", $errors));
    }
}

function isImage($image) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    return (explode('/', finfo_file($finfo, $image))[0] == "image");
}

?>
