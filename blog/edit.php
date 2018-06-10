<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<script src="ueditor/ueditor.config.js">/*引入配置文件*/</script>
    	<script src="ueditor/ueditor.all.js">/*引入源码文件*/</script>
		<title>edit</title>
	</head>
	<body>
		<?php 
            session_start();
    		$username=isset($_SESSION['user'])?$_SESSION['user']:"";
    		if(!empty($username)){
        ?>
		<div id="header">
			<div id="nav">
				<div id="navL">
					<h1>Blog</h1>
				</div>
				<div id="navR">
    				<ul>
                        <li><a href="loginsuccess.php">首页</a></li>
                        <li><a href="myblog.php">我的博客</a></li>
                        <li><a href="logout.php">退出</a></li>
                    </ul>
				</div>
			</div>
		</div>
		<?php
    		$conn=mysqli_connect("localhost","root","","blogwebsite");
    		mysqli_query($conn,"set names 'utf8'");
            if(!empty($_GET['id'])){
                $edit=$_GET['id'];  
                $sql_select="select * from article where articleid='$edit'";   
                $query=mysqli_query($conn,$sql_select);
                $rs=mysqli_fetch_array($query);
            }
            if(!empty($_POST['sub'])){
                $title=$_POST['title'];  
                $con=$_POST['con'];      
                $sort=$_POST['sort'];
                $hid=$_POST['hid'];
                $sql_update="update article set title='$title',content='$con',sort='$sort' where articleid='$hid'";
                mysqli_query($conn,$sql_update);
                echo "<script>alert('update success!');location.href='myblog.php'</script>";//提示更新成功，并转到myblog.php
            }
        ?>
        <div align="center">
			<h2>编辑</h2>
			<div style="border-bottom: 1px dotted #CCC;"></div>
			<br>
    		<form action="edit.php" method="post">
        		<input type="hidden" name="hid" value="<?php echo $rs['articleid'];?>">
        		<input id="title" type="text" name="title" placeholder="请输入博文title" required="required" value="<?php echo $rs['title'];?>">
        		<select name="sort">
    				<option>技术</option>
    				<option>心情</option>
    				<option>幽默</option>
    				<option>记录</option>
    				<option>其他</option>
    			</select>
        		<br><br>
        		<textarea id="con" name="con"><?php echo $rs['content'];?></textarea>
				<script type="text/javascript">
        			UE.getEditor("con",{initialFrameWidth:900,initialFrameHeight:550});//引入编辑器ueditor
    			</script>
    			<br>
        		<input class="button" type="submit" name="sub" value="提交">
    		</form>
    	</div>
    	<?php
    		}
    		else{
        ?>
			<h1>你无权访问！！！</h1>
		<?php 
            }
		?>
	</body>
</html>