
<form action="" method="post" enctype="multipart/form-data">
    Tiêu đề: 
    <input type="text" name="title" value="<?= $new_one['title']?>"> <br> <br>
    Nội dung: 
    <textarea name="content" id=""><?= $new_one['content']?></textarea> <br>
    Hình ảnh:
    <input type="file" name="image"><br>
    <img src="assets/uploads/<?= $new_one['id_user'].'/'. $new_one['image']; ?>" height="100" width="150px"/><br>
    <input type="submit" name="update" value="Sửa">
</form>
