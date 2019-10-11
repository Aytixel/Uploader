<?php
$id = $_SESSION['id'];
$files = scandir("../document-storage/".$id, 1);
foreach ($files as $file) {
    if ($file != "." && $file != "..") unlink("../document-storage/".$id."/".$file);
}
rmdir("../document-storage/".$id);
$req = $pdo->query("DELETE FROM user WHERE id = ".$id);
$req = $pdo->query("DELETE FROM file_list WHERE user_id = ".$id);