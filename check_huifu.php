<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include "conn.php";
date_default_timezone_set("PRC");
if(isset($_SESSION['name'])){
	$user = $_SESSION['name'];
}
if(isset($_SESSION['id'])){
	$userid = $_SESSION['id'];
}
if($_POST['txt_content']==""){
	echo"<script>alert('回复不能为空！');history.go(-1);</script>";
	exit();
}

if(isset($_POST['submit'])){//如果传递的regi参数有值 
		$discussid=$_GET['id'];
		$content=$_POST['txt_content'];
		$datetime=date("Y-m-d H:i:s");
		$sqlstr = "Insert Into tb_reply1 (member_id,discuss_id,content,createtime) Values ('$userid','$discussid','$content','$datetime')";//定义插入语句
	if(!$pdo->exec($sqlstr)){//如果执行语句的结果为假
		echo "<script>alert('回复失败！：".$pdo->errorInfo()."');history.go(-1);</script>";//弹出对话框
	}
	else{
		echo "<script>alert('回复成功！');window.location.href='".$_SERVER['HTTP_REFERER']."';</script>";//弹出对话框
	}}
?>