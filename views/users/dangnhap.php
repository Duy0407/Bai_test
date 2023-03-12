<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập</title>
</head>
<body>
	
	<?php

		if (isset($_SESSION['success'])) {?>
			<h3 style="color: green;"><?= $_SESSION['success']?></h3>
			
		<?unset($_SESSION['success']);}

	?>

	<form action="" method="post">
		Tài khoản:
		<input type="text" name="taikhoan"> <br>
		Mật khẩu:
		<input type="password" name="matkhau"> <br>
		<input type="checkbox" name="ghinho" value="memorize"> ghi nhớ <br>

		<input type="submit" name="dang_nhap" value="Đăng nhập"/> 
		<a href="dang-ky.html">Chưa có tài khoản</a>
	</form>
	<h4 style="color: red;"><?php echo $this->error?></h4>
</body>
</html>