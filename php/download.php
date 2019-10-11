<?php

session_start();
require_once '../php/db.php';

$req = $pdo->query("SELECT file FROM file_list WHERE file_id = '".$_GET['id']."'");
$result = $req->fetch();

$file = "../document-storage/".$_SESSION['id']."/".$result->file;

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}