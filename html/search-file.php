<?php

session_start();
require_once '../php/db.php';

if (isset($_POST['logout'])) include('../php/logout_user.php');

?>

<html lang="fr-FR">
    
    <head>
        
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/font-style.css">
		<link rel="stylesheet" type="text/css" href="../css/style4.css">
        <script type="text/javascript" src="../javascript/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="../javascript/reco-voca.js"></script>
        
    </head>
    
    <body>
        
        <h1 class="top">
            <form method="POST" action="">
                <div class="title">Rechercher un fichier</div>
                <?php
                $req = $pdo->query("SELECT id FROM user WHERE id = '".$_SESSION['id']."'");
                $result = $req->fetch();
                if ($result != false) {
                ?>
                <input class="title-button" name="logout" type="submit" value="Logout" />
                <?php } ?>
            </form>
        </h1>
        
        <div class="search-bar">
            <form  method="POST" action="">
                <input name="search-button" class="button-bar" type="submit" value="Rechercher" />
                <input name="search-text" class="text-bar" id="text-bar" typer="text" placeholder="Entrer votre recherche ici" />
                <img class="reco-btn" src="http://uploader.comli.com/ressouces/mic.png" height="30" width="30" onclick="recognition.start();"></img>
            </form>
        </div>
    
        <?php include('../php/search_file.php'); ?>
        
    </body>
    
</html>