<?php
$zip = new ZipArchive();
if ($zip->open('test.zip', ZipArchive::CREATE) === TRUE) {
    echo 'Ekstensi ZIP diaktifkan!';
    $zip->close();
} else {
    echo 'Ekstensi ZIP tidak diaktifkan.';
}
