<?php
if (isset($_POST['supprimer']) && !empty($_POST['supr-file'])) {
    foreach ($_POST['supr-file'] as $file_id) {
        $req = $pdo->query("SELECT file FROM file_list WHERE file_id = '".$file_id."'");
        $file = $req->fetch();
        unlink("../document-storage/".$_SESSION['id']."/".$file->file);
        $req = $pdo->query("DELETE FROM file_list WHERE file_id = '".$file_id."'");
    }
}