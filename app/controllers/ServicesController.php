<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServicesController
 *
 * @author abrah
 */
class ServicesController extends Controller {
    
    public function actionIndex() {
    
    require_once APP.'/views/services/index.php';
    return true;
        
    }
 }
