<?php
	session_start();//启动Session
	header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
	session_destroy();//销毁Session//先销毁，再注册
?>

<script language="javascript">
	location="reg.php";
</script>