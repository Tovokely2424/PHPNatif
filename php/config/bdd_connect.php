<?php
$host = 'localhost';
$database = 'cntmad';
$user = 'root';
$db_password = '';
$db_conect = new PDO('mysql:host='.$host.';dbname='.$database, $user, $db_password);
$db_conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>