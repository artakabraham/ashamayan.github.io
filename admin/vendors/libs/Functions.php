<?php

function debug($array) {
	
	echo "<pre>".print_r($array,true)."</pre>";	
}

function path() {
	
	$string = '';
        
        $cnt = substr_count($_SERVER['QUERY_STRING'],'/');
        
        for($i = 0; $i < $cnt; $i++){
            
            $string = $string.'../';            
        }
        
        return $string;
}

function error($string){
    
    return '<div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>'.$string.'</div>';
}


function success($string){
    
    return '<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button><strong>'.$string.'</div>';
}

function filePath(){
    
     if (!file_exists(WWW.'/public/uploads/'.date('Y')) && !is_dir(WWW.'/public/uploads/'.date('Y'))){
        mkdir(WWW.'/public/uploads/'.date('Y'));         
     }
     
     if (!file_exists(WWW.'/public/uploads/'.date('Y').'/'.date('m')) && !is_dir(WWW.'/public/uploads/'.date('Y').'/'.date('m'))){
        mkdir(WWW.'/public/uploads/'.date('Y').'/'.date('m'));         
     }
     
     return WWW.'/public/uploads/'.date('Y').'/'.date('m').'/';
}