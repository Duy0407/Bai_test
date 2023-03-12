<?php 
require_once 'controllers/Controller.php';
require_once 'models/News.php';

class NewsController extends Controller{
	public function create(){
		if(isset($_POST['create'])){
			$title = $_POST['title'];
			$content = $_POST['content'];
			$avatar_file = $_FILES['image'];
			$id_user = $_SESSION['user']['id_user'];
			$time = time();
			$status = 0;

			if (empty($title)) {
				$this->error = 'Không được bỏ trống title';
			}else if(empty($content)){
				$this->error = 'Không được bỏ trống content';
			}else if($avatar_file['error'] == 0){
				$extension_arr = ['jpg', 'jpeg', 'gif', 'png'];
				$extension = pathinfo($avatar_file['name'], PATHINFO_EXTENSION);
				$extension = strtolower($extension);
				$file_size_mb = $avatar_file['size'] / 1024 / 1024;
				$file_size_mb = round($file_size_mb, 2);
				
				if (!in_array($extension, $extension_arr)) {
					$this->error = 'Cần upload file dạng ảnh';
				}else if($file_size_mb >= 2){
					$this->error = 'File upload không được lớn hơn 2MB';
				}
			}

			$avatar = '';
			if (empty($this->error)) {
				if ($avatar_file['error'] == 0) {
					$dir_uploads = __DIR__ . "/../assets/uploads/$id_user";
					if (!file_exists($dir_uploads)) {
						mkdir($dir_uploads);
					}
					$avatar = $time.'-'.$avatar_file['name'];
					move_uploaded_file($avatar_file['tmp_name'], $dir_uploads .'/'.$avatar);
				}
			}

			$news_model = new News();
			$news_model->id_user = $id_user;
			$news_model->title = $title;
			$news_model->content = $content;
			$news_model->image = $avatar;

			$news_model->create_new = $time;
			$news_model->update_new = $time;
			$news_model->status = $status;

			$is_insert = $news_model->insert();
			if ($is_insert) {
				$_SESSION['success'] = 'Thêm thành công';
			}else{
				$_SESSION['error'] = 'Thêm thất bại';
			}
			header('Location: index.php');
        	exit();
		}
		require_once 'views/news/create.php';
	}

	public function update(){
        $new_id = $_GET['id'];
		$newone_model = new News();
		$new_one = $newone_model->getUpdateId($new_id);

		if(isset($_POST['update'])){
			$title = $_POST['title'];
			$content = $_POST['content'];
			$avatar_file = $_FILES['image'];
			$id_user = $_SESSION['user']['id_user'];
			$time = time();

			if (empty($title)) {
				$this->error = 'Không được bỏ trống title';
			}else if(empty($content)){
				$this->error = 'Không được bỏ trống content';
			}else if($avatar_file['error'] == 0){
				$extension_arr = ['jpg', 'jpeg', 'gif', 'png'];
				$extension = pathinfo($avatar_file['name'], PATHINFO_EXTENSION);
				$extension = strtolower($extension);
				$file_size_mb = $avatar_file['size'] / 1024 / 1024;
				$file_size_mb = round($file_size_mb, 2);
				
				if (!in_array($extension, $extension_arr)) {
					$this->error = 'Cần upload file dạng ảnh';
				}else if($file_size_mb >= 2){
					$this->error = 'File upload không được lớn hơn 2MB';
				}
			}

			$avatar = $new_one['image'];
			if (empty($this->error)) {
				if ($avatar_file['error'] == 0) {
					$dir_uploads = __DIR__ . "/../assets/uploads/$id_user";
					if (!file_exists($dir_uploads)) {
						mkdir($dir_uploads);
					}

					@unlink($dir_uploads.'/'.$avatar);
					$avatar = $time.'-'.$avatar_file['name'];
					move_uploaded_file($avatar_file['tmp_name'], $dir_uploads .'/'.$avatar);
				}
			}

			$news_model = new News();
			// $news_model->id_user = $id_user;
			$news_model->title = $title;
			$news_model->content = $content;
			$news_model->image = $avatar;
			$news_model->update_new = $time;

			$is_update = $news_model->update($new_id);
			if ($is_update) {
				$_SESSION['success'] = 'Sửa thành công';
			}else{
				$_SESSION['error'] = 'Sửa thất bại';
			}
			header('Location: profile.html');
        	exit();
		}

		$this->content = $this->render('views/news/update.php', ['new_one' => $new_one]);
		require_once 'views/news/layout_update.php';
    }

	public function delete(){
		// if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
		// 	$_SESSION['error'] = 'ID không hợp lệ';
		// 	header('Location: profile.html');
		// 	exit();
		// }

		$new_id = $_GET['id'];
		$news_model = new News();
		$is_delete = $news_model->delete($new_id);
		
		header("Location: profile.html");
		exit();
    }

	
}

?>