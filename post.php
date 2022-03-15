<?php
session_start();        			//启动Session
include "conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>发布新帖</title>
		<link rel="shortcut icon" href="images/bbs.png" type="image/x-icon" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<meta name="keywords" content="web后台,PHP,制作的音乐网xiongliang,熊亮,个人网页,个人网站,熊亮的个人网页,计算机,做网站,web前端" />
		<meta name="description" content="欢迎大家来到校园论坛，这是熊亮制作的一个论坛网站，在这里你可以和广大校友一起讨论各种有趣的话题" />
		<!--
		                                           	作者：2318751031@qq.com
		                                           	时间：2019-12-29
		                                           	描述：搜索引擎优化
		                                           -->
		<link rel="stylesheet" href="css/bootstrap.css" charset="UTF-8" />
		<link rel="stylesheet" href="css/style.css" charset="utf-8">
		<link rel="stylesheet" href="css/post.css" charset="utf-8">
		<link  media="screen and (max-width:1300px)" href="css/max1300.css" rel="stylesheet">
		<link  media="screen and (max-width:1080px)" href="css/max1080.css" rel="stylesheet">
		<link  media="screen and (max-width:767px)" href="css/max768.css" rel="stylesheet">
		<script src="js/chk.js"></script>
		<script type="text/javascript">
			function chk_login(){
				var name = "<?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?>";//为变量赋值
				if(name == ""){             	//如果变量name的值为空
					alert('请登录！');//弹出对话框
					location=('login.php');
					return false;           		//返回false，使用户无法播放歌曲
				}else{
					return true;            		//返回true，会员可以播放歌曲
				}
			}
		</script>
		<script language="javascript">
		function post_chk(){
			if(this.myform.type1.value == "请选择类别"){
				alert("类别不能为空！");
				this.myform.type1.focus();
				return false;
			}
			if(this.myform.type2.value == "标题"){
				alert("标题不能为空！");
				this.myform.type2.focus();
				return false;
			}
			if(this.myform.title.value == ""){
				alert("主题不能为空！");
				this.myform.title.focus();
				return false;
			}
			if(this.myform.content.value == ""){
				alert("内容不能为空！");
				this.myform.content.focus();
				return false;
			}
		}
		</script>
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	</head>
	<body>
		<div class="daohang">
			<div class="container" style="background-color: #FFFFFF; height: 50px;">
			<nav>
			<div class="logo">
				<a href="index.php"><img src="images/bbs1.png" alt=""></a>
			</div>
			<!-- 控制menu -->
			<div class="nav-menu">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div id="logreg" class="hidden-xs">
				<?php
					if(isset($_SESSION['name'])){//如果Session变量name被设置
						include "conn.php";//包含数据库连接文件
						$sql = "select grade,counts from tb_member where name = '".$_SESSION['name']."'";//定义查询语句
						$result = $pdo->prepare($sql);//准备查询
						$result->execute();//执行查询
						$rst = $result->fetch(PDO::FETCH_NUM);//将查询结果返回到数组中
			
			
				?>
				<table width="100%" border="0" bgcolor="" style="position:relative;">
					<tr>
					  <td>欢迎您！<font style="color: #FF0000;"><?php echo $_SESSION['name'];?></font></td>
					  <td rowspan="3" align="center">
						  <img src="images/head.png" width="24" height="24" /><div class="carect"></div>
						  <ul class="menu">
						    <li><a href="user.php" target="_self">个人中心</a></li>
						    <li><a href="#" onclick="return l_chk();" />退出登录</a></li>
						  </ul>
					  </td>
					</tr>
				</table>
			  
				<?php
					}else{
				?>
				<div id="logreg_" style="margin-top: -4px;" class="hidden-xs">
					<a href="user.php" onclick="return chk_login()"><img width="24px" src="images/head.png" style="position: relative;top: 7px;"></a>
					<a href="login.php" style="position: relative;top: 8px;">登录 |</a>&nbsp;<a href="reg.php"style="position: relative;top: 8px;">注册</a>
				</div>
					<?php
						}
					?>
				</div>
				<div id="search">
					<div class="search d1">
						  <form name="found" method="post" action="show.php">
								<input type="hidden" name="action" value="l_found" />
								<input type="text" name="k_word" placeholder="搜索帖子...">
								<button name="query" type="submit"><img width="100%" src="images/搜索 (1).png"></button>
						  </form>
					</div>
						  
				</div>
			<div class="dnav">
				
				<!-- 菜单 -->
				  <ul class="nav-list">
				    <li><a href="index.php">首页</a></li>
				    <li>
						<a href="sort.php">论坛分类<div class="carect"></div></a>
						<ul class="menu">
						  <li><a href="xuexi.php">学习区</a></li>
						  <li><a href="shenghuo.php">生活区</a></li>
						  <li><a href="xinwen.php">新闻区</a></li>
						  <li><a href="yundong.php">运动区</a></li>
						</ul>
					</li>
				    <li><a href="college.php">学院专区</a></li>
				    <li><a href="campus.php">校园淘</a></li>
				    
				    <li><a href="contact.php">联系我们</a></li>
					<li><a href="post.php"  onclick="return chk_login()" class="visible-xs active">我要发帖</a></li>
					<li><a href="post.php"  onclick="return chk_login()" class="hidden-xs active" style="border: 1px solid rgb(65, 161, 242);">我要发帖</a></li>
					<li><a href="user.php" onclick="return chk_login()" class="visible-xs">个人中心</a></li>
					<li class="visible-xs"><a href="login.php" style="border-top: 1px solid rgb(65, 161, 242);">登录</a> <a href="reg.php">注册</a></li>
				  </ul>
				
			</div>
			
			</nav>
			</div>
		</div>
		<div class="container" style="background: #FFFFFF;">
			<div class="kong">
				
			</div>
			<div id="box">
			<div class="box1">
				<form name="myform" method="post" action="check_post.php">
					<div class="select1">
						<select name="type1" id="form1" required="required" onchange="getSelectValue(this.options[this.options.selectedIndex].value)" style="float: left;">
						  <option>请选择类别</option>
						
						</select>
						
						<select name="type2" id="form2" required="required" onchange="getSelectValue(this.options[this.options.selectedIndex].value)" style="float: right;">
						  <option>请选择标题</option>
						  
						</select>
					</div>
				<div class="select2" style="margin-top: 35px;">
					<div class="hpost">帖子主题</div>
					<div class="txtpost"> 
						<div class="txtpost1">
						  <input type="text" name="title" placeholder="请给帖子取个主题" class="" id="text1" style="width: 100%;height: 100%;">
						</div>
					</div>
				</div>
				<div class="select3" style="margin-top: 35px;">
				<div class="hpost">帖子内容</div>
				<div class="txtpost">
					<div class="txtpost1">
					  <textarea name="content" placeholder="请输入帖子内容" class="" id="text2" style="width: 100%;height: 100%;"></textarea>
					</div>
				</div>
				</div>
				<div class="select3" style="margin-top: 75px; height: 100px;">
				<input type="submit" name="submit" value="提交" onClick="return post_chk();">
				<input type="reset" name="submit1" value="重置" style="margin-left: 15px;">
				</div>
				</form>
				</div>
			</div>
			
			
		</div>
		<div class="footer">
			<div class="footer_">
				<div class="biaoti">重庆师范大学校园BBS</div>
				<div class="guangao">
					重庆师范大学计算机与信息科学学院 Copyright © 2018级计科熊亮 版权所有<br /><br>
					Tel:15320520630 邮箱:2318751031@qq.com<br /><br>
					专注于网页制作，只为打造更好更美的网页！
				</div>
			</div>
		</div>
		<script>
			var data = {
			    
				<?php
				 		$l_sqlstr = "select * from tb_type1 order by id";//定义查询语句
				 		$result = $pdo->prepare($l_sqlstr);//准备查询
				 		$result->execute();//执行查询
				 		if($l_rst=$result->fetch(PDO::FETCH_NUM)){
				 ?>
			    type1: [
			      <?php
			      		$result = $pdo->prepare($l_sqlstr);//准备查询 
			      		$result->execute();//执行查询
			      		while($l_rst=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
			      ?>
				  {
			        name: '<?php echo $l_rst[0]; ?>',
			        title: '<?php echo $l_rst[1]; ?>',
			      },
			      
			    
				<?php			
						}
						}
				?>
			  ],
			    
				
			   type2: {
				 <?php
				  		$l_sqlstr1 = "select * from tb_type2 where type1_id='1' order by id";//定义查询语句
				  		$result = $pdo->prepare($l_sqlstr);//准备查询
				  		$result->execute();//执行查询
				  		if($l_rst1=$result->fetch(PDO::FETCH_NUM)){
				  ?>
			     1: [
			       <?php
			       		$result = $pdo->prepare($l_sqlstr1);//准备查询 
			       		$result->execute();//执行查询
			       		while($l_rst1=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
			       ?>
			       {
			         name: '<?php echo $l_rst1[0]; ?>',
			         title: '<?php echo $l_rst1[2]; ?>',
			       },
				   <?php
				   		}}
				   ?>
				],
				<?php
				 		$l_sqlstr2 = "select * from tb_type2 where type1_id='2' order by id";//定义查询语句
				 		$result = $pdo->prepare($l_sqlstr);//准备查询
				 		$result->execute();//执行查询
				 		if($l_rst2=$result->fetch(PDO::FETCH_NUM)){
				 ?>
				2:[
					<?php
							$result = $pdo->prepare($l_sqlstr2);//准备查询 
							$result->execute();//执行查询
							while($l_rst2=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
					?>
					{
					  name: '<?php echo $l_rst2[0]; ?>',
					  title: '<?php echo $l_rst2[2]; ?>',
					},
					<?php
							}}
					?>
				],
				<?php
				 		$l_sqlstr3 = "select * from tb_type2 where type1_id='3' order by id";//定义查询语句
				 		$result = $pdo->prepare($l_sqlstr);//准备查询
				 		$result->execute();//执行查询
				 		if($l_rst3=$result->fetch(PDO::FETCH_NUM)){
				 ?>
				3:[
					<?php
							$result = $pdo->prepare($l_sqlstr3);//准备查询 
							$result->execute();//执行查询
							while($l_rst3=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
					?>
					{
					  name: '<?php echo $l_rst3[0]; ?>',
					  title: '<?php echo $l_rst3[2]; ?>',
					},
					<?php
							}}
					?>
				],
				<?php
				 		$l_sqlstr4 = "select * from tb_type2 where type1_id='4' order by id";//定义查询语句
				 		$result = $pdo->prepare($l_sqlstr);//准备查询
				 		$result->execute();//执行查询
				 		if($l_rst4=$result->fetch(PDO::FETCH_NUM)){
				 ?>
				4:[
					<?php
							$result = $pdo->prepare($l_sqlstr4);//准备查询 
							$result->execute();//执行查询
							while($l_rst4=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
					?>
					{
					  name: '<?php echo $l_rst4[0]; ?>',
					  title: '<?php echo $l_rst4[2]; ?>',
					},
					<?php
							}}
					?>
				],
				} 
				};
		</script>
		
		<script src="js/myjs.js" type="text/javascript" charset="utf-8"></script>
		
		
		
		<script src="js/jquery.min.js"></script>
		<script>
			$(document).click(function(){
				$('.nav-list').removeClass('open')
			})
			$('.nav-menu,.nav-list').click(function(e){e.stopPropagation()})
			$('nav').find('.nav-menu').click(function(e){
				$('.nav-list').toggleClass('open')
			})
		</script>
		
				
	</body>
</html>			