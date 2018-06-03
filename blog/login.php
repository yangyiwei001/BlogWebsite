<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<title>登录</title>
	</head>
	<body>
		<div id="panel" align="center">
			<h1>登录</h1>
			<form action="loginaction.php" method="post">
				<table>
					<tr>
						<td>账号&nbsp;&nbsp;</td>
						<td><input class="info" type="text" name="username" value="<?php echo isset($_COOKIE["userName"])?$_COOKIE["userName"]:"";?>"></td>
					</tr>
					<tr>
						<td>密码&nbsp;&nbsp;</td>
						<td><input class="info" type="password" name="password" value="<?php echo isset($_COOKIE["passWord"])?$_COOKIE["passWord"]:"";?>"></td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<input type="checkbox" name="remember"><small>记住密码</small>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center" style="color:red;font-size:10px;">
    						<?php 
                                $err=isset($_GET["err"])?$_GET["err"]:"";
    							switch($err){
                                    case 1:
                                        echo "用户名或密码错误！";
                                        break;
                                    case 2:
                                        echo "用户名和密码不能为空！";
                                        break;
                                }
                            ?>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input class="button" type="submit" name="login" value="登录">
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							没有账号？<a href="register.php">注册</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>