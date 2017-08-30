<?php

class Router {

    protected static $route = [];
    protected static $routes = [
        'menu/state/([0-9]+)' => 'menu/state/$1/$2/$3',
        
        'gallery/new' => 'gallery/new',
        'gallery/delete' => 'gallery/delete',
        'gallery/([0-9]+)' => 'gallery/index/$1',
        'gallery' => 'gallery/index/', 
                
        'message/delete/([0-9]+)' => 'mailing/messagedelete',
        'message/new' => 'mailing/new',
        'mailing/lastnews'=>'mailing/lastnews',
        'message/([0-9]+)' => 'mailing/messageView/$1',
        'messages' => 'mailing/messages', 
        
               
        'trash' => 'posts/trash',
        'service' => 'service/index',
        
        'books/download/([0-9]+)' => 'books/download/$1',
        'books/joinpdf/([0-9]+)'=>'books/joinpdf/$1',
        'books/update/([0-9]+)' => 'books/update/$1',
        'books/new' => 'books/new',        
        'books/setimage' => 'books/setimage',
        'books/modal' => 'books/modal',        
        'books' => 'books/index',
        
        'slider/remove/([0-9]+)' => 'slider/remove/$1',
        'slider/add/([0-9]+)' => 'slider/add/$1',        
        'slider/edit' => 'slider/edit',        
        'slider/([0-9]+)' => 'slider/add/$1',
        'slider' => 'slider/index',
        
        '^user/confirm/([a-zA-Z0-9]+)$'=>'user/confirm',
        'user/create'=>'user/create',
        'user/checkpermission'=>'user/checkpermission',
        'user/settings' => 'user/settings',
        'user/unsubscribed' => 'user/unsubscribed',
        'user/subscribers' => 'user/subscribers',
        'user/logout' => 'user/logout/$1',
        'user/login' => 'user/login/$1',
        'user/userpermissions' => 'user/userpermissions/$1/$2/$3',
        'user/getoptionlist'=>'user/getoptionlist',
        'user' => 'user/index/$1',
        
        '^([a-zA-Z]+)/setsubmenu/([0-9]+)$' => 'posts/setsubmenu/$1',
        'menu/update/([0-9]+)' => 'menu/update/$1',
        'menu/new' => 'menu/new',
        'menu/swape/([0-9]+)' => 'menu/swape',
        'menu' => 'menu/index',
        
        'post/restore/([0-9]+)' => 'posts/restore/$1',
        'post/remove/([0-9]+)' => 'posts/remove/$1',
        'post/delete/([0-9]+)' => 'posts/delete/$1',
        'posts/setimage' => 'posts/setimage',
        'posts/modal' => 'posts/modal',
        'posts/update' => 'posts/update',
        'posts/new' => 'posts/new/$1',
        'posts/([0-9]+)' => 'posts/edit/$1',
        
        '^([a-zA-Z]+)$' => 'posts/index',
        '' => 'main/index/$1'];

    public function __construct() {
        self::$route = self::$routes;
    }

    public static function getURI() {

        return rtrim($_SERVER['QUERY_STRING'], "/");
    }

    public static function dispatch() {

        $uri = self::getURI();

        //echo $uri; 

        foreach (self::$routes as $uriPattern => $path) {

            if (preg_match("#$uriPattern#i", $uri)) {

                $internalRoute = preg_replace("#$uriPattern#i", $path, $uri);

                $segments = explode('/', $internalRoute);

                //added from fromtend
                $segments1 = explode('/', $uri);
                ////    

                $controllerName = ucfirst(array_shift($segments)) . 'Controller';

                $actionName = 'action' . ucfirst(array_shift($segments));

                //echo '<br>'.$controllerName.'<br>'.$actionName;
                
                //chenge to array
                $parameters [] = $segments;

                $controllerFile = 'app/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {

                    include_once($controllerFile);
                }

                //debug($parameters);	
                //debug($segments1);

                $cObj = new $controllerName();

                $result = call_user_func_array([$cObj, $actionName], $segments1);

                if ($result != null) {
                    break;
                }
            }
        }
    }
}
