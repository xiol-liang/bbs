<?php
/*应用PDO连接数据库*/ 
$dbms = "mysql";
$host = "dev.dxdc.net";
$dbname = "a0922101904";
$user = "a0922101904";
$pwd = "58147qwe";
$dsn = "$dbms:host=$host;dbname=$dbname";
$pdo = new PDO($dsn, $user, $pwd);
$pdo->query("set names utf8");
date_default_timezone_set("PRC");
?>