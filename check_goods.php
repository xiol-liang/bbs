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

$tpmc=$_POST['tpmc'];//获取上传物品名称
if(isset($_POST['submit'])){//如果传递的regi参数有值
		// $type1=$_POST['type1'];".$_POST['type1']."
		// $type2=.$_POST['type2'].;".$_POST['type2']."
		$tpmc=htmlspecialchars($tpmc);      //将图片名称中的特殊字符转换成HTML格式
		$tpmc=str_replace("\n","<br>",$tpmc);      //将图片名称中的回车符以自动换行符取代   
		$tpmc=str_replace(" ","&nbsp;",$tpmc);       //将图片名称中的空格以"&nbsp;"取代        					
		$profix = array(".jpg",".gif",".jpeg",".png");				//设置允许上传的文件后缀类型
		$f_name = $_FILES['file']['name'];				//取得要上传的文件名
		$pro_name=substr($f_name,strrpos($f_name,"."));	//取得上传文件的后缀
		/*判断上传文件的类型是否为允许类型*/
		if(!in_array(strtolower($pro_name), $profix)){	
			echo "<script>alert('文件格式不对');history.go(-1);</script>";
			exit();
		}
		/*判断上传文件的大小，如果文件过大，提示错误*/
		if($_FILES['file']['size'] > 500000){
			echo "<script>alert('上传图片过大,请重新上传！');history.go(-1)</script>";	
			exit();
		}
		$fp=fopen($_FILES['file']['tmp_name'],"r");       //以只读方式打开文件
		$file=addslashes(fread($fp,filesize($_FILES['file']['tmp_name'])));       //将文件中的引号部分加上反斜线
		
		
		
		
		$price=$_POST['price'];
		$content=$_POST['content'];
		$datetime=date("Y-m-d H:i:s");  //设置物品的上传时间
		// $sqlstr = "Insert Into tb_reply1 (member_id,discuss_id,content,createtime) Values ('$userid','$userid','$title','$datetime')";//定义插入语句
		$sqlstr = "Insert Into tb_good (member_id,gdname,price,file,message,time) Values ('$userid','$tpmc','$price','$file','$content','$datetime')";//定义插入语句
	if(!$pdo->exec($sqlstr)){//如果执行语句的结果为假
		echo "<script>alert('发布物品失败！：".$pdo->errorInfo()."');history.go(-1);</script>";//弹出对话框
	}
	else{
		echo "<script>alert('发布物品成功！');window.location.href='".$_SERVER['HTTP_REFERER']."';</script>";//弹出对话框
	}}
?>