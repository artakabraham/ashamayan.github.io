<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BooksController
 *
 * @author abrah
 */
require_once APP . '/models/Posts.php';
require_once APP . '/models/Gallery.php';

class BooksController extends Controller {

    public function actionIndex() {

        $posts = [];

        $posts = Posts::getPostList('books', $_SESSION['user']['id']);

        require_once APP . '/views/books/grid.php';

        return true;
    }

    public function actionModal() {

        $imgDt = $_POST['imgDt'];

        $imgListByDate = Gallery::getImgListByDate($imgDt);

        require_once APP . '/views/books/image.php';

        return true;
    }

    public function actionJoinPdf($action, $alias, $id) {

        $errors = false;
        $success = false;

        $postID = Posts::getPostById($id);

        if (isset($_POST['submit'])) {

            if (empty($_FILES["file"]["tmp_name"])) {

                echo $errors = error("Select PDF file.");
            } else {
                $mime = strtolower(substr(mime_content_type($_FILES["file"]["tmp_name"]), -3));
                if ($_FILES["file"]["error"] == 4 || $mime != 'pdf') {
                    echo $errors = error("Wrong file.");
                }
            }
            if ($errors == false) {
                move_uploaded_file($_FILES["file"]["tmp_name"], ROOT . "/pdf/" . $_FILES["file"]["name"]);
//                $metaData[0] = $id;
//                $metaData[1] = '_pdf';
//                $metaData[2] = "pdf/" . $_FILES["file"]["name"];
                //Posts::updPostMeta($metaData);
                Posts::replacePostMeta($id, '_pdf', "pdf/" . $_FILES["file"]["name"]);
                exit($_FILES["file"]["name"]);
            }
        }

        exit();
    }

    public function actionUpdate($action, $alias, $id) {

        $imgFolders = Gallery::getUploadDates();

        $errors = false;
        $success = '';

        if (isset($_POST['submit']) == 'Update') {

            $options['type'] = 'books';
            $options['title'] = $_POST['title'];
            $options['content'] = $_POST['editor1'];
            $options['startdate'] = $_POST['startdate'];
            $price = (int) $_POST['price'];

            if ($price == 0) {
                $errors [] = error("Wrong value. Price can not be 0.");
            } 
            elseif (empty($options['title']) || empty($options['content'])) {

                $errors [] = error("All fields are required.");
            } 
            elseif (!Posts::checkPostMetaExists($id, '_pdf')) {
                $errors [] = error("File is required.");
            } 
            elseif ($errors == false) {

                Posts::updatePost($id, $options);

                Posts::updPostMeta(array(0 => $id, 1 => '_price', 2 => $price));

                $success = success("Action complete successful.");
            }
        }

        $postID = Posts::getPostById($id);
        $metaValue = Posts::getPostMeta($postID['id'], '_pdf');
        $metaPrice = Posts::getPostMeta($postID['id'], '_price');

        $fileName = basename($metaValue['meta_value']);

        require_once APP . '/views/books/update.php';
        require_once APP . '/views/books/modal.php';
        return true;
    }

    public function actionNew() {
        
        $id = Posts::addDraft();
        
        $imgFolders = Gallery::getUploadDates();
        $postID = Posts::getPostById($id);
        $metaValue = Posts::getPostMeta($postID['id'], '_pdf');
        $metaPrice = Posts::getPostMeta($postID['id'], '_price');
        $fileName = basename($metaValue['meta_value']);
        require_once APP . '/views/books/modal.php';
        require_once APP . '/views/books/update.php';
        return true;
    }

    public function actionDownload($action, $alias, $id) {

        $postId = (int) $id;

        if ($_SESSION['user']['roleID'] == 0) {

            $metaValue = Posts::getPostMeta($postId, '_pdf');
            $fileName = basename($metaValue['meta_value']);
            $path = ROOT . '/' . $metaValue['meta_value'];

            header("Content-type:application/pdf");
            header("Content-Disposition:attachment;filename='$fileName'");
            readfile("$path");
        }

        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public function actionSetImage() {

        if (isset($_POST['submit'])) {

            $options[] = $_POST['postID'];
            $options[] = "_thumbnail_id";
            $options[] = $_POST['imgId'];

            if (!Posts::checkPostMetaExists($options[0], $options[1])) {
                Posts::setPostMeta($options);
            }

            Posts::updPostMeta($options);
        }
    }
}
