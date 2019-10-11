<?php
if (!empty($_POST['des_user']) && !empty($_POST['message'])) {
    
    session_start();
    require_once('db.php');
 
    $req = $pdo->query('SELECT username FROM user WHERE username = "'.$_POST['des_user'].'"');
    if ($result = $req->fetch()) $req = $pdo->query('INSERT INTO tchat SET username = "'.$_SESSION['username'].'", des_user = "'.$_POST['des_user'].'", message = "'.$_POST['message'].'"');
}