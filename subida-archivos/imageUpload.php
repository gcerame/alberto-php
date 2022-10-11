<?php

define("CURRENT_DIR", getcwd());
const IMAGES_DIR = '/imgusers/';
const ALLOWED_EXTENSIONS= array('png', 'jpg');
const MAX_FILE_SIZE = '200000';
const MAX_TOTAL_FILE_SIZE = '300000';

$existingImages= scandir(CURRENT_DIR.IMAGES_DIR);


function checkFileSizes($files){
    $totalSize = 0;
    //First checks for individual file size, if it fails it won't keep checking the total size
    foreach ($files['size'] as $size){
        if ($size > MAX_FILE_SIZE){
            return false;
        }
        $totalSize += $size;
    }
    if ($totalSize > MAX_TOTAL_FILE_SIZE){
        return false;
    }
    return true;
}
function checkFileExtensions($files){
    foreach ($files['name'] as $name){
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        if (!in_array($extension, ALLOWED_EXTENSIONS)){
            return false;
        }
    }
    return true;
}
print_r($_FILES);
echo checkFileExtensions($_FILES['filesToUpload']);