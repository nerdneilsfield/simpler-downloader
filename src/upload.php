<?php
include "../config.php";

function reArrayFiles(&$file_post)
{

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

$errors = []; // Store all foreseen and unforseen errors here

$dir = $_POST["dir"];

echo $dir;

if ($_FILES['files']) {
    $file_ary = reArrayFiles($_FILES['files']);

    foreach ($file_ary as $file) {
        $uploadPath = $uploadDirectory . $dir . basename($file['name']);
        echo $uploadPath;
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];
        $fileExtension = strtolower(end(explode('.', $fileName)));

        // if (!in_array($fileExtension, $fileExtensions)) {
        //     $errors[] = "This file extension is not allowed.";
        // }

        if ($fileSize > 200000000) {
            $errors[] = "This file is more than 200MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }
}
