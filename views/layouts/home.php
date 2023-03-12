<?php
require_once 'function/conver_time.php';

foreach($news as $new){?>
    <div class="block">
        <div class="block_info">
            <div class="block_info-avatar">
                <img src="assets/img/meme.png" alt="">
            </div>
            <div class="block_info-name">
                <h3 class="info-name"><?= $new['ho_ten'];?></h3>
                <div class="post_time"><?= time_elapsed_string($new['update_new'])?></div>
            </div>
        </div>
        <h3 class="block_title"><?= $new['title'];?></h3>
        <p class="block_content"><?= $new['content'];?></p>
        <div class="block_img">
            <img src="assets/uploads/<?= $new['id_user'].'/'.$new['image']?>" alt="" width="300px" height="200px">
        </div>
    </div>
<?}
?>

