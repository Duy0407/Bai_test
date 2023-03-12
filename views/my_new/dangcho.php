<div id="main">
    <div class="main_block">
        <?
        require_once 'function/conver_time.php';
        foreach ($news1 as $new1) {?>
            <div class="block">
                <div class="block_info">
                    <div class="block_info-avatar">
                        <img src="assets/img/meme.png" alt="">
                    </div>
                    <div class="block_info-name">
                        <h3 class="info-name"><?= $new1['ho_ten']?></h3>
                        <div class="post_time"><?= time_elapsed_string($new1['update_new'])?></div>
                    </div>
                </div>
                <h3 class="block_title"><?= $new1['title']?></h3>
                <p class="block_content"><?= $new1['content']?></p>
                <div class="block_img">
                <img src="assets/uploads/<?= $new1['id_user'].'/'.$new1['image']?>" alt="" width="300px" height="200px">
                </div>

                <div class="news_function">
                    <a href="index.php?controller=news&action=update&id=<?=$new1['id']?>" class="update_tin">Sửa tin</a>
                    <a href="index.php?controller=news&action=delete&id=<?=$new1['id']?>" class="delete_tin" onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">Xóa tin</a>
                </div>

            </div>
        <?}?>
        
    </div>
</div>