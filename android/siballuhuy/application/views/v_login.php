<!DOCTYPE html>
<html>
<head>
	<title>Login Siball</title>
</head>
<body>
	<h1>SIBALL LOGIN<br/> www.siball.com</h1>
	<form action="<?php echo base_url('login_siball/aksi_login'); ?>" method="post">		
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username_cust"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password_cust"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>