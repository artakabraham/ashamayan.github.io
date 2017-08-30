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