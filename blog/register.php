<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>注册</title>
	</head>
	<body>
		<div style="border:2px solid #666666;margin:250px auto;width:400px;height:280px;background-color:#CCCCCC">
			<div align="center">
				<h1>注册账号</h1>
			</div>
			<div align="center">
				<form action="registeraction.php" method="post">
					<table>
						<tr>
							<td>用户名：</td>
							<td><input type="text" name="username" required="required"></td>
						</tr>
						<tr>
							<td>密码：</td>
							<td><input type="password" name="password" required="required"></td>
						</tr>
						<tr>
							<td>确认密码：</td>
							<td><input type="password" name="re_password" required="required"></td>
						</tr>
						<tr>
							<td>邮箱：</td>
							<td><input type="email" name="email" required="required"></td>
						</tr>
						<tr>
							<td colspan="2" align="center" style="color:red;font-size:10px;">
    							<?php 
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
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="register" value="注册">
								<input type="reset" name="reset" value="重置">
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