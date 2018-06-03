<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<script src="ueditor/ueditor.config.js">/*引入配置文件*/</script>
    	<script src="ueditor/ueditor.all.js">/*引入源码文件*/</script>
		<title>write</title>
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
                        <li><a href="loginsuccess.php" class="selected">首页</a></li>
                        <li><a href="myblog.php">我的博客</a></li>
                        <li><a href="logout.php">退出</a></li>
                    </ul>
				</div>
			</div>
		</div>
		<?php
    		$conn=mysqli_connect("localhost","root","","blogwebsite");
    		mysqli_query($conn,"set names 'utf8'");
		    if(!empty($_POST['sub'])){
		        $title=$_POST['title'];  //获取title表单内容
		        $con=$_POST['con'];      //获取content表单内容
		        $sort=$_POST['sort'];
		        $sql_insert="insert into article values(null,'$title','$con',now(),'0','0','$sort','$username')";
		        mysqli_query($conn,$sql_insert);
		        echo "<script>alert('insert success!');location.href='myblog.php'</script>";
		    }
		?>
		<div align="center">
			<h2>发博文</h2>
			<div style="border-bottom: 1px dotted #CCC;"></div>
			<br>
			<form action="write.php" method="post">
    			<input id="title" type="text" name="title" placeholder="请输入博文title" required="required">
    			<select name="sort">
    				<option>技术</option>
    				<option>心情</option>
    				<option>幽默</option>
    				<option>记录</option>
    				<option>其他</option>
    			</select>
    			<br><br>
            	<textarea id="con" name="con"></textarea>   
    			<script type="text/javascript">
        			UE.getEditor("con",{initialFrameWidth:900,initialFrameHeight:550});//实例化编辑器  传参,id为将要被替换的容器。
    			</script>
    			<br>
    			<input class="button" type="submit" name="sub" value="提交">
			</form>
		</div>
		<?php 
            }else{
		?>
			<h1>你无权访问！！！</h1>
		<?php 
            }
		?>
	</body>
</html>