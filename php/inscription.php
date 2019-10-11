<?php

$errors = array();
    
if (empty($_POST['ins-pseudo'])) $errors['pseudo'] = "Vous devez entrer un pseudo!";
elseif (strlen($_POST['ins-pseudo']) >= 255) $errors['pseudo'] = "Votre pseudo est trop long!";
elseif (!ctype_alnum($_POST['ins-pseudo'])) $errors['pseudo'] = "Votre pseudo doit etre alphanumérique!";
else {
    $req = $pdo->query("SELECT id FROM user WHERE username = '".$_POST['ins-pseudo']."'");
    $user = $req->fetch();
    if ($user) $errors['pseudo'] = "Votre pseudo est déjà pris!";
}
if (empty($_POST['ins-email'])) $errors['email'] = "Vous devez entrer un email!";
elseif (!filter_var($_POST['ins-email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = "Vous devez entrer un email valide!";
else {
    $req = $pdo->query("SELECT id FROM user WHERE email = '".$_POST['ins-email']."'");
    $email = $req->fetch();
    if ($email) $errors['email'] = "Votre email est déjà pris!";
}
if (empty($_POST['ins-password'])) $errors['password'] = "Vous devez entrer un password!";
elseif ($_POST['ins-password'] != $_POST['ins-password2']) $errors['password'] = "Les deux password ne sont pas identique!";
    
if (empty($errors)) {
        
    // create user
    $req = $pdo->prepare("INSERT INTO user SET username = ?, password = ?, email = ?");
    $password = sha1($_POST['ins-password']);
    $req->execute(array(htmlspecialchars($_POST['ins-pseudo']), $password, htmlspecialchars($_POST['ins-email'])));
        
    // get id
    $req = $pdo->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $con_password = sha1($_POST['ins-password']);
    $req->execute(array(htmlspecialchars($_POST['ins-pseudo']), $con_password));
    $userid = $req->fetch();
    
    // create repertoire
    mkdir("../document-storage/".$userid->id, 0777);
        
    // connect user
    include('../php/connect_user.php');
    
    header('Location: profile.php');
}