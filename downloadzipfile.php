<?php
$filename=$_GET["code"];

if (file_exists($filename)) {
    header('Content-Type: application/zip');
    header('Content-Length: ' . filesize($filename));

    // download zip
    readfile($filename);
    
}
 ?>