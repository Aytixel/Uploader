<?php
$pdo = new PDO('mysql:dbname=a3407628_member;host=mysql6.000webhost.com', 'a3407628_root', 'uploader1');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);