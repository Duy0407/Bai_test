<?php
require_once 'controllers/Controller.php';

class Controller{

    // public function __construct()
    // {
    //     if (!isset($_SESSION['user'])) {
    //         $_SESSION['error'] = 'Bạn cần đăng nhập';
    //         header('Location: dang-nhap.html');
    //         exit();
    //     }
    // }


    public $content;
    public $error;

    public function render($file, $variables = []){
        extract($variables);
        ob_start();
        require_once $file;
        $render_view = ob_get_clean();
        return $render_view;
    }
}
?>