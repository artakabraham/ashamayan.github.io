<?php
ini_set('display_errors',1);
error_reporting(-1);

session_start();

	require 'vendors/libs/Functions.php';
        require 'vendors/libs/Mail.php';

        DEFINE('ROOT',__DIR__);
        DEFINE('WWW',dirname(__DIR__));
	DEFINE('CORE',__DIR__.'/vendors/core');
	DEFINE('VENDORS',__DIR__.'/vendors');
	DEFINE('APP',__DIR__.'/app');	
	DEFINE('PATH',path());
        
        require APP.'/controllers/Controller.php';
        require APP.'/models/Model.php';        	
	
	spl_autoload_register(function($class){
		$file = CORE.'/'.str_replace('\\','/',$class).'.php';
		if(is_file($file)){
			require_once $file;
		}
	});	
	
	// default routes
	
	//Router::add('^$',['controller' => 'Main', 'action' => 'index']);
	//Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
	
	//debug(Router::getRoutes());
	
	//Router::dispatch();	
	
	$router = new Router();
	
	$router::dispatch();	

?>