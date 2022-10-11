<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image upload</title>
</head>
<body>
<form action="imageUpload.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Image upload</legend>
        <p>Please select the files to upload (Max file size 200kb, max total filesize 300kb)</p>
        <input type="hidden" name="MAX_FILE_SIZE" value="200000"/>
        <input type="file" name="filesToUpload[]" id="fileToUpload" multiple accept="image/png, image/jpeg">
        <input type="submit" value="Upload Image" name="submit">
        <input type="reset" value="Reset form">
    </fieldset>
</form>
</body>
</html>