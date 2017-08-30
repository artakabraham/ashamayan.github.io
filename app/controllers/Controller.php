<?php
/**
 * Description of Controller
 *
 * @author abrah
 */
require_once APP . '/models/Articles.php';

abstract class Controller
{
    protected $menuItems = '';

    public function __construct()
    {
        return $this->menuItems = Articles::getMenu();
        
    }  
    
}
