<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';

class UserController extends Controller{


    public function daduyet(){
        $id_user = $_SESSION['user']['id_user'];
        $news1_model = new News();
        $news1 = $news1_model->getNewsViaUser1($id_user);
        $variables = [
            'news1' => $news1,
        ];

        $this->content = $this->render('views/my_new/index.php',$variables);
        require_once 'views/users/profile.php';
    }

    public function dangcho(){
        $id_user = $_SESSION['user']['id_user'];
        $news1_model = new News();
        $news1 = $news1_model->getNewsViaUser2($id_user);
        $variables = [
            'news1' => $news1,
        ];
        
        $this->content = $this->render('views/my_new/dangcho.php',$variables);
        require_once 'views/users/profile.php';
    }

    public function tuchoi(){
        $id_user = $_SESSION['user']['id_user'];
        $news1_model = new News();
        $news1 = $news1_model->getNewsViaUser3($id_user);
        $variables = [
            'news1' => $news1,
        ];
        
        $this->content = $this->render('views/my_new/tuchoi.php',$variables);
        require_once 'views/users/profile.php';
    }
}


?>