<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tin</title>
</head>
<body>
    <h1>Thêm tin</h1>
    <form action="" method="post" enctype="multipart/form-data">
        Tiêu đề: 
        <input type="text" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : "" ;?>"> <br> <br>
        Nội dung: 
        <textarea name="content" id=""><?= isset($_POST['content']) ? $_POST['content'] : "" ;?></textarea> <br>
        Hình ảnh:
        <input type="file" name="image"><br>
        <input type="submit" name="create" value="Thêm">
    </form>
    <h3 style="color: red;"><?= $this->error;?></h3>
</body>
</html>