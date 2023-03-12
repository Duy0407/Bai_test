<?php 
require_once 'controllers/Controller.php';
require_once 'models/News.php';


class HomeController extends Controller{

    
    
	public function index(){
        $new_model = new News();
		$news = $new_model->getShowHome();

        $variables = [
            'news' => $news,
        ];

        $this->content = $this->render('views/layouts/home.php',$variables);
		require_once 'views/layouts/main.php';
	}

}

?>