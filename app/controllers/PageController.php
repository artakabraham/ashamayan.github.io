<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageController
 *
 * @author abrah
 */
require_once "Controller.php";

class PageController extends Controller {

    public function actionIndex($alias) {

        $NewsList = Articles::getNewsList($alias);
        $topPrograms = Articles::getNewsTop(5, 'programs');
        $topArticles = Articles::getNewsTop(5, 'articles');
        $topBlog = Articles::getNewsTop(5, 'blog');
        require_once APP . '/views/page/index.php';
        return true;
    }

    public function actionView($alias, $id) {

        $price = Articles::getPostMeta($id, "_price");
        $isPaid = Articles::isPaid($id);

        if ($price > 0 && $isPaid) {

            header("Location: /" . $alias . "/buy/" . $id);
        } else
        if ($id && $alias) {

            if ($newsItem = Articles::getNewsItemById($alias, $id)) {

                $topPrograms = Articles::getNewsTop(5, 'programs');
                $topArticles = Articles::getNewsTop(5, 'articles');
                $topBlog = Articles::getNewsTop(5, 'blog');
                require_once APP . '/views/page/view.php';
                return true;
            } else {

                header("Location: /" . $alias);
            }
        }
    }

    public function actionBuy($alias, $action, $id) {

        debug(session_id());

        if (isset($id)) {

            $book = Articles::getNewsItemById($alias, $id);
            $price = Articles::getPostMeta($id, '_price');
            $thumbnail = Articles::getImage($id);
            require_once APP . '/views/page/buy.php';
        }
        return true;
    }

    public function actionViewPurchase($action, $session_id, $id) {

        $isPurchased = Articles::isPurchased($session_id, $id);

        if ($isPurchased) {

            if ($newsItem = Articles::getPostById($id)) {

                $topPrograms = Articles::getNewsTop(5, 'programs');
                $topArticles = Articles::getNewsTop(5, 'articles');
                $topBlog = Articles::getNewsTop(5, 'blog');
                require_once APP . '/views/page/view.php';
                return true;
            } else {

                header("Location: /" . $alias);
            }
        } else {

            echo "Link is expired ! <br><a href='http://www.ashamayan.com'>Home</a>";
             
            return true;
        }
    }

}
