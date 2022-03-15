<?php
	header("Content-type: image/png");    //设置输出为图片格式
	include "conn.php";
    $l_sqlstr = "select * from tb_good where id=".$_GET['id'];
	$result = $pdo->prepare($l_sqlstr);//准备查询
	$result->execute();//执行查询
	if($l_rst=$result->fetch(PDO::FETCH_NUM)){     
    echo $l_rst[4];   
	} //输出图片 
?>