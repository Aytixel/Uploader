<?php

session_start();
require_once '../php/db.php';

if (isset($_POST['logout'])) include('../php/logout_user.php');

if (isset($_POST['supr-user'])) {
    include('../php/supr_user.php');
    include('../php/logout_user.php');
}

?>

<html lang="fr-FR">
    
    <head>
        
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/font-style.css">
		<link rel="stylesheet" type="text/css" href="../css/style3.css">
        <script type="text/javascript" src="../javascript/jquery-3.1.0.min.js"></script>
        
    </head>
    
    <body>
        
        <?php 
        $req = $pdo->query("SELECT id FROM user WHERE id = '".$_SESSION['id']."'");
        $result = $req->fetch();
        if ($result == true) {
    
        include('../php/edit_user.php');
        include("../php/supr_file.php");
        include("../php/upload.php");
        ?>
        
        <h1 class="top">
            <form  method="POST" action="">
                <div class="title">Profile</div>
                <input class="title-button" name="logout" type="submit" value="Logout" />
            </form>
        </h1>
        
        <span class="case" id="profile">
            <h1>Profile</h1>
            <br/>
            <table>
                <form method="post" action="">
                    <tr><td><input class="text" type="text" name="pseudo" placeholder="Pseudo : <?php echo $_SESSION['username']; ?>" /></td></tr>
                    <tr><td><input class="text" type="email" name="email" placeholder="Email : <?php echo $_SESSION['email']; ?>" /></td></tr>
                    <tr><td><input class="text" type="password" name="password" placeholder="Mot de passe" /></td></tr>
                    <tr><td><input class="button" type="submit" name="modifier" value="Appliquer les modifications" /></td></tr>
                </form>
                <form method="post" action=""><tr><td><input class="button" type="submit" name="supr-user" value="Supprimer votre compte" /></td></tr></form>
            </table>
            <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<br/>".$error;
                }
            }
            ?>
        </span>
        
        <span class="case" id="upload">
            <h1>Upload</h1>
            <br/>
            <form method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr><td><input name="file[]" class="file" type="file" multiple /><div class="upload-label" onclick="$('.file').trigger('click');">Choisir un fichier</div></td></tr>
                    <tr><td><input name="upload" class="button" type="submit" value="Upload" /></td></tr>
                </table>
            </form>
        </span>
        
        <span class="case" id="files">
            <h1>Mes Fichier</h1>
            <br/>
            <form method="post" action="" class="files">
                <?php
                $req = $pdo->query("SELECT file_id, user_id, file FROM file_list WHERE user_id = '".$_SESSION['id']."'");
                $i = 0;
                for ($result = $req->fetch(); $result != false;) {
                    echo '<div class="file-link"><input id="'.$i.'" type="checkbox" name="supr-file[]" value="'.$result->file_id.'" /><label for="'.$i.'" /><a href="../php/download.php?id='.$result->file_id.'">'.$result->file.'</a></div>';
                    $result = $req->fetch();
                    $i++;
                }
                ?>
                <input name="supprimer" id="supr-button" class="button" type="submit" value="Supprimer les fichiers selectionner" />
            </form>
        </span>
        
        <span class="case" id="tchat">
            <h1>Tchat</h1>
            <br/>
            <table>
                <tr><td><div class="message-frame"></div></td></tr>
                <form method="post" action="">
                    <tr><td><textarea id="tchat-message" class="message" name="message"></textarea></td></tr>
                    <tr><td><input id="tchat-des-message" class="text" type="text" placeholder="Pseudo du/des destinataire(s)" /></td></tr>
                    <tr><td><input id="tchat-sub" class="button" type="submit" value="Envoyer" /></td></tr>
                </form>
            </table>
            <script type="text/javascript" src="../javascript/tchat.js"></script>
        </span>
        
        <?php } else header("Location: ins-con.php"); ?>
        
    </body>
    
</html>