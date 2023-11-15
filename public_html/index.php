https://crud-scandiweb-42.000webhostapp.com/<?php
$file = fopen('test.txt', 'w');
fwrite($file, 'hello world');
rewind($file);
$writtenToFile = fread($file, filesize('./test.txt'));
echo $writtenToFile;
