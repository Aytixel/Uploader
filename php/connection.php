<?php

$con_errors = array();
    
if (!empty($_POST['con-username']) && !empty($_POST['con-password'])) {
        
    if (filter_var($_POST['con-username'], FILTER_VALIDATE_EMAIL)) $req = $pdo->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    else $req = $pdo->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        
    $con_password = sha1($_POST['con-password']);
    $req->execute(array(htmlspecialchars($_POST['con-username']), $con_password));
    $userexist = $req->rowCount();
        
    if ($userexist == 1) {
        
        // get id
        $userid = $req->fetch();
        
        // connect user
        include('../php/connect_user.php');
        
        header('Location: profile.php');
    } 
    else $con_errors['field'] = "Le username ou le password est incorrect!";
} 
else $con_errors['field'] = "Tout les champs doivent être remplie!";