<?php

define("CURRENT_DIR", getcwd());
const IMAGES_DIR = '/imgusers';
const ALLOWED_EXTENSIONS = array('png', 'jpg');
const MAX_FILE_SIZE = '200000';
const MAX_TOTAL_FILE_SIZE = '300000';

function createImagesDir(): void
{
    if (!is_dir('.' . IMAGES_DIR)) {
        mkdir(IMAGES_DIR);
    }
}

function getExistingFiles($dir): array
{
    if (is_dir(CURRENT_DIR . IMAGES_DIR)) {
        return $existingImages = array_diff(scandir(CURRENT_DIR . IMAGES_DIR), array('.', '..'));
    }
    return [];
}

function saveFile($file)
{
}


function checkFileSizes($files): bool
{
    $totalSize = 0;
    //First checks for individual file size, if it fails it won't keep checking the total size
    foreach ($files['size'] as $size) {
        if ($size > MAX_FILE_SIZE) {
            return false;
        }
        $totalSize += $size;
    }
    if ($totalSize > MAX_TOTAL_FILE_SIZE) {
        return false;
    }
    return true;
}

function getFileExtension($fileName): string
{
    return pathinfo($fileName, PATHINFO_EXTENSION);

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

echo checkFileSizes($_FILES['filesToUpload']);
echo checkFileExtensions($_FILES['filesToUpload']);
createImagesDir();
print_r(getExistingFiles(IMAGES_DIR));