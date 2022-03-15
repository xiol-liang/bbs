<?php
session_start();        			//启动Session
include "conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>学院专区</title>
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
		<link rel="stylesheet" href="css/college.css" charset="utf-8">
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
				    <li><a href="college.php" class="active">学院专区</a></li>
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
			<div class="collegemain">
				<div class="kuai" style="margin-bottom: 10px;">
					<div class="zhan"></div>
					<div class="lie">
				<ul>
				   <li><a href="https://cshb.cqnu.edu.cn/" target="_blank" title="重庆中外人文交流学院"><span></span>重庆中外人文交流学院</a></li>
				   <li><a href="http://xcy.cqnu.edu.cn/" target="_blank" title="重庆新闻学院"><span></span>重庆新闻学院</a></li>
				   <li><a href="http://dlly.cqnu.edu.cn/" target="_blank" title="重庆旅游学院"><span></span>重庆旅游学院</a></li>
				   <li><a href="http://music.cqnu.edu.cn/" target="_blank" title="重庆音乐学院"><span></span>重庆音乐学院</a></li>
				   <li><a href="http://jykx.cqnu.edu.cn/" target="_blank" title="重庆幼儿师范学院"><span></span>重庆幼儿师范学院</a></li>
				   <li><a href="http://jykx.cqnu.edu.cn/" target="_blank" title="重庆特殊教育学院"><span></span>重庆特殊教育学院</a></li>
				</ul> 
				</div>
				</div>  
				
				
				<div class="kuai" style="margin-bottom: 10px; height: 540px;">
					<div class="zhan"></div>
					<div class="lie">
				<ul>
				   <li><a href="http://makesi.cqnu.edu.cn/" target="_blank" title="马克思主义学院"><span></span>马克思主义学院</a></li>
				   <li><a href="http://history.cqnu.edu.cn/" target="_blank" title="历史与社会学院"><span></span>历史与社会学院</a></li>
				   <li><a href="http://jykx.cqnu.edu.cn/" target="_blank" title="教育科学学院"><span></span>教育科学学院</a></li>
				   <li><a href="http://tky.cqnu.edu.cn/" target="_blank" title="体育与健康科学学院"><span></span>体育与健康科学学院</a></li>
				   <li><a href="http://wxy.cqnu.edu.cn/" target="_blank" title="文学院"><span></span>文学院</a></li>
				   <li><a href="http://wgy.cqnu.edu.cn/" target="_blank" title="外国语学院"><span></span>外国语学院</a></li>
				   <li><a href="http://art.cqnu.edu.cn/" target="_blank" title="美术学院"><span></span>美术学院</a></li>
				   <li><a href="http://xcy.cqnu.edu.cn/" target="_blank" title="新闻与传媒学院（新媒体学院）"><span></span>新闻与传媒学院（新媒体学院）</a></li>
				   <li><a href="http://music.cqnu.edu.cn/" target="_blank" title="音乐学院"><span></span>音乐学院</a></li>
				   <li><a href="http://math.cqnu.edu.cn/" target="_blank" title="数学科学学院"><span></span>数学科学学院</a></li>
				   <li><a href="http://phyinfo.cqnu.edu.cn/" target="_blank" title="物理与电子工程学院"><span></span>物理与电子工程学院</a></li>
				   <li><a href="http://chem.cqnu.edu.cn/" target="_blank" title="化学学院"><span></span>化学学院</a></li>
				   <li><a href="http://smkx.cqnu.edu.cn/" target="_blank" title="生命科学学院"><span></span>生命科学学院</a></li>
				   <li><a href="http://dlly.cqnu.edu.cn/" target="_blank" title="地理与旅游学院"><span></span>地理与旅游学院</a></li>
				   <li><a href="http://jgxy.cqnu.edu.cn/" target="_blank" title="经济与管理学院"><span></span>经济与管理学院</a></li>
				   <li><a href="http://jxxy.cqnu.edu.cn/" target="_blank" title="计算机与信息科学学院（智能科学学院）"><span></span>计算机与信息科学学院（智能科学学院）</a></li>
				   <li><a href="http://cscj.cqnu.edu.cn/" target="_blank" title="初等教育学院（北碚校区管理办公室）"><span></span>初等教育学院（北碚校区管理办公室）</a></li>
				</ul>
				</div>
				</div>  
				
				
				<div class="kuai">
					<div class="zhan"></div>
					<div class="lie">
				<ul>
				   <li style="width:100%"><a href="http://cce.cqnu.edu.cn/" target="_blank" title="继续教育学院（教师培训学院）"><span></span>继续教育学院（教师培训学院）</a></li>
				   <li style="width:100%"><a href="http://cshb.cqnu.edu.cn/" target="_blank" title="国际汉语文化学院（孔子学院管理办公室、国家汉语国际推广师资培训基地[重庆]办公室、华文教育基地办公室）"><span></span>国际汉语文化学院（孔子学院管理办公室...</a></li>
				   <li style="width:100%"><a href="http://vetc.cqnu.edu.cn/" target="_blank" title="职教师资学院（教育部全国重点职教师资培训基地办公室、职教研究所）"><span></span>职教师资学院（教育部全国重点职教师资...</a></li>
				</ul>
				</div>
				</div>
				<div class="visible-xs kuai" style="margin-bottom: 10px; height: 1320px;">
					<div class="lie">
				<ul>
				   <li><a href="https://cshb.cqnu.edu.cn/" target="_blank" title="重庆中外人文交流学院"><span></span>重庆中外人文交流学院</a></li>
				   <li><a href="http://xcy.cqnu.edu.cn/" target="_blank" title="重庆新闻学院"><span></span>重庆新闻学院</a></li>
				   <li><a href="http://dlly.cqnu.edu.cn/" target="_blank" title="重庆旅游学院"><span></span>重庆旅游学院</a></li>
				   <li><a href="http://music.cqnu.edu.cn/" target="_blank" title="重庆音乐学院"><span></span>重庆音乐学院</a></li>
				   <li><a href="http://jykx.cqnu.edu.cn/" target="_blank" title="重庆幼儿师范学院"><span></span>重庆幼儿师范学院</a></li>
				   <li><a href="http://jykx.cqnu.edu.cn/" target="_blank" title="重庆特殊教育学院"><span></span>重庆特殊教育学院</a></li>
				    <li><a href="http://makesi.cqnu.edu.cn/" target="_blank" title="马克思主义学院"><span></span>马克思主义学院</a></li>
				    <li><a href="http://history.cqnu.edu.cn/" target="_blank" title="历史与社会学院"><span></span>历史与社会学院</a></li>
				    <li><a href="http://jykx.cqnu.edu.cn/" target="_blank" title="教育科学学院"><span></span>教育科学学院</a></li>
				    <li><a href="http://tky.cqnu.edu.cn/" target="_blank" title="体育与健康科学学院"><span></span>体育与健康科学学院</a></li>
				    <li><a href="http://wxy.cqnu.edu.cn/" target="_blank" title="文学院"><span></span>文学院</a></li>
				    <li><a href="http://wgy.cqnu.edu.cn/" target="_blank" title="外国语学院"><span></span>外国语学院</a></li>
				    <li><a href="http://art.cqnu.edu.cn/" target="_blank" title="美术学院"><span></span>美术学院</a></li>
				    <li><a href="http://xcy.cqnu.edu.cn/" target="_blank" title="新闻与传媒学院（新媒体学院）"><span></span>新闻与传媒学院（新媒体学院）</a></li>
				    <li><a href="http://music.cqnu.edu.cn/" target="_blank" title="音乐学院"><span></span>音乐学院</a></li>
				    <li><a href="http://math.cqnu.edu.cn/" target="_blank" title="数学科学学院"><span></span>数学科学学院</a></li>
				    <li><a href="http://phyinfo.cqnu.edu.cn/" target="_blank" title="物理与电子工程学院"><span></span>物理与电子工程学院</a></li>
				    <li><a href="http://chem.cqnu.edu.cn/" target="_blank" title="化学学院"><span></span>化学学院</a></li>
				    <li><a href="http://smkx.cqnu.edu.cn/" target="_blank" title="生命科学学院"><span></span>生命科学学院</a></li>
				    <li><a href="http://dlly.cqnu.edu.cn/" target="_blank" title="地理与旅游学院"><span></span>地理与旅游学院</a></li>
				    <li><a href="http://jgxy.cqnu.edu.cn/" target="_blank" title="经济与管理学院"><span></span>经济与管理学院</a></li>
				    <li><a href="http://jxxy.cqnu.edu.cn/" target="_blank" title="计算机与信息科学学院（智能科学学院）"><span></span>计算机与信息科学学院（智能科学学院）</a></li>
				    <li><a href="http://cscj.cqnu.edu.cn/" target="_blank" title="初等教育学院（北碚校区管理办公室）"><span></span>初等教育学院（北碚校区管理办公室）</a></li>
				    <li style="width:100%"><a href="http://cce.cqnu.edu.cn/" target="_blank" title="继续教育学院（教师培训学院）"><span></span>继续教育学院（教师培训学院）</a></li>
				    <li style="width:100%"><a href="http://cshb.cqnu.edu.cn/" target="_blank" title="国际汉语文化学院（孔子学院管理办公室、国家汉语国际推广师资培训基地[重庆]办公室、华文教育基地办公室）"><span></span>国际汉语文化学院（孔子学院管理办公室...</a></li>
				    <li style="width:100%"><a href="http://vetc.cqnu.edu.cn/" target="_blank" title="职教师资学院（教育部全国重点职教师资培训基地办公室、职教研究所）"><span></span>职教师资学院（教育部全国重点职教师资...</a></li>
				 </ul>
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
	</body>
</html>			