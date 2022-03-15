<?php 
session_start();        			//启动Session
include "conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>校园论坛-首页</title>
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
		<link  media="screen and (max-width:1300px)" href="css/max1300.css" rel="stylesheet">
		<link  media="screen and (max-width:1080px)" href="css/max1080.css" rel="stylesheet">
		<link  media="screen and (max-width:768px)" href="css/max768.css" rel="stylesheet">
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
				    <li><a href="index.php" class="active">首页</a></li>
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
					<li class="visible-xs"><a href="login.php" style="border-top: 1px solid rgb(65, 161, 242);">登录</a> <a href="loginout.php">注册</a></li>
				  </ul>
				
			</div>
			
			</nav>
			</div>
		</div>
		<div class="container">
			<div class="kong">
				
			</div>
			<div class="fullSlide"> 
				<div class="bd">
					<ul>
						<li _src="url(images/1.png)" style="background: center 0 no-repeat;border-radius: 5px;"><a href="#"><div class="first">今日热题</div></a></li>
						<li _src="url(images/2.png)" style="background: center 0 no-repeat;border-radius: 5px;"><a href="#"><div class="first">今日推荐</div></a></li>
						<li _src="url(images/3.png)" style="background: center 0 no-repeat;border-radius: 5px;"><a href="#"><div class="first">校园头条</div></a></li>
						<li _src="url(images/4.png)" style="background: center 0 no-repeat;border-radius: 5px;"><a href="#"><div class="first">趣闻</div></a></li>
					</ul>
				</div>
				<div class="hd"><ul></ul></div>
				<div class="prev"><img src="images/左.png"></div>
				<div class="next"><img src="images/右.png"></div>
			</div><!--fullSlide end-->
			<div class="maindiv">
				<div class="left1">
				<?php
						if(!isset($_GET['style'])){//如果style参数值未被设置
							$l_sqlstr = "select * from tb_post where type1_id = '1'";//定义查询语句
							$result = $pdo->prepare($l_sqlstr);//准备查询
							$result->execute();//执行查询
							$total = $result->rowCount();//获取查询记录数
							$pagesize = 12;//每页显示5条数据
							$pages = ceil($total/$pagesize);//获取总页数
							$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
							$l_sqlstr = "select tb_post.id,tb_member.id,tb_type2.id,tb_type2.title,tb_post.title,name,discussnum,member_id,tb_post.type1_id,type2_id from tb_post,tb_member,tb_type2 where tb_post.type1_id='1' and tb_type2.id=type2_id and tb_member.id=member_id order by discussnum desc limit ".($page-1)*$pagesize.",".$pagesize;//定义查询语句,按照评论数降序排列
							$l_sqlstr1 = "select * from tb_post where type1_id = '2'";//定义查询语句
							$result = $pdo->prepare($l_sqlstr1);//准备查询
							$result->execute();//执行查询
							$total = $result->rowCount();//获取查询记录数
							$pagesize = 12;//每页显示5条数据
							$pages = ceil($total/$pagesize);//获取总页数
							$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
							$l_sqlstr1 = "select tb_post.id,tb_member.id,tb_type2.id,tb_type2.title,tb_post.title,name,discussnum,member_id,tb_post.type1_id,type2_id from tb_post,tb_member,tb_type2 where tb_post.type1_id='2' and tb_type2.id=type2_id and tb_member.id=member_id order by discussnum desc limit ".($page-1)*$pagesize.",".$pagesize;//定义查询语句,按照评论数降序排列
							$l_sqlstr2 = "select * from tb_post where type1_id = '3'";//定义查询语句
							$result = $pdo->prepare($l_sqlstr2);//准备查询
							$result->execute();//执行查询
							$total = $result->rowCount();//获取查询记录数
							$pagesize = 12;//每页显示5条数据
							$pages = ceil($total/$pagesize);//获取总页数
							$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
							$l_sqlstr2 = "select tb_post.id,tb_member.id,tb_type2.id,tb_type2.title,tb_post.title,name,discussnum,member_id,tb_post.type1_id,type2_id from tb_post,tb_member,tb_type2 where tb_post.type1_id='3' and tb_type2.id=type2_id and tb_member.id=member_id order by discussnum desc limit ".($page-1)*$pagesize.",".$pagesize;//定义查询语句,按照评论数降序排列
							$l_sqlstr3 = "select * from tb_post where type1_id = '4'";//定义查询语句
							$result = $pdo->prepare($l_sqlstr3);//准备查询
							$result->execute();//执行查询
							$total = $result->rowCount();//获取查询记录数
							$pagesize = 12;//每页显示5条数据
							$pages = ceil($total/$pagesize);//获取总页数
							$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
							$l_sqlstr3 = "select tb_post.id,tb_member.id,tb_type2.id,tb_type2.title,tb_post.title,name,discussnum,member_id,tb_post.type1_id,type2_id from tb_post,tb_member,tb_type2 where tb_post.type1_id='4' and tb_type2.id=type2_id and tb_member.id=member_id order by discussnum desc limit ".($page-1)*$pagesize.",".$pagesize;//定义查询语句,按照评论数降序排列
						}else{
						echo "请重新链接";//输出字符串
						exit();//退出程序
					}
				?>
				<div class="m-slide">
					<div class="left">
						<div class="title">热帖榜</div>
					</div>
					<div class="hot_md">
					<ul class="img" style="position: relative;  height: 200px;list-style: none;">
						<li>
							<table cellpadding="0" cellspacing="0" width="547px">
								<tr bgcolor="#B6B6B6" style="font-size:18px;">
									<td width="18%" height="40px" align="center" valign="middle">标题</td>
									<td width="52%" align="center" valign="middle" >主题</td>
									<td width="20%" align="center" valign="middle" >提问人</td>
									<td width="10%" align="center" valign="middle" >人气</td>
								</tr>
								<?php
										$result = $pdo->prepare($l_sqlstr);//准备查询 
										$result->execute();//执行查询
										while($l_rst=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
								?>
								<tr style="font-size:16px;" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();" style="">
									<td class="biao" height="35px" align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);">[ <?php echo $l_rst[3]; ?> ]</td>
									<td align="left" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><a href="showpost.php?id=<?php echo $l_rst[0]; ?>" target="_blank"><?php echo $l_rst[4]; ?></a></td>
									<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst[5]; ?></td>
									<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst[6]; ?></td>
								</tr>
								<?php
										}
								?>
							</table>
						</li>
						<li>
							<table cellpadding="0" cellspacing="0" width="547px">
								<tr bgcolor="#B6B6B6" style="font-size:18px;">
									<td width="18%" height="40px" align="center" valign="middle">标题</td>
									<td width="52%" align="center" valign="middle" >主题</td>
									<td width="20%" align="center" valign="middle" >提问人</td>
									<td width="10%" align="center" valign="middle" >人气</td>
								</tr>
								<?php
										$result = $pdo->prepare($l_sqlstr1);//准备查询 
										$result->execute();//执行查询
										while($l_rst1=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
								?>
								<tr style="font-size:16px;" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();" style="">
									<td class="biao" height="35px" align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);">[ <?php echo $l_rst1[3]; ?> ]</td>
									<td align="left" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><a href="showpost.php?id=<?php echo $l_rst1[0]; ?>" target="_blank"><?php echo $l_rst1[4]; ?></a></td>
									<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst1[5]; ?></td>
									<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst1[6]; ?></td>
								</tr>
								<?php
										}
								?>
							</table>
						</li>
						<li>
							<table cellpadding="0" cellspacing="0" width="547px">
								<tr bgcolor="#B6B6B6" style="font-size:18px;">
									<td width="18%" height="40px" align="center" valign="middle">标题</td>
									<td width="52%" align="center" valign="middle" >主题</td>
									<td width="20%" align="center" valign="middle" >提问人</td>
									<td width="10%" align="center" valign="middle" >人气</td>
								</tr>
								<?php
										$result = $pdo->prepare($l_sqlstr2);//准备查询 
										$result->execute();//执行查询
										while($l_rst2=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
								?>
								<tr style="font-size:16px;" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();" style="">
									<td class="biao" height="35px" align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);">[ <?php echo $l_rst2[3]; ?> ]</td>
									<td align="left" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><a href="showpost.php?id=<?php echo $l_rst2[0]; ?>" target="_blank"><?php echo $l_rst2[4]; ?></a></td>
									<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst2[5]; ?></td>
									<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst2[6]; ?></td>
								</tr>
								<?php
										}
								?>
							</table>
						</li>
						<li>
							<table cellpadding="0" cellspacing="0" width="547px">
								<tr bgcolor="#B6B6B6" style="font-size:18px;">
									<td width="18%" height="40px" align="center" valign="middle">标题</td>
									<td width="52%" align="center" valign="middle" >主题</td>
									<td width="20%" align="center" valign="middle" >提问人</td>
									<td width="10%" align="center" valign="middle" >人气</td>
								</tr>
								<?php
										$result = $pdo->prepare($l_sqlstr3);//准备查询 
										$result->execute();//执行查询
										while($l_rst3=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
								?>
								<tr style="font-size:16px;" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();" style="">
									<td class="biao" height="35px" align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);">[ <?php echo $l_rst3[3]; ?> ]</td>
									<td align="left" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><a href="showpost.php?id=<?php echo $l_rst3[0]; ?>" target="_blank"><?php echo $l_rst3[4]; ?></a></td>
									<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst3[5]; ?></td>
									<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst3[6]; ?></td>
								</tr>
								<?php
										}
								?>
							</table>
						</li>
					</ul>
					</div>
					<div class="right_tab">
					<ul class="tab" style="list-style: none;">
						<li class="on"style=""><a href="#" style="background: #72CA5E;border-radius: 0 10px 0px 0/0 10px 0px 0;"><b></b><span class="title">学习区</span><div class="backg1"></div></a></li>
						<li class="on"><a href="#" style="background: #F4758C;"><b></b><span class="title">生活区</span><div class="backg2"></div></a></li>
						<li class="on"><a href="#" style="background: #5B6DB0;"><b></b><span class="title">新闻区</span><div class="backg3"></div></a></li>
						<li class="on"><a href="#" style="background: #F79381;"><b></b><span class="title">运动区</span><div class="backg4"></div></a></li>
					</ul>
					</div>
					
					
				</div>
				<div class="new" style="background: #FFFFFF;">
				<iframe src="new.php" width="100%" height="500px" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
				</div>
				</div>
				<div class="right1">
					<div class="notice">
						<h1>校园公告</h1>
						<iframe src="notice.php" width="358px" height="495px" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
					</div>
					<div class="inform">
						<h1>论坛资讯</h1>
						<iframe src="inform.php" width="358px" height="365px" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
					</div>
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
		<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
		<script type="text/javascript" src="js/jquery.SuperSlide.js"></script>
		<script type="text/javascript">
		$(".fullSlide").hover(function(){
		    $(this).find(".prev,.next").stop(true, true).fadeTo("show", 1)
		},
		function(){
		    $(this).find(".prev,.next").fadeOut()
		});
		$(".fullSlide").slide({
		    titCell: ".hd ul",
		    mainCell: ".bd ul",
		    effect: "fold",
		    autoPlay: true,
		    autoPage: true,
		    trigger: "click",
		    startFun: function(i) {
		        var curLi = jQuery(".fullSlide .bd li").eq(i);
		        if ( !! curLi.attr("_src")) {
		            curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
		        }
		    }
		});
		</script>
		<script type="text/javascript">jQuery(".m-slide").slide({ titCell:".tab li", mainCell:".img",effect:"fold", autoPlay:true});</script>		
	</body>
</html>