<?php

define("CURRENT_DIR", getcwd());
const IMAGES_DIR = '/imgusers';
const ALLOWED_EXTENSIONS = array('png', 'jpg');
const MAX_FILE_SIZE = '200000';
const MAX_TOTAL_FILE_SIZE = '300000';

const FILESIZES_OK = 0;
const FILESIZE_TOO_LARGE = 1;
const TOTAL_FILESIZE_TOO_LARGE = 2;
const INDIVIDUAL_AND_TOTAL_FILESIZE_TOO_LARGE = 3;

function getExistingFiles($dir): array
{
    if (is_dir(CURRENT_DIR . IMAGES_DIR)) {
        return $existingImages = array_diff(
            scandir(CURRENT_DIR . IMAGES_DIR),
            array('.', '..')); //Takes away the . and ..
    }
    return [];
}

function checkFileSizes($files): int
{
    $sizes = $files['size'];

    $tooBigFiles = array_filter($sizes, function ($fileSize) {
        return $fileSize > MAX_FILE_SIZE;
    });
    $totalSize = array_reduce($sizes, function ($accumulator, $item) {
        $accumulator += $item;
        return $accumulator;
    });

    if (count($tooBigFiles) > 0 && $totalSize > MAX_TOTAL_FILE_SIZE) return INDIVIDUAL_AND_TOTAL_FILESIZE_TOO_LARGE;
    if (count($tooBigFiles) > 0) return FILESIZE_TOO_LARGE;
    if ($totalSize > MAX_TOTAL_FILE_SIZE) return TOTAL_FILESIZE_TOO_LARGE;
    return FILESIZES_OK;

}

function checkFileExtensions($files): bool
{
    foreach ($files['name'] as $name) {
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        if (!in_array($extension, ALLOWED_EXTENSIONS)) {
            return false;
        }
    }
    return true;
}

function writeFile($file, $fileName): bool
{
    if (!in_array($fileName, getExistingFiles(IMAGES_DIR))) {
        move_uploaded_file($file, CURRENT_DIR . IMAGES_DIR . '/' . $fileName);
    }
    return false;
}

function writeFiles($files): bool
{
    foreach ($files['name'] as $key => $name) {
        $file = $files['tmp_name'][$key];
        $writeFileOK = writeFile($file, $name);
        if (!$writeFileOK) {
            return false;
        }

    }
    return true;
}

if ($_FILES['filesToUpload']['error'][0] === 4) {
    echo 'You must select a file to upload';
    exit();
}

if (isset($_FILES['filesToUpload'])) {
    $filesToUpload = $_FILES['filesToUpload'];
    $fileSizesStatus = checkFileSizes($filesToUpload);
    $fileExtensionsOK = checkFileExtensions($filesToUpload);
    if ($fileSizesStatus === FILESIZES_OK && $fileExtensionsOK) {
        $writeFileStatus = writeFiles($filesToUpload);
        if (!$writeFileStatus) {
            echo 'File already exists';
            exit();
        }
        echo 'File saved';

    } else if ($fileSizesStatus !== FILESIZES_OK) {
        switch ($fileSizesStatus) {
            case FILESIZE_TOO_LARGE:
                echo 'One file is too large';
                break;
            case TOTAL_FILESIZE_TOO_LARGE:
                echo 'The total filesize is too large';
                break;
            case INDIVIDUAL_AND_TOTAL_FILESIZE_TOO_LARGE:
                echo 'Individual filesize and total filesize (of all files) is too large';
        }
    } else if (!$fileExtensionsOK) {
        echo 'File extension not allowed';
    }

}


