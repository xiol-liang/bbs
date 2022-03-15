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
		$commentid=$_GET['id'];
		$content=$_POST['txt_content'];
		$datetime=date("Y-m-d H:i:s");
		$sqlstr = "Insert Into tb_discuss (member_id,post_id,content,createtime) Values ('$userid','$commentid','$content','$datetime')";//定义插入语句
	if(!$pdo->exec($sqlstr)){//如果执行语句的结果为假
		echo "<script>alert('回复帖子失败！：".$pdo->errorInfo()."');history.go(-1);</script>";//弹出对话框
	}
	else{
		$quesql = "select id,discussnum from tb_post where id = ".$_GET['id'];//定义查询语句
		//$querst = $conn->execute($quesql);
		$result = $pdo->prepare($quesql);//准备查询
		$result->execute();//执行查询
		$querst=$result->fetch(PDO::FETCH_NUM);//将查询结果返回到数组
		$discussnum = $querst[1];//为变量赋值
		$discussnum += 1;//变量值自加1
		$addsql = "update tb_post set discussnum = ".$discussnum." where id = ".$_GET['id'];//定义更新语句
		if($pdo->exec($addsql)){//如果执行更新语句的结果为真
		echo "<script>alert('回复帖子成功！');window.location.href='".$_SERVER['HTTP_REFERER']."';</script>";//弹出对话框
	}}}
?>