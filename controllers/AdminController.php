<?php

require_once 'controllers/Controller.php';
require_once 'models/News.php';

class AdminController extends Controller{

    public function __construct()
    {
        if(!$_SESSION['user']['level'] === 0){
            header("Location: index.php");
            exit();
        }
    }
    public function index(){

        $news_model = new News();
        $news = $news_model->getNewsAdmin();

        $this->content = $this->render('views/admin/index.php', ['news' => $news]);
        require_once 'views/admin/layout_admin.php';
    }

    public function duyet(){
        $time = time();
        $status = 1;
        $id_new = $_GET['id'];
        $news_model = new News();
        $news_model->update_new = $time;
        $news_model->status = $status;
        $news = $news_model->duyet($id_new);
        if ($news) {
            $_SESSION['duyet_ok'] = 'Duyệt thành công';
        } else {
            $_SESSION['duyet_no'] = 'Duyệt thất bại';
        }
        header("Location: quanly.html");
        exit();
    }

    public function tuchoi(){
        $status = 2;
        $id_new = $_GET['id'];
        $news_model = new News();
        $news_model->status = $status;
        $news = $news_model->tuchoi($id_new);
        if ($news) {
            $_SESSION['duyet_ok'] = 'Từ chối thành công';
        } else {
            $_SESSION['duyet_no'] = 'Từ chối thất bại';
        }
        header("Location: quanly.html");
        exit();
    }
}

?>