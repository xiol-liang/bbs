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
if($_POST['type1']=="请选择类别"){
	echo"<script>alert('类别不能为空！');history.go(-1);</script>";
	exit();
}
if(isset($_POST['submit'])){//如果传递的regi参数有值
		// $sql = "select id,title from tb_type1 where title='".$_POST['type1']."'";//定义查询语句
		// $result = $pdo->prepare($sql);//准备查询
		// $result->execute();//执行查询
		// $rst = $result->fetch(PDO::FETCH_NUM);//将查询结果返回到数组中
		// $sql2 = "select id from tb_type2 where id='".$_POST['type2']."'";//定义查询语句
		// $result2 = $pdo->prepare($sql2);//准备查询
		// $result2->execute();//执行查询
		// $rst2 = $result2->fetch(PDO::FETCH_NUM);//将查询结果返回到数组中
		// $type1=$_POST['type1'];".$_POST['type1']."
		// $type2=.$_POST['type2'].;".$_POST['type2']."
		$title=$_POST['title'];
		$content=$_POST['content'];
		$date1=date("Y-m-d");
		$datetime=date("Y-m-d H:i:s");
		// $sqlstr = "Insert Into tb_reply1 (member_id,discuss_id,content,createtime) Values ('$userid','$userid','$title','$datetime')";//定义插入语句
		$sqlstr = "Insert Into tb_post (member_id,type1_id,type2_id,title,content,createtime,now) Values ('$userid','".$_POST['type1']."','".$_POST['type2']."','$title','$content','$date1','$datetime')";//定义插入语句
	if(!$pdo->exec($sqlstr)){//如果执行语句的结果为假
		echo "<script>alert('发布帖子失败！：".$pdo->errorInfo()."');history.go(-1);</script>";//弹出对话框
	}
	else{
		echo "<script>alert('发布帖子成功！');window.location.href='".$_SERVER['HTTP_REFERER']."';</script>";//弹出对话框
	}}
?>