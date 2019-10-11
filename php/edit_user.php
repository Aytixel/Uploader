<?php
$errors = array();

if (isset($_POST['modifier'])) {
    if (empty($_POST['pseudo'])) $pseudo = $_SESSION['username'];
    elseif (!ctype_alnum($_POST['pseudo'])) $errors['pseudo'] = "Votre pseudo doit etre alphanumérique!";
    else {
        $pseudo = $_POST['pseudo'];
        $req = $pdo->query("SELECT id FROM user WHERE username = '".$_POST['pseudo']."'");
        $user = $req->fetch();
        if ($user) $errors['pseudo'] = "Votre pseudo est déjà pris!";
    }
    if (empty($_POST['email'])) $email = $_SESSION['email'];
    else {
        $email = $_POST['email'];
        $req = $pdo->query("SELECT id FROM user WHERE email = '".$_POST['email']."'");
        $email = $req->fetch();
        if ($email) $errors['email'] = "Votre email est déjà pris!";
    }
    if (empty($_POST['password'])) $password = $_SESSION['password'];
    else $password = sha1($_POST['password']);
    if (empty($errors)) {
        $req = $pdo->query("UPDATE user SET username = '".htmlspecialchars($pseudo)."', email = '".htmlspecialchars($email)."', password = '".$password."' WHERE id = '".$_SESSION['id']."'");
        $_SESSION['username'] = $pseudo;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
    }
}