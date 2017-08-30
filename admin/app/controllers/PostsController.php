<?php

require_once APP . '/models/Posts.php';
require_once APP . '/models/Gallery.php';

class PostsController extends Controller {

    public function actionIndex($alias) {

        $posts = [];

        $posts = Posts::getPostList($alias, $_SESSION['user']['id']);

        require_once APP . '/views/posts/grid.php';

        return true;
    }

    public function actionNew() {

        $types = Posts::getType('page');

        if (isset($_POST['submit']) == 'save') {

            $option['title'] = $_POST['title'];
            $option['content'] = $_POST['editor1'];
            $option['type'] = $_POST['type'];
            $option['startdate'] = $_POST['startdate'];

            $errors = false;

            if (empty($option['title']) || empty($option['content']) || empty($option['type'])) {

                $errors [] = error("All fields are required.");
            } else

            if ($errors == false) {

                $id = Posts::addPost($option);

                header("Location: ../posts/" . $id);
            }
        }

        require_once APP . '/views/posts/new.php';

        return true;
    }

    public function actionEdit($alias, $id) {

        $postID = Posts::getPostById($id);

        $types = Posts::getType('page');
        $imgFolders = Gallery::getUploadDates();
        $metaPrice = Posts::getPostMeta($postID['id'], '_price');

        require_once APP . '/views/posts/edit.php';
        require_once APP . '/views/posts/modal.php';
        return true;
    }

    public function actionUpdate() {

        if (isset($_POST['submit']) == 'Update') {

            $options = [];
            $errors = false;
            $postId = $_POST['id'];
            $isPaid = $_POST['isPaid'];
            $price = (int) $_POST['price'];

            if ($isPaid == 1 && $price <= 0) {

                $errors [] = error("Price is required.");
            } else

            if ($isPaid == 1) {

                if (!Posts::checkPostMetaExists($postId, '_price')) {

                    Posts::setPostMeta(array(0 => $postId, 1 => '_price', 2 => $price));
                } else {

                    Posts::updPostMeta(array(0 => $postId, 1 => '_price', 2 => $price));
                }
            }

            $options['is_paid'] = $isPaid;
            $options['type'] = $_POST['type'];
            $options['title'] = $_POST['title'];
            $options['content'] = $_POST['editor1'];
            $options['startdate'] = $_POST['startdate'];

            if ($errors == false) {
                Posts::updatePost($postId, $options);
            }
            $types = Posts::getType('page');
            $postID = Posts::getPostById($postId);
            $metaPrice = Posts::getPostMeta($postId, '_price');
            $imgFolders = Gallery::getUploadDates();
            require_once APP . '/views/posts/modal.php';
            require_once APP . '/views/posts/edit.php';
            return true;
        }
    }

    public function actionTrash($alias) {

        $trashedPosts = Posts::getTrashList();

        require_once APP . '/views/posts/trash.php';

        return true;
    }

    public function actionRestore($action, $alias, $id) {

        if ($id) {

            Posts::Restore($id);
        }
        return true;
    }

    public function actionDelete($action, $alias, $id) {

        if ($id) {

            Posts::deleteProductById($id);
        }
        return true;
    }

    public function actionRemove($action, $alias, $id) {

        if ($id) {

            Posts::Remove($id);
        }
        return true;
    }

    public function actionModal() {

        $imgDt = $_POST['imgDt'];

        $imgListByDate = Gallery::getImgListByDate($imgDt);

        require_once APP . '/views/posts/image.php';
        return true;
    }

    /**
     * Set post image
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
