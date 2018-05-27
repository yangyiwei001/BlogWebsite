<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/register_login.css"/>
		<title>注册</title>
	</head>
	<body>
		<div id="nav">
			<div id="navL">
				<h1>BlogWebsite</h1>
			</div>
			<div id="navR">
    			<div id="navR_txt">
                	<ul>
                    	<li><a href="index.php">首页</a></li>
                    	<li><a href="login.php">登录</a></li>
                    	<li><a href="register.php" class="selected">注册</a></li>
                	</ul>
    			</div>
			</div>
		</div>
		<div class="panel">
			<div id="title">
				<h1>注册账号</h1>
			</div>
			<div align="center">
				<form action="registeraction.php" method="post">
					<table>
						<tr>
							<td>用户名：</td>
							<td><input class="info" type="text" name="username" required="required"></td>
						</tr>
						<tr>
							<td>密码：</td>
							<td><input class="info" type="password" name="password" required="required"></td>
						</tr>
						<tr>
							<td>确认密码：</td>
							<td><input class="info" type="password" name="re_password" required="required"></td>
						</tr>
						<tr>
							<td>邮箱：</td>
							<td><input class="info" type="email" name="email" required="required"></td>
						</tr>
						<tr>
							<td colspan="2" align="center" style="color:red;font-size:10px;">
    							<?php 
    							     $err=isset($_GET["err"])?$_GET["err"]:"";
    							     switch($err){
    							         case 1:
    							             echo "用户名为4-16个字符，包括字母、数字、下划线";
    							             break;
    							         case 2:
    							             echo "密码为4-16个字符，包括字母、数字、下划线";
    							             break;
    							         case 3:
    							             echo "邮箱格式错误！";
    							             break;
    							         case 4:
    							             echo "用户名已存在！";
    							             break;
    							         case 5:
    							             echo "两次密码不一致！";
    							             break;
    							         case 6:
    							             echo "邮箱号已存在！";
							                 break;
    							         case 7:
    							             echo "注册成功！";
    							             break;
    							     }
    							?>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input class="button" type="submit" name="register" value="注册">
								<input class="button" type="reset" name="reset" value="重置">
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								已有账号？<a href="login.php">登录</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>