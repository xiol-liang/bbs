<?php
session_start();        			//启动Session
include "conn.php";
?>
<?php
	 	$sql="select tb_post.id,tb_member.id,member_id,head,name,now,title,content from tb_post,tb_member where tb_member.id=member_id and tb_post.id=".$_GET['id'];//定义查询语句
	 	$result = $pdo->prepare($sql);//准备查询
	 	$result->execute();//执行查询
	 	if($rst=$result->fetch(PDO::FETCH_NUM)){//将查询结果返回到数组并判断是否为真
	?>	
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>帖子</title>
		<link rel="shortcut icon" href="images/bbs.png" type="image/x-icon" />
		<meta name="keywords" content="web后台,PHP,制作的音乐网xiongliang,熊亮,个人网页,个人网站,熊亮的个人网页,计算机,做网站,web前端" />
		<meta name="description" content="欢迎大家来到校园论坛，这是熊亮制作的一个论坛网站，在这里你可以和广大校友一起讨论各种有趣的话题" />
		<!--
		                                           	作者：2318751031@qq.com
		                                           	时间：2019-12-29
		                                           	描述：搜索引擎优化
		                                           -->
		<link rel="stylesheet" href="css/style.css" charset="utf-8">
		<link rel="stylesheet" href="css/showpost.css" charset="utf-8">
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
			<div class="daohang_">
			<div class="logo">
				
			</div>
			<div class="dnav">
				<nav>
				<!-- 菜单 -->
				  <ul class="nav-list">
				    <li><a href="index.php">首页</a></li>
				    <li>
						<a href="sort.php">论坛分类<div class="carect"></div></a>
						<ul class="menu">
						  <li><a href="#">学习区</a></li>
						  <li><a href="#">生活区</a></li>
						  <li><a href="#">新闻区</a></li>
						  <li><a href="#">运动区</a></li>
						</ul>
					</li>
				    <li><a href="college.php">学院专区</a></li>
				    <li><a href="campus.php">校园淘</a></li>
				    
				    <li><a href="contact.php">联系我们</a></li>
					<li><a href="post.php" onclick="return chk_login()" style="border: 1px solid rgb(65, 161, 242);">我要发帖</a></li>
				  </ul>
				</nav>
			</div>
			<div id="search">
				<div class="search d1">
					  <form name="found" method="post" action="show.php">
							<input type="hidden" name="action" value="l_found" />
							<input type="text" name="k_word" placeholder="搜索帖子...">
							<button name="query" type="submit"><img width="24px" src="images/搜索 (1).png"></button>
					  </form>
				</div>
					  
			</div>
			<div id="logreg">
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
				<div id="logreg" style="margin-top: -4px;">
					<a href="user.php" onclick="return chk_login()"><img width="24px" src="images/head.png" style="position: relative;top: 7px;"></a>
					<a href="login.php">登录</a>&nbsp;|&nbsp;<a href="reg.php">注册</a>
				</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="kong">
				
			</div>
			<div class="postmain">
				<table cellpadding="0" cellspacing="0">
					<tr bgcolor="#DDEFFD" style="font-size:16px;" class="post1">
						<td width="10%" height="30px" align="center" valign="middle">帖子信息</td>
						<td ></td>
					</tr>
					<tr>
						<td colspan="2">
							<table cellpadding="0" cellspacing="0" width="100%">
								<tr class="post1">
									<td width="10%" height="30px" align="center" valign="middle"><img src="<?php echo "images/".$rst[3]; ?>"</td>
									<td width="10%" align="left" valign="middle"><?php echo $rst[4]; ?></td>
									<td width="50%" align="center" valign="middle"></td>
									<td width="10%" align="center" valign="middle">发布时间</td>
									<td width="20%" align="center" valign="middle"><?php echo $rst[5]; ?></td>	
								</tr>
								<tr class="post1">
									<td align="center" valign="middle">帖子主题</td>
									<td colspan="4" align="center" valign="middle"><?php echo $rst[6]; ?></td>
								</tr>
								<tr class="post1">
									<td align="center" valign="middle">帖子内容</td>
									<td colspan="4" align="center" valign="middle"><?php echo $rst[7]; ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
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
		
		
		
				
	</body>
	<?php
			
			}
	?>
</html>			