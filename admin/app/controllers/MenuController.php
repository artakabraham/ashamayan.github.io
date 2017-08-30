<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menuController
 *
 * @author abrah
 */
require_once APP . '/models/Menu.php';
require_once APP . '/models/Posts.php';

class MenuController extends Controller {

    public function actionIndex($alias) {

        $posts = [];

        $posts = Menu::getMenu();

        require_once APP . '/views/menu/grid.php';

        return true;
    }

    public function actionState($alias, $action, $id) {

        if ($id) {
            Posts::changeStatusById($id);
            $posts = Menu::getMenu();
            require_once APP . '/views/menu/grid.php';
            return true;
        }
        return true;
    }

    public function actionNew() {

        if (isset($_POST['submit'])) {

            $errors = false;
            $success = false;

            $option['name'] = $_POST['name'];
            $option['alias'] = $_POST['alias'];
            $option['order'] = Menu::getLastOrder();

            if (empty($option['name']) || empty($option['alias'])) {

                $errors = error("All fields are required.");
            } elseif ($errors == false) {

                $postId = Menu::add($option);
                $termId = Menu::addTerms($postId, $option);
                Menu::addTermTaxonomy($termId, 'page');
                $success = success("Action complete successful.");
            }
        }
        require_once APP . '/views/menu/new.php';
        return true;
    }

    public function actionUpdate($alias, $action, $id) {

        if (isset($_POST['submit']) == 'Update') {

            $options = [];
            $options['name'] = $_POST['name'];
            $options['alias'] = $_POST['alias'];
            $options['type'] = 'menu';
            $errors = false;
            $success = false;

            if (empty($options['name'])) {

                $errors [] = error("All fields are required.");
            } else

            if ($errors == false) {

                Menu::updateMenu($id, $options);
                Menu::updateTerms($id, $options);
                $success = success("Action complete successful.");
            }
        }

        $menuById = Menu::getMenuById($id);
        require_once APP . '/views/menu/update.php';
        return true;
    }

    public function actionSwape($alias, $action, $id) {

        Menu::swapeMenu($id);

        $posts = Menu::getMenu();

        require_once APP . '/views/menu/grid.php';

        return true;
    }

}
