<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<style>
    .input_quanly{display: none;}
</style>
<body>
    <form action="" method="post">
        Tài khoản:
		<input type="text" name="taikhoan" value="<?= isset($_POST['taikhoan']) ? $_POST['taikhoan'] : '' ;?>"> <br>
		Mật khẩu:
		<input type="password" name="matkhau"> <br>
        Họ tên: 
        <input type="text" name="ten" value="<?= isset($_POST['ten']) ? $_POST['ten'] : '' ;?>"> <br>
        Level:
        <select name="level" id="level">
            <option value="">-- Chọn --</option>
            <option value="0" <?= isset($_POST['level']) === "0" ? 'selected' : '' ;?>>Cá nhân</option>
            <option value="1" <?= isset($_POST['level']) === "1" ? 'selected' : '' ;?>>Quản lý</option>
        </select>

        <div class="input_quanly">
            Mã quản lý:
            <input type="text" name="ma_ql" placeholder="Nhập mã quản lý">
        </div> <br>
        <input type="submit" name="dang_ky" value="Đăng Ký"/>
    </form>
    <h4 style="color: red;"><?= $this->error;?></h4>

<script>
    var level = document.getElementById('level');
    var input_quanly = document.querySelector('.input_quanly');

    level.addEventListener("change", function(){
        if (level.value === "1") {
            input_quanly.style.display = "block";
        }else{
            input_quanly.style.display = "none";
        }
    })

</script>

</body>
</html>