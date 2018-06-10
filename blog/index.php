<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<title>blog</title>
	</head>
	<body>
		<div id="header">
			<div id="nav">
				<div id="navL">
					<h1>Blog</h1>
				</div>
				<div id="navR">
    				<ul>
                        <li><a href="index.php">首页</a></li>
                        <li><a href="login.php">登录</a></li>
                        <li><a href="register.php">注册</a></li>
                    </ul>
				</div>
			</div>
		</div>
		<div id="content">
			<!-- 文章栏  -->
			<div id="contentL">
				<div class="title">
					<h2>文章</h2>
				</div>
    			<?php
                    session_start();
                    $sort=isset($_SESSION['sort'])?$_SESSION['sort']:"";
                    if(!empty($sort)){
                        $w="sort like '$sort'";
                    }
                    else{
                        $w=1;
                    }
                    include("paging.php");//引入分页功能
                    $sql="select * from article where $w order by articleid desc limit $offset,$pagesize";
                    $query=mysqli_query($conn,$sql);   
                    while($rs=mysqli_fetch_array($query)){
                ?>
            	<div id="article">
            		<h3><a href="view.php?id=<?php echo $rs['articleid'];?>"><?php echo $rs['title'];?></a></h3>
            		<ul>
                    	<li>作者：<?php echo $rs['username'];?></li>
                    	<li>|</li>
                    	<li>日期：<?php echo $rs['articledate'];?></li>
                    	<li>|</li>
                    	<li>分类：<?php echo $rs['sort'];?></li>
                    	<li>|</li>
                    	<li>评论：<?php echo $rs['commentnum'];?></li>
                    	<li>|</li>
                    	<li>浏览：<?php echo $rs['viewnum'];?></li>
            		</ul>
            		<p><?php echo mb_substr($rs['content'],0,110,'utf-8');?>...</p>
            	</div>
            	<?php
                    }
                    if($rows!=0){
                ?> 
                <div id="paging">
					当前:<?php echo $page;?>/<?php echo $pagecount;?>&nbsp;<a href="?page=<?php echo 1;?>">首页</a>&nbsp;<a href="?page=<?php echo $pageprev;?>">上一页</a>&nbsp;<a href="?page=<?php echo $pagenext;?>">下一页</a>&nbsp;<a href="?page=<?php echo $pagecount;?>">末页</a>
                </div>
				<?php 
                    }
				?>
			</div>
			<div id="contentR">
				<!-- 分类栏  -->
				<div id="sort">
					<div class="title">
						<h2>分类</h2>
					</div>
					<form action="sort1.php" method="post">
    					<ul>
    						<li><input class="bt" type="submit" name="quanbu" value="全部"></li>
    						<li><input class="bt" type="submit" name="jishu" value="技术"></li>
        					<li><input class="bt" type="submit" name="xinqing" value="心情"></li>
        					<li><input class="bt" type="submit" name="youmo" value="幽默"></li>
        					<li><input class="bt" type="submit" name="jilu" value="记录"></li>
        					<li><input class="bt" type="submit" name="qita" value="其他"></li>
        				</ul>
					</form>
				</div>
				<!-- 热门栏  -->
				<div id="hotblog">
					<div class="title">
						<h2>热门</h2>
					</div>
					<?php 
					   $sql_select="select * from article order by viewnum desc limit 7";
					   $result=mysqli_query($conn,$sql_select);
					   while($row=mysqli_fetch_array($result)){
					?>  
					<div>
						<h3><a href="view.php?id=<?php echo $row['articleid'];?>"><?php echo $row['title'];?></a></h3>
					</div>
					<?php
					   }
					?>
				</div>
			</div>
		</div>
	</body>
</html>