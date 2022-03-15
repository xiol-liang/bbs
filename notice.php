<?php 
session_start();        			//启动Session
include "conn.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>jQuery带按钮向上滚动向下滚动代码</title>
		<style type="text/css">
			body {
				color: #333;
				font-size: 13px;
			}

			h3,
			ul,
			li {
				margin: 0;
				padding: 0;
				list-style: none;
			}

			.scrollbox {
				width: 338px;
				margin: 0 auto;
				overflow: hidden;
				border: 0px solid #CFCFCF;
				padding: 10px;
			}

			#scrollDiv {
				width: 338px;
				height: 449px;
				overflow: hidden;
			}

			/*这里的高度和超出隐藏是必须的*/
			#scrollDiv li {
				height: 90px;
				width: 300px;
				padding: 0 20px;
				background: url(ico-4.gif) no-repeat 10px 23px;
				overflow: hidden;
				vertical-align: bottom;
				zoom: 1;
				border-bottom: #B7B7B7 dashed 1px;
			}

			#scrollDiv li h3 {
				height: 24px;
				padding-top: 13px;
				font-size: 14px;
				color: #353535;
				line-height: 24px;
				width: 300px;
			}

			#scrollDiv li h3 a {
				color: #353535;
				text-decoration: none;
			}

			#scrollDiv li h3 a:hover {
				color: #41A1F2;
			}
			.linktit:hover{
				color: #41A1F2;
			}

			#scrollDiv li div {
				height: 36px;
				width: 300px;
				color: #416A7F;
				line-height: 18px;
				overflow: hidden;
			}

			#scrollDiv li div a {
				color: #416A7F;
				text-decoration: none
			}

			.scroltit {
				height: 26px;
				line-height: 26px;
				padding-bottom: 4px;
				margin-bottom: 4px;
			}

			.scroltit h3 {
				width: 100px;
				float: left;
			}

			.scroltit .updown {
				float: right;
				width: 28px;
				height: 18px;
				padding-bottom: 4px;
				margin-left: 4px
			}
			#but_up {
				background: url(images/箭头down.png) no-repeat 0 0;
				border: 1px #41a1f2 solid;
				text-indent: -9999px
			}
			
			#but_down {
				background: url(images/箭头up.png) no-repeat 0 0;
				border: 1px #41a1f2 solid;
				text-indent: -9999px
			}

			

			#n {
				margin: 10px auto;
				width: 920px;
				border: 1px solid #CCC;
				font-size: 12px;
				line-height: 30px;
			}

			#n a {
				padding: 0 4px;
				color: #333
			}
		</style>
		<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
		<script src="js/jq_scroll.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#scrollDiv").Scroll({
					line: 1,
					speed: 500,
					timer: 3000,
					up: "but_up",
					down: "but_down"
				});
			});
		</script>
	</head>

	<body>
		<div class="scrollbox">
			<?php
					if(!isset($_GET['style'])){//如果style参数值未被设置
						$l_sqlstr = "select * from tb_notice";//定义查询语句
						$result = $pdo->prepare($l_sqlstr);//准备查询
						$result->execute();//执行查询
						$total = $result->rowCount();//获取查询记录数
						$pagesize = 6;//每页显示6条数据
						$pages = ceil($total/$pagesize);//获取总页数
						$page = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;//为当前页变量赋值
						$l_sqlstr = "select id,title,content from tb_notice order by createtime desc limit ".($page-1)*$pagesize.",".$pagesize;//定义查询语句,按照下载量降序排列
					}else{
					echo "请重新链接";//输出字符串
					exit();//退出程序
				}
			?>
			<div id="scrollDiv">
				<ul>
				<?php
						$result = $pdo->prepare($l_sqlstr);//准备查询 
						$result->execute();//执行查询
						while($l_rst=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
				?>
				
					<li>
						<h3><a href="#" class="linktit"><?php echo $l_rst[1]; ?></a></h3>
						<div><?php echo $l_rst[2]; ?></div>
					</li>
				<?php
						}
				?>
				</ul>
			</div>
			<div class="scroltit">
				<div class="updown" id="but_up">向下</div>
				<div class="updown" id="but_down">向上</div>
			</div>
		</div>
	</body>
</html>
