<?php

require_once 'Db.php';

class Router {

    protected static $route = [];
    protected static $routes = [
        //'services'=>'services/index',
        //'teenagers/([0-9]+)'=>'articles/viewTeenagers/$1',
        //'teenagers'=>'articles/teenagers',          
        'unsubscribe'=>'subscribe/unsubscribe/$1',
        'subscribe'=>'subscribe/index',
        //'announcement/([0-9]+)'=>'articles/viewAnnouncement/$1',
        //'announcement'=>'articles/announcement',
        //'blog/([0-9]+)'=>'articles/ViewBlog/$1',
        //'blog'=>'articles/blog',
        //'programs/([0-9]+)'=>'articles/ViewProgram/$1',
        //'programs'=>'articles/programs',
        //'articles/([0-9]+)'=>'articles/view/$1',
        //'articles'=>'articles/index',
                
        '^purchase/([a-zA-Z0-9]+)/([0-9]+)$'=>'page/ViewPurchase/$1/$2',
        
        '^([a-zA-Z]+)/buy/([0-9]+)$' => 'page/buy/$1',
        
        'payment'=>'payment/events',
        'logout'=>'user/logout',
        'login'=>'user/login',
        'register'=>'user/register',
        'complete'=>'user/complete',
        'checkout/([0-9]+)' => 'checkout/checkout',
        'books/([0-9]+)' => 'articles/view/$1',
        'books' => 'articles/books',        
        '^([a-zA-Z]+)/([0-9]+)$' => 'page/view/$1',
        '^([a-zA-Z]+)$' => 'page/index',
        '' => 'main/index/$1'];

    public function __construct() {
        self::$route = self::$routes;
    }

    private static function getURI() {

        return rtrim($_SERVER['QUERY_STRING'], "/");
    }

    public static function dispatch() {

        $uri = self::getURI();

        //$pageAlias = self::getAlias($uri);

        foreach (self::$routes as $uriPattern => $path) {

            if (preg_match("#$uriPattern#i", $uri)) {

                $internalRoute = preg_replace("#$uriPattern#i", $path, $uri);

                //debug($internalRoute);
                //echo $uriPattern.', '.$path.', ',$uri;

                $segments = explode('/', $internalRoute);

                $segments1 = explode('/', $uri);

                $controllerName = ucfirst(array_shift($segments)) . 'Controller';

                $actionName = 'action' . ucfirst(array_shift($segments));

                //echo '<br>'.$controllerName.'<br>'.$actionName;

                $parameters [] = $segments;

                //debug($parameters);

                $controllerFile = '../app/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {

                    include_once($controllerFile);
                }

                //echo $pageAlias;

                $cObj = new $controllerName;

                $result = call_user_func_array([$cObj, $actionName], $segments1);

                if ($result != null) {

                    break;
                }
            }
        }
    }

}
