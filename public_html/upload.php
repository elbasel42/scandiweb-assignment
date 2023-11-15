<?php
$uploadedFilesDir = 'uploads/';
$maxFileSize = 50_0000;

// Get file info 
$uploadedFile = $_FILES['file-upload'];
$fileName = $uploadedFile['name'];
$fileTempName = $uploadedFile['tmp_name'];
$fileSize = $uploadedFile['size'];

$savePath = $uploadedFilesDir . $fileName;
// Get file Type
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
$fileType = strtolower($fileType);
// Check if the user actually uploaded a file or not.
$fileOk = !empty($fileName);

// Die if no file uploaded since the following code
// will produce an error if the file is not uploaded.
if (!$fileOk) {
    echo "No File Uploaded";
    die;
}

// Check if file is an image
$imageInfo = getimagesize($fileTempName) ?? false;
$fileIsAnImage = $imageInfo ?? false;

if (!$fileIsAnImage) {
    echo "File is not an image";
    die;
}

// Get image type
$imageMime = $imageInfo['mime'];
$fileExists = file_exists($savePath) ? 'true' : 'false';

// Check file size
if ($fileSize > $maxFileSize) {
    echo "File size is too big";
    die;
}

// Only allow certain image types
$allowedTypes = ['png', 'jpg', 'jpeg'];
$typeIsAllowed = in_array($fileType, $allowedTypes);

if (!$typeIsAllowed) {
    echo "Image type is not allowed, only png, jpg and jpeg are allowed";
    die;
}

// Save file is all checks pass
move_uploaded_file($fileTempName, $savePath);

echo "file uploaded successfully!";
echo "<br />";
echo "<br />";
echo  "fileName: $fileName";
echo "<br />";
echo "fileType: $fileType";
echo "<br />";
echo "fileTempName: $fileTempName";
echo "<br />";
echo "imageMime: $imageMime";
echo "<br/ >";
echo "fileExists: $fileExists";
echo "<br />";
echo "fileSize: $fileSize";
echo "<br />";
echo "type is allowed: " . ($typeIsAllowed ? "true" : "false");
echo "<br />";

