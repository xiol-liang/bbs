<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
	session_start();//启动Session
	include "conn.php";//包含数据库连接文件
	$p_type = array("jpg","jpeg","bmp","gif","png");//定义图片格式数组
	$head_path = "upfiles\\head";//定义上传头像文件路径
	$picture_path ="";//初始化变量
	$file_path = "";//初始化变量
	/*  判断上传图片类型和文件大小，上传图片 */
	if(isset($_FILES['head']) && $_FILES['head']['size'] > 0 and $_FILES['head']['size'] < 700000){
		if(($postf = f_postfix($p_type,$_FILES['head']['name'])) != false){
			$picture_path = time().".".$postf;
			if($_FILES['head']['tmp_name'])
				move_uploaded_file($_FILES['head']['tmp_name'],$head_path."\\".$picture_path);
			else{
				echo "<script>alert('上传图片失败！');history.go(-1);</script>";
				exit();
			}
		}else{
			echo "<script>alert('上传图片格式错误！');history.go(-1);</script>";
			exit();
		}
	}else if(isset($_FILES['head']) && $_FILES['head']['size'] > 700000){
			echo "<script>alert('上传图片大小超出范围！');history.go(-1);</script>";
			exit();
	}
	else{
		$picture_path = "default.png";
	}
	
	
	
	$c_sql = "select * from tb_member where name = '".$_POST['name']."'";//定义查询语句
	$result = $pdo->prepare($c_sql);//准备查询
	$result->execute();//执行查询
	$c_rst=$result->fetch(PDO::FETCH_ASSOC);//将查询结果返回到数组
	if($c_rst){//如果数组为真
		if($c_rst['name']!=""){//如果name字段的值不为空
			echo "<script>alert('用户名重复，请重新输入');history.go(-1);</script>";//弹出对话框
			exit();//退出程序
		}
	}
	if($_POST['name']==""){
		echo "<script>alert('请输入用户名！');history.go(-1);</script>";
		exit();//退出程序
	}
	if($_POST['password']==""){
		echo "<script>alert('请输入密码！');history.go(-1);</script>";
		exit();//退出程序
	}
	if($_POST['password_']==""){
		echo "<script>alert('请确认密码！');history.go(-1);</script>";
		exit();//退出程序
	}
	if($_POST['password']!=$_POST['password_']){
		echo "<script>alert('两次密码输入不一致！');history.go(-1);</script>";
		exit();//退出程序
	}
	if($_POST['email']==""){
		echo "<script>alert('请输入邮箱！');history.go(-1);</script>";
		exit();//退出程序
	}
	
	if(isset($_POST['regi'])){//如果传递的regi参数有值
		$sqlstr = "insert into tb_member(name,password,email) values ('".$_POST['name']."','".$_POST['password']."','".$_POST['email']."')";//定义插入语句
	if(!$pdo->exec($sqlstr)){//如果执行语句的结果为假
		echo "<script>alert('添加错误：".$pdo->errorInfo()."');history.go(-1);</script>";//弹出对话框
	}
	else{
		echo "<script>alert('恭喜,用户注册成功.请重新登录');location='login.php';</script>";//弹出对话框
	}}
	else{
		echo "<script>alert('!@#$$#@!@#,非法登录');window.close();</script>";//弹出对话框
	}
?>