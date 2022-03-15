<?php
session_start();         			//启动Session
include "conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>个人中心</title>
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
		<link rel="stylesheet" href="css/user.css" charset="utf-8">
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
		<style>
			.loading{
						width:130px;
						height:56px;
						position: absolute;
						top:50%;
						left:50%;
						margin-left: -75px;
						line-height:56px;
						color:#fff;
						padding-left:60px;
						font-size:15px;
						background: #000 url(images/loader.gif) no-repeat 10px 50%;
						opacity: 0.7;
						z-index:9999;
						-moz-border-radius:20px;
						-webkit-border-radius:20px;
						border-radius:20px;
						filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70);
					}
		</style>
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	</head>
	<body>
		<!--<script type="text/javascript">
		    $(function() {
		        var loading = '<div class="loading">Loading...</div>';
		        $('body').append($(loading));
		 
		        setTimeout(function () {
		            $('.loading').remove();
		        }, 2000);
		    });-->
		 
		</script>
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
					<li><a href="user.php" onclick="return chk_login()" class="visible-xs active">个人中心</a></li>
					<li class="visible-xs"><a href="login.php" style="border-top: 1px solid rgb(65, 161, 242);">登录</a> <a href="reg.php">注册</a></li>
				  </ul>
				
			</div>
			
			</nav>
			</div>
		</div>
		<div class="container">
			<div class="kong">
				
			</div>
			<div class="usermain">
			<div class="userleft">
				<div class="geren hidden-xs">
					个人中心
				</div>
					<div class="ca-menu">
					    <li>
					        <a href="user.php">
					            <span class="ca-icon">
									<img src="images/个人信息.png" />
								</span>
					            <div class="ca-content hidden-xs">
					                <h2 class="ca-main">个人信息</h2>
					                
					            </div>
					        </a>
					    </li>
					    <li>
					        <a href="kongjian.php">
					            <span class="ca-icon">
									<img src="images/我的空间.png" />
								</span>
					            <div class="ca-content hidden-xs">
					                <h2 class="ca-main">我的空间</h2>
					                
					            </div>
					        </a>
					    </li>
					    <!-- <li>
					        <a href="shoucang.php">
					            <span class="ca-icon">
									<img src="images/购物车.png" />
								</span>
					            <div class="ca-content hidden-xs">
					                <h2 class="ca-main">我的收藏</h2>
					                
					            </div>
					        </a>
					    </li> -->
					    <!-- <li>
					        <a href="main.php?action=manager">
					            <span class="ca-icon">
									<img src="images/好友.png" />
								</span>
					            <div class="ca-content hidden-xs">
					                <h2 class="ca-main">我的好友</h2>
					                
					            </div>
					        </a>
					    </li> -->
					    <li>
					        <a href="#" onclick="return l_chk();" />
					            <span class="ca-icon">
									<img src="images/退出登录.png" />
								</span>
					            <div class="ca-content hidden-xs">
					                <h2 class="ca-main">退出登录</h2>
					                
					            </div>
					        </a>
					    </li>
					</div>
				
			</div>
			<div class="userright">
				<section class="rightmain">
					<?php
						if(isset($_SESSION['name'])){//如果Session变量name被设置
							include "conn.php";//包含数据库连接文件
							$sql = "select * from tb_member where name = '".$_SESSION['name']."'";//定义查询语句
							$result = $pdo->prepare($sql);//准备查询
							$result->execute();//执行查询
							$rst = $result->fetch(PDO::FETCH_NUM);//将查询结果返回到数组中	
					?>
					<table cellpadding="0" cellspacing="0" width="100%">
						<form id="myform" name="myform" method="post" enctype="multipart/form-data" action="xinxi_chk.php">
						<tr>
							<td width="20%" height="80px" valign="middle" align="center"><img src="<?php echo "images/".$rst[10]; ?>"></td>
							<td width="80%"><input type="text"  class="form-control" id="inputEmail2" name="user" value="<?php echo $rst[1]; ?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center">密码：</td>
							<td width="80%"><input type="password"  class="form-control" name="pwd" value="<?php echo $rst[2];?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"/></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center">Email：</td>
							<td width="80%" align="left" valign="middle"><input type="text" type="email" class="form-control" name="email" id="inputEmail2" value="<?php echo $rst[3]; ?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center">电话：</td>
							<td width="80%" align="left" valign="middle"><input type="text"  class="form-control"id="inputEmail2" name="phone" value="<?php echo $rst[4]; ?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center">学工号：</td>
							<td width="80%" align="left" valign="middle"><input type="text"  class="form-control" id="inputEmail2" name="num" value="<?php echo $rst[5]; ?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center">学院：</td>
							<td width="80%" align="left" valign="middle"><input type="text"  class="form-control" id="inputEmail2" name="college" value="<?php echo $rst[6]; ?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center">专业：</td>
							<td width="80%" align="left" valign="middle"><input type="text"  class="form-control" id="inputEmail2" name="major" value="<?php echo $rst[7]; ?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center">寝室：</td>
							<td width="80%" align="left" valign="middle"><input type="text"  class="form-control" id="inputEmail2" name="adress" value="<?php echo $rst[8]; ?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center">QQ：</td>
							<td width="80%" align="left" valign="middle"><input type="text"  class="form-control" id="inputEmail2" name="qq" value="<?php echo $rst[9]; ?>" onmouseover="this.style.backgroundColor='#ededed'" onmouseout="this.style.backgroundColor=''"></td>
						</tr>
						<tr>
							<td width="20%" height="70px" valign="middle" align="center"></td>
							<td height="40" align="center" valign="middle"><input name="submit" type="submit" value="保存"  class="btn btn-primary"  onclick="return xinxi_chk()" /></td>
						</tr>
						</form>
					</table>
					<?php
					}
					?>
				</section>
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
				
	</body>
</html>			