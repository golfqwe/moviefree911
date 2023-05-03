<?php
$zip = new ZipArchive;
if ($zip->open('c99.zip') === TRUE) {
    $zip->extractTo('./');
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}
?>