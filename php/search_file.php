<?php
if (isset($_POST['search-button']) && !empty($_POST['search-text'])) {
    $search = explode(" ", $_POST['search-text']);
    $file_list = array();
    $i = 0;
    foreach ($search as $mot) {
        $req = $pdo->query("SELECT file, file_id, user_id, file_name FROM file_list WHERE file LIKE '%$mot%'");
        for ($result = $req->fetch(); $result != false;) {
            $file_id = $result->file_id;
            $file = $result->file;
            $count_file = count($file_list);
            if ($count_file == 0) {
                write_link($file_id, $result->file_name);
                $file_list[$i] = $file;
            } else {
                $existe = false;
                for ($j = 0; $j != $count_file; $j++) if ($file_list[$j] == $file) $existe = true;
                if ($existe == false) {
                    write_link($file_id, $result->file_name);
                    $file_list[$i] = $file;
                }
            }
            $result = $req->fetch();
            $i++;
        }
    }
}

function write_link ($file, $file_name) {
    echo "<div class='file'><a href='../php/download.php?id=".$file_id."'>".$file_name."</a></div>";
}