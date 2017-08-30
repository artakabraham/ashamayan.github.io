<?php

require_once 'Controller.php';
require_once APP . '/models/Articles.php';
require_once APP . '/models/RightBar.php';

class ArticlesController extends Controller {

    public function actionBooks() {
        $getBooks = Articles::getNewsList('books');
        $topPrograms = Articles::getNewsTop(5, 'programs');
        $topArticles = Articles::getNewsTop(5, 'articles');
        $topBlog = Articles::getNewsTop(5, 'blog');
        require_once APP . '/views/books/index.php';
        return true;
    }

    public function actionView($alias, $id) {
        if (isset($id)) {
            $book = Articles::getNewsItemById($alias, $id);
            $price = Articles::getPostMeta($id, '_price');
            $thumbnail = Articles::getImage($id);
            require_once APP . '/views/books/viewBook.php';
        }
        return true;
    }

}
