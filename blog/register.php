<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>注册</title>
		<link rel = "stylesheet" href = "css/register.css">
	</head>
	<body background="img/1.png">
		<div id="content">
			<div align="center">
				<h1>注册账号</h1>
			</div>
			<div align="center">
				<form action="registeraction.php" method="post">
					<table>
						<tr height="40">
							<td style="font-size:20px;">用&nbsp;户&nbsp;名：</td>
							<td><input type="text" name="username" required="required" style="height:25px;width:150px;font-size:20px;"></td>
						</tr>
						<tr height="40">
							<td style="font-size:20px;">密&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
							<td><input type="password" name="password" required="required" style="height:25px;width:150px;font-size:20px;"></td>
						</tr>
						<tr height="40">
							<td style="font-size:20px;">确认密码：</td>
							<td><input type="password" name="re_password" required="required" style="height:25px;width:150px;font-size:20px;"></td>
						</tr>
						<tr height="40">
							<td style="font-size:20px;">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</td>
							<td><input type="email" name="email" required="required" style="height:25px;width:150px;font-size:20px;"></td>
						</tr>
						<tr>
							<td align="center" style="color:red;font-size:10px;">
    							<?php 
    							     header("content-type:text/html;charset=utf-8");
    							     $err=isset($_GET["err"])?$_GET["err"]:"";
    							     switch($err){
    							         case 1:
    							             echo "用户名已存在！";
    							             break;
    							         case 2:
    							             echo "两次密码不一致！";
    							             break;
    							         case 3:
    							             echo "邮箱号已存在！";
    							             break;
    							         case 4:
    							             echo "注册成功！";
    							             break;
    							     }
    							?>
							</td>
						</tr>
						<tr height="40">
							<td colspan="2" align="center">
								<input type="submit" name="register" value="注册" style="font-size:20px;">
								<input type="reset" name="reset" value="重置" style="font-size:20px;">
							</td>
						</tr>
						<tr height="40">
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