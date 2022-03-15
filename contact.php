<?php
session_start();        			//启动Session
include "conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>联系我们</title>
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
		<link rel="stylesheet" href="css/contact.css" charset="utf-8">
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
			#dnav1 #nav {display:block;width:100%;padding:0;margin:0;list-style:none;}
			#dnav1 #nav li {float:left;width:100px;}
			#dnav1 #nav li a {display:block;font-size: 15px; line-height:27px;text-decoration:none;padding:6px 5px;margin-right: 10px; text-align:center;color: #000; border: 1px solid rgb(65, 161, 242); border-radius: 5px;}
			#menu_con{ width:100%; border-top:none}
			.tag{ padding:10px; overflow:hidden;}
			.selected{
				background: rgb(65, 161, 242);
				
			}
			
			.tabs input {
			    opacity: 0;    
			}
			
			label {
			    cursor: pointer;
			    color: #000000;
				border: 1px solid rgb(65,161,242);
				border-radius: 5px;
			    padding: 1.5% 3%;
			    float: left;
			    margin-right: 2px;
			    font-size: 15px;
			}
			
			    label:hover {
			        background: rgb(65, 161, 242);
			    }
				input:checked + label {
				    background: rgb(65, 161, 242);
				    color: #FFF;
				}
				
			.tabs input:nth-of-type(1):checked ~ .tabs_ .panel:first-child,
			.tabs input:nth-of-type(2):checked ~ .tabs_ .panel:nth-child(2),
			.tabs input:nth-of-type(3):checked ~ .tabs_ .panel:last-child {
			    opacity: 1;
			    -webkit-transition: .9s;
			}
			
			
			
			    .panel {
			        width: 100%;
			        opacity: 0;
			        position: absolute;
			        background: #fff;
			        
			        padding: 4%;
			        box-sizing: border-box;
			    }
			
			        .panel h2 {
			            margin: 0;
			            font-family: Arial;
			        }
		</style>
	</head>
	<body>
		<!--<script type="text/javascript">
		    $(function() {
		        var loading = '<div class="loading">Loading...</div>';
		        $('body').append($(loading));
		 
		        setTimeout(function () {
		            $('.loading').remove();
		        }, 2000);
		    });
		 
		</script>-->
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
				    
				    <li><a href="contact.php" class="active">联系我们</a></li>
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
			<div class="kong" style="height: 49px;">
				
			</div>
			
			<div class="daohang1">
			<div id="dnav1">
				<nav1>
				<!-- 菜单 -->
				  <ul id="nav">
				    <li><a href="#" class="selected">用户反馈</a></li>
				    <li><a href="#" class="">联系我们</a></li>
					<li><a href="#" class="">留言板</a></li>
				  </ul>
				  
				  
				      
				  </nav1>
				</div>
			</div>
			</div>
			<div class="kong1"></div>
			<div class="container">
				<div id="menu_con" style="background: #FFF;overflow: visible;">
					<?php
					 		$l_sqlstr = "select * from tb_opinion";//定义查询语句
					 		$result = $pdo->prepare($l_sqlstr);//准备查询
					 		$result->execute();//执行查询
					 		$total = $result->rowCount();//获取查询记录数
					 		$pagesize = 10;//每页显示10条数据
					 		$pages = ceil($total/$pagesize);//获取总页数
					 		$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
							$offset=($page-1)*$pagesize;			//计算下一页从第几条数据开始循环
					 		$l_sqlstr = "select tb_member.id,head,name,member_id,content,createtime from tb_opinion,tb_member where member_id=tb_member.id order by createtime asc limit $offset, $pagesize";//定义查询语句,按照评论时间降序排列
					 ?>
					 <?php
					 		$i=$offset+1;//文章序号
					 		$result = $pdo->prepare($l_sqlstr);//准备查询 
					 		$result->execute();//执行查询
					 		if($l_rst=$result->fetch(PDO::FETCH_NUM)){
					 ?>
				        <div class="tag" style="display:block">
				            <section style="width: 95%; text-align: center;margin: 20px auto; border: 1px solid #000; padding: 0px 0 0px 0;">
				            <h2>反馈</h2>
				            <?php
				            		$result = $pdo->prepare($l_sqlstr);//准备查询 
				            		$result->execute();//执行查询
				            		while($l_rst=$result->fetch(PDO::FETCH_NUM)){  //循环输出查询结果
				            ?>
							<section class="fkliuyan">
								<table width="100%" cellpadding="0" cellspacing="0" width="100%" style="border: 0;">
									<tr bgcolor="#ffffff">
										<td width="120px" height="60px" align="center" valign="middle"><img src="<?php echo "images/".$l_rst[1]; ?>"></td>
										<td width="900px" align="left" valign="middle" style="text-indent: 2em;"><?php echo $l_rst[2]; ?></td>
										
										<td width="180px" rowspan="2" align="center" valign="middle"><?php echo $i; ?>楼<br><?php echo $l_rst[5]; ?></td>	
									</tr>
									<tr>
										<td height="60px"></td>
										<td align="left" valign="middle" style="text-indent: 2em;padding-bottom: 1em;"><?php echo $l_rst[4]; ?></td>
									</tr>
								</table>
							</section>
							<?php
									$i=$i+1;
									}
							?>
							<section class="discuss hidden-xs">
								<form name="myform" method="post" action="check_opinion.php">
									   
									   <section class="discuss-" align="center" valign="top" >
									     <input name="htxt_fileid" type="hidden" value="<?php echo $_GET['id'];?>">
									     
									    <section class="discuss_" style="width: 100%;">
										  <section class="discuss_1">发布反馈</section>
										  <section class="discuss_2"><textarea name="txt_content" onfocus="return txtFocus()" onblur="return txtBlur()" style="width: 100%;height: 100%; border: 1px solid  #41a1f2; border-radius: 5px;" id="txt_content" ></textarea></section>
									    </section>
									    <section class="discuss_3" style="" align="center">
											<input type="submit" name="submit" value="提交" onClick="return chk_login();">
										    &nbsp;
										    <input type="reset" name="submit2" value="重置">
										</section>
									    </section>
								  
								</form>
							</section>
				            </section>
							<section class="discuss visible-xs">
								<form name="myform" method="post" action="check_opinion.php">
									   
									   <section class="discuss-" align="center" valign="top" >
									     <input name="htxt_fileid" type="hidden" value="<?php echo $_GET['id'];?>">
									     
									    <section class="discuss_" style="width: 100%;">
										  <section class="discuss_1">发布反馈</section>
										  <section class="discuss_2"><textarea name="txt_content" onfocus="return txtFocus()" onblur="return txtBlur()" style="width: 100%;height: 100%; border: 1px solid  #41a1f2; border-radius: 5px;" id="txt_content" ></textarea></section>
									    </section>
									    <section class="discuss_3" style="" align="center">
											<input type="submit" name="submit" value="提交" onClick="return chk_login();">
										    &nbsp;
										    <input type="reset" name="submit2" value="重置">
										</section>
									    </section>
								  
								</form>
							</section>
				        </div>
						
					<?php
							}
					?>
						<div class="tag" style="display:none;" >
							<section style="width: 95%; font-size: 20px; text-align: center;margin: 20px auto; border: 1px solid #000; padding: 20px 0 35px 0;">
							<h2>重庆师范大学校园BBS工作室</h2><br />
						    <p>Tel:15320520630</p>
							<p>QQ:2318751031</p>
							<p>Email:2318751031@qq.com</p>
							</section>
						 </div>
						<?php
						 		$l_sqlstr1 = "select * from tb_liuyan";//定义查询语句
						 		$result = $pdo->prepare($l_sqlstr1);//准备查询
						 		$result->execute();//执行查询
						 		$total = $result->rowCount();//获取查询记录数
						 		$pagesize = 10;//每页显示10条数据
						 		$pages = ceil($total/$pagesize);//获取总页数
						 		$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
								$offset=($page-1)*$pagesize;			//计算下一页从第几条数据开始循环
						 		$l_sqlstr1 = "select tb_member.id,head,name,member_id,content,createtime from tb_liuyan,tb_member where member_id=tb_member.id order by createtime asc limit $offset, $pagesize";//定义查询语句,按照评论时间降序排列
						 ?>
						 <?php
						 		$i=$offset+1;//文章序号
						 		$result = $pdo->prepare($l_sqlstr1);//准备查询 
						 		$result->execute();//执行查询
						 		if($l_rst1=$result->fetch(PDO::FETCH_NUM)){
						 ?>
				        <div class="tag" style="display:none">
				            <section style="width: 95%; text-align: center;margin: 20px auto; border: 1px solid #000; padding: 0px 0 0px 0;">
				            <h2>留言板</h2>
				            <?php
				            		$result = $pdo->prepare($l_sqlstr1);//准备查询 
				            		$result->execute();//执行查询
				            		while($l_rst1=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
				            ?>
				            <section class="fkliuyan">
				            	<table width="100%" cellpadding="0" cellspacing="0" width="100%" style="border: 0;">
									<tr bgcolor="#ffffff">
										<td width="120px" height="60px" align="center" valign="middle"><img src="<?php echo "images/".$l_rst1[1]; ?>"></td>
										<td width="900px" align="left" valign="middle" style="text-indent: 2em;"><?php echo $l_rst1[2]; ?></td>
										
										<td width="180px" rowspan="2" align="center" valign="middle"><?php echo $i; ?>楼<br><?php echo $l_rst1[5]; ?></td>	
									</tr>
									<tr>
										<td height="60px"></td>
										<td align="left" valign="middle" style="text-indent: 2em;padding-bottom: 1em;"><?php echo $l_rst1[4]; ?></td>
									</tr>
				            	</table>
				            </section>
				            <?php
				            		$i=$i+1;
				            		}
				            ?>
				            <section class="discuss hidden-xs">
				            	<form name="myform" method="post" action="check_liuyan.php">
				            		   
				            		   <section class="discuss-" align="center" valign="top" >
				            		     <input name="htxt_fileid" type="hidden" value="<?php echo $_GET['id'];?>">
				            		     
				            		    <section class="discuss_" style="width: 100%;">
				            			  <section class="discuss_1">发布留言</section>
				            			  <section class="discuss_2"><textarea name="txt_content" onfocus="return txtFocus()" onblur="return txtBlur()" style="width: 100%;height: 100%; border: 1px solid  #41a1f2; border-radius: 5px;" id="txt_content" ></textarea></section>
				            		    </section>
				            		    <section class="discuss_3" style="" align="center">
				            				<input type="submit" name="submit" value="提交" onClick="return chk_login();">
				            			    &nbsp;
				            			    <input type="reset" name="submit2" value="重置">
				            			</section>
				            		    </section>
				            	  
				            	</form>
				            </section>
				            </section>
							<section class="discuss visible-xs">
								<form name="myform" method="post" action="check_liuyan.php">
									   
									   <section class="discuss-"align="center" valign="top" >
									     <input name="htxt_fileid" type="hidden" value="<?php echo $_GET['id'];?>">
									     
									    <section class="discuss_" style="width: 100%;">
										  <section class="discuss_1">发布留言</section>
										  <section class="discuss_2"><textarea name="txt_content" onfocus="return txtFocus()" onblur="return txtBlur()" style="width: 100%;height: 100%; border: 1px solid  #41a1f2; border-radius: 5px;" id="txt_content" ></textarea></section>
									    </section>
									    <section class="discuss_3" style="" align="center">
											<input type="submit" name="submit" value="提交" onClick="return chk_login();">
										    &nbsp;
										    <input type="reset" name="submit2" value="重置">
										</section>
									    </section>
								  
								</form>
							</section>
				        </div>
						
					<?php
							}
					?>
				</div>
				<div class="visible-xs" style="height: 132px;width: 100%;background: #FFFFFF;">
					
				</div>
			</div>
		</div>
		<div class="footer hidden-xs">
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
		var tabs=function(){
		    function tag(name,elem){
		        return (elem||document).getElementsByTagName(name);
		    }
		    //获得相应ID的元素
		    function id(name){
		        return document.getElementById(name);
		    }
		    function first(elem){
		        elem=elem.firstChild;
		        return elem&&elem.nodeType==1? elem:next(elem);
		    }
		    function next(elem){
		        do{
		            elem=elem.nextSibling;  
		        }while(
		            elem&&elem.nodeType!=1  
		        )
		        return elem;
		    }
		    return {
		        set:function(elemId,tabId){
		            var elem=tag("li",id(elemId));
		            var tabs=tag("div",id(tabId));
		            var listNum=elem.length;
		            var tabNum=tabs.length;
		            for(var i=0;i<listNum;i++){
		                    elem[i].onclick=(function(i){
		                        return function(){
		                            for(var j=0;j<tabNum;j++){
		                                if(i==j){
		                                    tabs[j].style.display="block";
		                                    //alert(elem[j].firstChild);
		                                    elem[j].firstChild.className="selected";
		                                }
		                                else{
		                                    tabs[j].style.display="none";
		                                    elem[j].firstChild.className="";
		                                }
		                            }
		                        }
		                    })(i)
		            }
		        }
		    }
		}();
		tabs.set("nav","menu_con");//执行
		</script>
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