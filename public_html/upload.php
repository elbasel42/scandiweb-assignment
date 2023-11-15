<?php

$fileUpload = $_FILES['file-upload'];

foreach ($fileUpload as $key => $value) {
    echo "$key: $value";
    echo "<br/>";
}

$baseName = basename($fileUpload['name']);
echo "baseName: $baseName";
?>
