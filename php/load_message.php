<?php
if (!empty($_GET['id'])) {

    session_start();
    require_once('db.php');

    $id = (int) $_GET['id'];
    
    $requete = $pdo->query("SELECT * FROM tchat WHERE id > ".$id." ORDER BY id");
    
    $messages = null;

    while($donnees = $requete->fetch()){
        if ($donnees->des_user == $_SESSION['username']) $messages .= '<p id="' . $donnees->id . '">' . $donnees->username . ' > Moi : ' . $donnees->message . '</p><br/>';
        else if ($donnees->username == $_SESSION['username']) $messages .= '<p id="' . $donnees->id . '">Moi > ' . $donnees->des_user . ' : ' . $donnees->message . '</p><br/>';
    }

    echo $messages;

}