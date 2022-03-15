<?php 
session_start();        			//启动Session
include "conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.css" charset="UTF-8" />
		<link rel="stylesheet" href="css/style.css" charset="utf-8">
		<link  media="screen and (max-width:1300px)" href="css/max1300.css" rel="stylesheet">
		<link  media="screen and (max-width:1080px)" href="css/max1080.css" rel="stylesheet">
		<link  media="screen and (max-width:768px)" href="css/max768.css" rel="stylesheet">
		<title></title>
	</head>
	<body>
		<?php
				if(!isset($_GET['style'])){//如果style参数值未被设置
					$l_sqlstr4 = "select * from tb_post";//定义查询语句
					$result = $pdo->prepare($l_sqlstr4);//准备查询
					$result->execute();//执行查询
					$total = $result->rowCount();//获取查询记录数
					$pagesize1 = 11;//每页显示5条数据
					$pages1 = ceil($total/$pagesize1);//获取总页数
					$page1 = (isset($_GET['page_']) && $_GET['page_'] > 0)?$_GET['page_']:1;//为当前页变量赋值
					$l_sqlstr4 = "select tb_post.id,tb_member.id,tb_type2.id,tb_type2.title,tb_post.title,name,discussnum,now,member_id,tb_post.type1_id,type2_id from tb_post,tb_member,tb_type2 where tb_type2.id=type2_id and tb_member.id=member_id order by now desc limit ".($page1-1)*$pagesize1.",".$pagesize1;//定义查询语句,按照评论数降序排列
				}else{
				echo "请重新链接";//输出字符串
				exit();//退出程序
			}
		?>
		<div class="new">
			<div class="left">
				<div class="title">新帖榜</div>
			</div>
			<div class="right">
				<ul class="img" style="position: relative; width: 100%; height: 200px;list-style: none;">
					<li style="position: absolute; width: 100%; left: 0px; top: 0px; display: list-item;">
						<table cellpadding="0" cellspacing="0" style="width: 100%;">
							<tr bgcolor="#B6B6B6" style="font-size:18px;">
								<td width="13%" height="40px" align="center" valign="middle">标题</td>
								<td width="38%" align="center" valign="middle" >主题</td>
								<td width="14%" align="center" valign="middle">提问人</td>
								<td width="9%" align="center" valign="middle">人气</td>
								<td width="26%" align="center" valign="middle" class="hidden-xs">发布时间</td>
							</tr>
							<?php
									$result = $pdo->prepare($l_sqlstr4);//准备查询 
									$result->execute();//执行查询
									while($l_rst4=$result->fetch(PDO::FETCH_NUM)){//循环输出查询结果
							?>
							<tr style="font-size:16px;" onmouseover="this.style.backgroundColor='#f5f8fb'" onmouseout="this.style.backgroundColor=''" onchange="k_change();" style="">
								<td class="biao" height="35px" align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);">[ <?php echo $l_rst4[3]; ?> ]</td>
								<td align="left" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><a href="showpost.php?id=<?php echo $l_rst4[0]; ?>" target="_blank"><?php echo $l_rst4[4]; ?></a></td>
								<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst4[5]; ?></td>
								<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);"><?php echo $l_rst4[6]; ?></td>
								<td align="center" valign="middle" style="border-bottom: 1px solid rgb(239,237,249);" class="hidden-xs"><?php echo $l_rst4[7]; ?></td>
							</tr>
							<?php
									}
							?>
						</table>
						<table class="fenye" width="100%" height="35px" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center" style="font-size:14px; font-weight:bolder;"style="margin:15px 0 15px 0;">
								<?php
									$url = $_SERVER['QUERY_STRING'];//获取URL查询的字符串
									parse_str($url,$arr);//将查询字符串解析到数组$arr中
									unset($arr['page_']);//释放数组中page元素的值
									$url = http_build_query($arr);//构造URL字符串
									echo "第".$page1."页/共".$pages1."页&nbsp;&nbsp;&nbsp;";//输出
									if($page1 == 1){//如果当前页为第一页
										echo "首页&nbsp;上一页&nbsp;&nbsp;&nbsp;";//输出
									}else{
										echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page_=1'>首页</a>&nbsp;";//输出
										echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page_=".($page1-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";	//输出
									}
									if($page1 == $pages1){//如果当前页为最后一页
										echo "下一页&nbsp;尾页";//输出
									}else{
										echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page_=".($page1+1)."'>下一页</a>&nbsp;";//输出
										echo "<a href='".$_SERVER['PHP_SELF']."?".$url."&page_=".$pages1."'>尾页</a>";	//输出
									}
								?>
								</td>
							</tr>
						</table>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>
