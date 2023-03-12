<?php
require_once 'function/conver_time.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tin tức</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<div class="acc">
		<?
		if (isset($_SESSION['user'])) {?>
			<a href="profile.html" class="acc_main">Hồ sơ</a>
			<a href="dang-xuat.html" class="acc_logout">Đăng xuất</a>
		<?}else{?>
			<a href="dang-nhap.html" class="acc_login">Đăng nhập</a>
			<a href="dang-ky.html" class="acc_register">Đăng ký</a>
		<?}?>
		
	</div>

	<h1>Trang chủ tin tức</h1>
	<div class="add_post">
		<a href="add-news.html">Thêm tin</a>
	</div>
	
	<div id="main">
		<div class="main_block">
			
			<?= $this->content?>
			
		</div>
	</div>
	
<script>

</script>
</body>
</html>