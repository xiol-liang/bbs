<?php 
	session_start();//启动Session
	header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
	include "conn.php";//包含数据库连接文件
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>搜索结果</title>
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
		<link rel="stylesheet" href="css/show.css" charset="utf-8">
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
					<li><a href="post.php"  onclick="return chk_login()" class="visible-xs">我要发帖</a></li>
					<li><a href="post.php"  onclick="return chk_login()" class="hidden-xs" style="border: 1px solid rgb(65, 161, 242);">我要发帖</a></li>
					<li><a href="user.php" onclick="return chk_login()" class="visible-xs">个人中心</a></li>
					<li class="visible-xs"><a href="login.php" style="border-top: 1px solid rgb(65, 161, 242);">登录</a> <a href="reg.php">注册</a></li>
				  </ul>
				
			</div>
			
			</nav>
			</div>
		</div>
		<div class="container">
			<div class="kong">
				
			</div>
			<?php
			if(isset($_POST['action']) && $_POST['action'] == "l_found"){//如果POST方法传递的action参数的值为l_found
				$_SESSION['action'] = $_POST['action'];//为Session变量赋值
				$_SESSION['k_word'] = $_POST['k_word'];//为Session变量赋值
			}
			if(isset($_SESSION['action'])){//如果Session变量action的值被设置
				
			?>
			<div class="showmain">
			<table cellpadding="0" cellspacing="0" style="width: 100%;">
				<tr bgcolor="#B6B6B6" style="font-size:18px;">
					<td width="13%" height="40px" align="center" valign="middle">标题</td>
					<td width="38%" align="center" valign="middle" >主题</td>
					<td width="14%" align="center" valign="middle">提问人</td>
					<td width="9%" align="center" valign="middle">人气</td>
					<td width="26%" align="center" valign="middle" class="hidden-xs">发布时间</td>
				</tr>
				<?php
						$l_sqlstr = "select tb_post.id,tb_member.id,tb_type2.id,tb_type2.title,tb_post.title,name,discussnum,createtime,member_id,type2_id from tb_post,tb_member,tb_type2 where tb_type2.id=type2_id and tb_member.id=member_id and (tb_type2.title like '%".$_SESSION['k_word']."%' or tb_post.title like '%".$_SESSION['k_word']."%' or content like '%".$_SESSION['k_word']."%')";//定义查询语句
						$result = $pdo->prepare($l_sqlstr);//准备查询
						$result->execute();//执行查询
						$total = $result->rowCount();//获取查询记录数
						$pagesize = 10;//每页显示3条数据
						$pages = ceil($total/$pagesize);//获取总页数
						$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
						$l_sqlstr = "select tb_post.id,tb_member.id,tb_type2.id,tb_type2.title,tb_post.title,name,discussnum,createtime,member_id,type2_id from tb_post,tb_member,tb_type2 where tb_type2.id=type2_id and tb_member.id=member_id and (tb_type2.title like '%".$_SESSION['k_word']."%' or tb_post.title like '%".$_SESSION['k_word']."%' or content like '%".$_SESSION['k_word']."%') limit ".($page-1)*$pagesize.",".$pagesize;//定义查询语句
						$result = $pdo->prepare($l_sqlstr);//准备查询
						$result->execute();//执行查询
						while($l_rst=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
				?>
				<tr style="font-size:16px;" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();" style="">
					<td class="biao" height="35px" align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);">[ <?php echo $l_rst[3]; ?> ]</td>
					<td align="left" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><a href="showpost.php?id=<?php echo $l_rst[0]; ?>" target="_blank"><?php echo $l_rst[4]; ?></a></td>
					<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst[5]; ?></td>
					<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst[6]; ?></td>
					<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);" class="hidden-xs"><?php echo $l_rst[7]; ?></td>
				</tr>
				<?php
						}
				?>
				</table>
				
				</div>
				<?php
					}
				
				?>
			<table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">
				<tr style="background: #FFFFFF;">
					<td align="center" style="font-size:14px; font-weight:bolder;">
					<?php
						$url = $_SERVER['QUERY_STRING'];//获取URL查询的字符串
						parse_str($url,$arr);//将查询字符串解析到数组$arr中
						unset($arr['page']);//释放数组中page元素的值
						$url = http_build_query($arr);//构造URL字符串
						echo "共".$total."条帖子&nbsp;&nbsp;第".$page."页/共".$pages."页&nbsp;&nbsp;&nbsp;";//输出
						if($page == 1){//如果当前页为第一页
							echo "首页&nbsp;上一页&nbsp;&nbsp;&nbsp;";//输出
						}else{
							echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page=1'>首页</a>&nbsp;";//输出
							echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page=".($page-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";	//输出
						}
						if($page == $pages){//如果当前页为最后一页
							echo "下一页&nbsp;尾页";//输出
						}else{
							echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page=".($page+1)."'>下一页</a>&nbsp;";//输出
							echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page=".$pages."'>尾页</a>";	//输出
						}
					?>
					</td>
				</tr>
			</table>
			
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