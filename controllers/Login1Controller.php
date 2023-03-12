<?php 
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class Login1Controller extends Controller{
	public function dangnhap(){
		if (isset($_SESSION['user'])) {
			if ($_SESSION['level'] === 0) {
				header("Location: index.php");
			}else{
				header("Location: quanly.html");
			}
			exit();
		}


		if(isset($_POST['dang_nhap'])){
			$tk = $_POST['taikhoan'];
			$mk = md5($_POST['matkhau']);

			if(empty($tk) || empty($mk)){
				$this->error = "Không được bỏ trống các trường";
			}

			$user_model = new User();
			if(empty($this->error)){
				$user = $user_model->getUsernameAndPassword($tk,$mk);
				if (empty($user)) {
					$this->error = 'Sai tài khoản hoặc mật khẩu';
				}else{
					$_SESSION['success'] = 'Đăng nhập thành công';
					$_SESSION['user'] = $user;
					$level = $user['level'];

					if($level === 0){
						header("Location: index.php");
					}else{
					header("Location: quanly.html");
						
					}
					exit();
				}
				
				
			}
		}

		require_once 'views/users/dangnhap.php';
	}

	public function dangky(){
		$time = time();
		if (isset($_POST['dang_ky'])) {
			$user_model = new User();
			$tk = $_POST['taikhoan'];
			$mk = $_POST['matkhau'];
			$name = $_POST['ten'];
			$level = $_POST['level'];
			$ma_ql = $_POST['ma_ql'];
			if (empty($tk) || empty($mk) || empty($name)) {
				$this->error = 'Không được bỏ trống các trường';
			}else if ($level === "") {
				$this->error = 'Vui lòng chọ Level';
			}else if($level === "1"){
				$ma = 'QUANLY123';
				if ($ma_ql === "") {
					$this->error = 'Mã Quản lý không được bỏ trống';
				}else if($ma_ql != $ma){
					$this->error = 'Mã Quản lý không chính xác';
				}
			}

			if(empty($this->error)){
				$user_model->tai_khoan = $tk;
				$user_model->mat_khau = md5($mk);
				$user_model->ho_ten = $name;
				$user_model->level = $level;
				$user_model->create_at = $time;
				$user_model->update_at = $time;

				$is_insert = $user_model->insertRegister();
				if ($is_insert) {
					$_SESSION['success'] = 'Đăng kí thành công';
				}else{
					$_SESSION['error'] = 'Đăng kí thất bại';
				}
				if($level === "0"){
					header("Location: dang-nhap.html");
					exit();
				}else{
					echo 'Trang admin';
				}
				
			}
		}
		require_once 'views/users/dangky.php';
	}


	public function dangxuat(){
		$_SESSION = [];
		session_destroy();
		$_SESSION['success'] = 'Đăng xuất thành công';
		header("Location: dang-nhap.html");
		exit();
	}
}

?>