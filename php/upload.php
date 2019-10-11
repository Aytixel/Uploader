<?php
if (!empty($_FILES)) {
     $file = $_FILES['file'];
    
     for ($file_num = 0; $file_num < count($file['name']); $file_num++) {
         if ($file['error'][$file_num] == 0) {
            $req = $pdo->prepare("INSERT INTO file_list SET user_id = ?, file = ?, file_name = ?");
            $tmp_file_name = explode(".", $file['name'][$file_num]);
            $file_name;
            for ($i = 0; $i < count($tmp_file_name) - 1; $i++) {
                global $file_name;
                if ($i > 0) $file_name .= ".";
                $file_name .= $tmp_file_name[$i];
            }
            $req->execute(array($_SESSION['id'], $file['name'][$file_num], $file_name));
            move_uploaded_file($file['tmp_name'][$file_num], "../document-storage/" . $_SESSION['id'] . "/" . $file['name'][$file_num]);
            $file_name = null;
         } 
     }
}