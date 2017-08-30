<?php

require_once APP.'/controllers/Controller.php';

class MainController extends Controller {    
	
    public function actionIndex(){      

       // if(isset($_SESSION['user'])){

            require_once APP.'/models/Articles.php';

            $mainSlider = Articles::getSlider();

            $articlesTop3 = Articles::getNewsTop(3,'articles');

            $topPrograms = Articles::getNewsTop(3,'programs');
            
            $topAnnouncement = Articles::getNewsTop(3,'announcements');
            
            require_once APP.'/views/main/index.php';
            return true;

       // } else {

         require_once 'WeBuild/index.html';
         return true;

    //    }
    }
    
    public function actionTest(){
        
  
        
        return true;
    }
}