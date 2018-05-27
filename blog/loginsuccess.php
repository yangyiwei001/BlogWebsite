<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<title>BlogWebsite</title>
	</head>
	<body>
		<div id="nav">
			<div id="navL">
				<h1>BlogWebsite</h1>
			</div>
			<div id="navR">
				<div id="navR_search">
					<form action="" method="get">
						<input id="search" type="text" name="keys">
						<input id="button" type="submit" name="subs" value="搜索">
					</form>
				</div>
    			<div id="navR_txt">
                	<ul>
                    	<li><a href="loginsuccess.php" class="selected">首页</a></li>
                    	<li><a href="login.php">我的博客</a></li>
                    	<li><a href="logout.php">退出</a></li>
                	</ul>
    			</div>
			</div>
		</div>
    	<?php
            $conn=mysqli_connect("localhost","root","","blogwebsite"); 
            if(!empty($_GET['keys'])){       
                $key=$_GET['keys'];
                $w=" title like '%$key%'";
            }
            else{
                $w=1;
            }  
            $sql="select * from article where $w order by articleid desc limit 5";// limit 5
            $query=mysqli_query($conn,$sql);   
            while($rs=mysqli_fetch_array($query)){
        ?>
        <div id="article">
            <h2>
            	<a href="view.php?id=<?php echo $rs['articleid'];?>"><?php echo $rs['title'];?></a>
            </h2>
            <ul>
            	<li>作者：<?php echo $rs['userid']?></li>
            	<li>日期：<?php echo $rs['articledate']?></li>
            	<li>评论：<?php echo $rs['commentnum']?></li>
            	<li>浏览：<?php echo $rs['viewnum']?></li>
            </ul>
            <p><?php echo mb_substr($rs['content'],0,1000,'utf-8');?>...</p>
        </div>
        <?php
        };?> 
	</body>
</html>