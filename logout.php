<?php
	session_start();//启动Session
	header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
	session_destroy();//销毁Session
?>
<script language="javascript">
	alert("已经安全退出!");
	location="index.php";
</script>