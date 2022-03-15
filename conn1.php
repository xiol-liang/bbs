<?php
/*应用PDO连接数据库*/ 
$dbms = "mysql";
$host = "localhost";
$dbname = "db_bbs";
$user = "root";
$pwd = "root";
$dsn = "$dbms:host=$host;dbname=$dbname";
$pdo = new PDO($dsn, $user, $pwd);
$pdo->query("set names utf8");
date_default_timezone_set("PRC");
?>