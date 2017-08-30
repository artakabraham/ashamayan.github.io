<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author abrah
 */

require_once CORE.'/Db.php';

abstract class Model {
    
    public function __construct() {
        
        return $db = Db::getConnection();
    }
    
}
