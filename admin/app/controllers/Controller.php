<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author abrah
 */
require_once APP . '/models/User.php';
require_once APP . '/models/Menu.php';
require_once APP . '/models/Options.php';

abstract class Controller {

    protected $menuItems = '';
    protected $user;

    public function __construct() {

        $this->user = User::checkLogged();
        return $this->menuItems = Menu::getMenuItemList($this->user['id']);
    }

}
