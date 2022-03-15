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
		<meta name="keywords" content="web后台,PHP,制作的音乐网xiongliang,熊亮,个人网页,个人网站,熊亮的个人网页,计算机,做网站,web前端" />
		<meta name="description" content="欢迎大家来到校园论坛，这是熊亮制作的一个论坛网站，在这里你可以和广大校友一起讨论各种有趣的话题" />
		<!--
		                                           	作者：2318751031@qq.com
		                                           	时间：2019-12-29
		                                           	描述：搜索引擎优化
		                                           -->
		<link rel="stylesheet" href="css/bootstrap.css" charset="UTF-8" />
		<link rel="stylesheet" href="css/style1.css" charset="utf-8">
		<link rel="stylesheet" href="css/kongjian.css" charset="utf-8">
		
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
		function xinxi_chk(){
			if(this.myform.user.value == ""){
				alert("用户名不能为空！");
				this.myform.user.focus();
				return false;
			}
			if(this.myform.pwd.value == ""){
				alert("密码不能为空！");
				this.myform.pwd.focus();
				return false;
			}
			if(this.myform.email.value == ""){
				alert("邮箱不能为空！");
				this.myform.email.focus();
				return false;
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
			<!-- <div class="nav-menu">
				<span></span>
				<span></span>
				<span></span>
			</div> -->
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
				<div id="logreg_" style="margin-top: -4px;">
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
				  <ul class="nav-list" >
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
					
					<li><a href="post.php"  onclick="return chk_login()"  style="border: 1px solid rgb(65, 161, 242);">我要发帖</a></li>
					
					
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
			<div class="userleft_zhan"> 
				
			</div>
			<div class="userright">
				<section class="rightkongjian">
					<?php
						if(isset($_SESSION['name'])){ //如果Session变量name被设置
							include "conn.php";//包含数据库连接文件
							$sql = "select id,title,content,now,member_id from tb_post where member_id = '".$_SESSION['id']."'";//定义查询语句
							$result = $pdo->prepare($sql);//准备查询
							$result->execute();//执行查询
							$total = $result->rowCount();//获取查询记录数
							$pagesize = 8;//每页显示10条数据
							$pages = ceil($total/$pagesize);//获取总页数
							$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
							$offset=($page-1)*$pagesize;			//计算下一页从第几条数据开始循环
							$sql = "select id,title,content,now,member_id from tb_post where member_id = '".$_SESSION['id']."' order by now limit $offset, $pagesize";//定义查询语句,按照评论时间降序排列
					?>
					<?php
							$i=$offset+1;//文章序号
							$result = $pdo->prepare($sql);//准备查询 
							$result->execute();//执行查询
							if($rst=$result->fetch(PDO::FETCH_NUM)){
					?>
					<section style="width: 95%; text-align: center;margin: 20px auto; border: 1px solid #000; padding: 0px 0 0px 0;">
					<h2>我发布的动态</h2>
					<?php
							$result = $pdo->prepare($sql);//准备查询 
							$result->execute();//执行查询
							while($rst=$result->fetch(PDO::FETCH_NUM)){ //循环输出查询结果
					?>
					<section class="fkliuyan">
						<table width="100%" cellpadding="0" cellspacing="0" width="100%" style="border: 0;">
							<tr bgcolor="#ffffff">
								<td width="120px" height="60px" align="center" valign="middle"><?php echo $i; ?></td>
								<td width="900px" align="left" valign="middle" style="text-indent: 2em;"><?php echo $rst[1]; ?></td>
								
								<td width="180px" rowspan="2" align="center" valign="middle"><?php echo $rst[3]; ?></td>	
							</tr>
							<tr>
								<td height="60px"></td>
								<td align="left" valign="middle" style="text-indent: 2em;padding-bottom: 1em;"><?php echo $rst[2]; ?></td>
							</tr>
						</table>
					</section>
					<?php
							$i=$i+1;
							}
							?>
							</section>
							<?php
							
							}
							}
					?>
					
				</section>
				<table class="fenye" width="100%" height="70" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td align="center" style="font-size:14px; font-weight:bolder;"style="margin:15px 0 15px 0;">
						<?php
							$url = $_SERVER['QUERY_STRING'];//获取URL查询的字符串
							parse_str($url,$arr);//将查询字符串解析到数组$arr中
							unset($arr['page']);//释放数组中page元素的值
							$url = http_build_query($arr);//构造URL字符串
							$pages = $pages;
							echo "共".$total."条动态&nbsp;&nbsp;第".$page."页/共".$pages."页&nbsp;&nbsp;&nbsp;";//输出
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
				
	</body>
</html>		
	