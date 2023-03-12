
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang cá nhân</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Trang cá nhân</h1>

	<div class="add_post">
		<a href="add-news.html">Thêm tin</a>
	</div>
    
    <div class="my_news">
        <h3>Tin của bạn</h3>
    
        <div class="kind_of_news">
            <a href="profile.html" class="news1">Đã duyệt</a>
            <a href="tin-dang-cho.html" class="news2">Đang chờ</a>
            <a href="tin-tu-choi.html" class="news3">Từ chối</a>
        </div>
    </div>

    <?= $this->content;?>
	
	<!-- <div id="main">
		<div class="main_block">
			
        <div class="block">
            <div class="block_info">
                <div class="block_info-avatar">
                    <img src="assets/img/meme.png" alt="">
                </div>
                <div class="block_info-name">
                    <h3 class="info-name">Duy</h3>
                    <div class="post_time">Thời gian</div>
                </div>
            </div>
            <h3 class="block_title">Tiêu đề</h3>
            <p class="block_content">Nội dung</p>
            <div class="block_img">
                <img src="assets/img/meme.png" alt="" width="300px" height="200px">
            </div>

            <div class="news_function">
                <a href="" class="update_tin">Sửa tin</a>
                <a href="" class="delete_tin">Xóa tin</a>
            </div>

        </div>
			
		</div>
	</div> -->
</body>
</html>