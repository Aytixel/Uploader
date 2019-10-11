<?php

session_start();
require_once '../php/db.php';

if (isset($_POST['connection'])) {
    include('../php/connection.php');
}

if (isset($_POST['inscription'])) {
    include('../php/inscription.php');
}

?>

<html lang="fr-FR">
    
    <head>
        
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/font-style.css">
		<link rel="stylesheet" type="text/css" href="../css/style2.css">
        
    </head>
    
    <body>
        
        <h1 class="top"><div class="title">Inscription Et Connection</div></h1>
        
        <span class="case" id="inscription">
            <h1>Inscription</h1>
            <br />
            <form method="POST" action="">
                <table>
                    <tr><td><input class="text" type="text" placeholder="Pseudo" name="ins-pseudo" /></td></tr>
                    <tr><td><input class="text" type="email" placeholder="Email" name="ins-email" /></td></tr>
                    <tr><td><input class="text" type="password" placeholder="Mot de passe" name="ins-password" /></td></tr>
                    <tr><td><input class="text" type="password" placeholder="Retaper le mot de passe" name="ins-password2" /></td></tr>
                    <tr><td><input class="button" type="submit" name="inscription" value="S'inscrire" /></td></tr>
                </table>
            </form>
            <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<br/>".$error;
                }
            }
            ?>
        </span>
        
        <span class="case" id="connection">
            <h1>Connection</h1>
            <br />
            <form method="POST" action="">
                <table>
                    <tr><td><input class="text" type="text" placeholder="Pseudo ou Email" name="con-username" /></td></tr>
                    <tr><td><input class="text" type="password" placeholder="Mot de passe" name="con-password" /></td></tr>
                    <tr><td><input class="button" type="submit" name="connection" value="Connection" /></td></tr>
                </table>
            </form>
            <?php
            if (!empty($con_errors)) {
                foreach ($con_errors as $error) {
                    echo "<br/>".$error;
                }
            }
            ?>
        </span>
        
    </body>
    
</html>