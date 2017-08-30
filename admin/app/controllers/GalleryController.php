<?php

require_once APP . '/models/Gallery.php';
require_once APP . '/models/Posts.php';

class GalleryController extends Controller {

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public function actionIndex() {

        $uploadDates = Gallery::getUploadDates();

        if (isset($_POST['q'])) {

            $q = $_POST['q'];

            $imgListByDate = Gallery::getImgListByDate($q);

            require_once APP . '/views/gallery/image.php';
            return true;
        }

        require_once APP . '/views/gallery/gallery.php';
        return true;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public function actionDelete() {

        if (isset($_POST['imgID'])) {

            $imgID = $_POST['imgID'];

            Gallery::deleteImgById($imgID);
        }
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public function actionNew() {
        
        $path = filePath();

        if (isset($_POST['submit'])) {

            $errors = false;

            if (is_uploaded_file($_FILES['file1']['tmp_name'])) {

                $options['title'] = basename($_FILES['file1']['name'], '.' . pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION));
                $options['content'] = $_FILES['file1']['name'];
                $options['type'] = 'image';
                $options['path'] = $_FILES['file1']['name'];
                $options['description'] = $_POST['description'];

                if (!getimagesize($_FILES['file1']['tmp_name'])) {

                    $errors = error("File is not un image!");
                } elseif (Gallery::checkFileExists($options['content'])) {

                    $errors = error("File with this name already exists!");
                } elseif ($errors == false) {
                    
                    move_uploaded_file($_FILES['file1']['tmp_name'], $path . $_FILES['file1']['name']);
                    Image::cropImage($path . $options['content'], $path . $options['content'], 720);
                    Posts::addPost($options);
                }
            }
            echo '/uploads/' .date('Y').'/'.date('m').'/'. $options['content'];
            exit();
        }

        require_once APP . '/views/gallery/new.php';
        return true;
    }

}
