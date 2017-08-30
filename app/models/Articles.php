<?php

require_once CORE . '/Db.php';

class Articles {

    public static function getNewsItemById($alias, $id) {

        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->prepare("SELECT * FROM posts WHERE status = 1 AND startdate <= CURDATE() AND id = :id AND type = :alias");

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->bindParam(':alias', $alias, PDO::PARAM_STR);

        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem = $result->fetch();

        return $newsItem;
    }

    public static function getPostById($id) {

        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->prepare("SELECT * FROM posts WHERE status = 1 AND startdate <= CURDATE() AND id = :id");

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem = $result->fetch();

        return $newsItem;
    }

    public static function getNewsList($type) {

        $db = Db::getConnection();

        $newsList = [];

        $result = $db->prepare("SELECT id, title, content, cdate, descript, type FROM posts WHERE status = 1 AND startdate <= NOW() AND type = :type ORDER BY cdate DESC");

        $result->bindParam(':type', $type, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {

            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['cdate'] = $row['cdate'];
            $newsList[$i]['descript'] = $row['descript'];
            $newsList[$i]['type'] = $row['type'];
            $newsList[$i]['thumbnail'] = Articles::getImage($row['id']);
            $i++;
        }

        return $newsList;
    }

    public static function getNewsTop($count, $type) {

        $db = Db::getConnection();

        $NewsTop = [];

        //$types = ['programs'=>'Программы','articles'=>'Статьи','blog'=>'Блог','announcements'=>'Анонсы','teenagers'=>'Подростки'];

        $result = $db->prepare("SELECT id, title, type FROM posts WHERE status = 1 AND startdate <= CURDATE() AND type = :type ORDER BY cdate DESC LIMIT :count");

        $result->bindParam(':type', $type, PDO::PARAM_STR);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        $result->execute();

        if ($result) {

            $i = 0;
            while ($row = $result->fetch()) {
                $NewsTop[$i]['id'] = $row['id'];
                $NewsTop[$i]['title'] = $row['title'];
                $NewsTop[$i]['type'] = $row['type'];
                $i++;
            }
            return $NewsTop;
        }
    }

    public static function getImage($id, $type = "") {
        $path = '../uploads/';
        $noImage = 'no-image.jpg';
        if ($type == 'slider') {
            $path = 'uploads/slider';
        }
        $db = Db::getConnection();
        $result = $db->prepare("SELECT CONCAT('/',REPLACE(SUBSTRING(cdate,1,7),'-','/'),'/',content) AS path FROM posts WHERE id ="
                . "(SELECT `meta_value` FROM `post_meta` WHERE `meta_key` = '_thumbnail_id' AND `post_id` = :id)");
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $postImage = $result->fetch();

        if ($postImage) {

            return $path . $postImage['path'];
        }
        return $path . $noImage;
    }

    public static function getSliderImage($id) {

        $fullPath = Articles::getPostMeta($id, '_slider');

        if (!empty($fullPath)) {

            return $fullPath;
        } 
        else {

            return '/uploads/slider/no-image.jpg';
        }
    }

    /**
     * Get post meta data
     * @postId postId
     * @metaKey metaKey
     * @author abrah
     */
    public static function getPostMeta($postId, $metaKey) {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT meta_value FROM post_meta WHERE post_id = :post_id AND meta_key = :meta_key");
        $result->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $result->bindParam(':meta_key', $metaKey, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $metaValue = $result->fetchColumn();
        if ($metaValue) {
            return $metaValue;
        }
        return false;
    }

    public static function getSlider() {

        $db = Db::getConnection();

        $slider = [];

        $result = $db->query("SELECT id, title, descript FROM posts WHERE status = 1 AND slider = 1 ORDER BY cdate DESC");

        $i = 0;
        while ($row = $result->fetch()) {

            $slider[$i]['id'] = $row['id'];
            $slider[$i]['title'] = $row['title'];
            $slider[$i]['descript'] = $row['descript'];
            $i++;
        }

        return $slider;
    }

    public static function getMenu() {

        $db = Db::getConnection();

        $menu = [];

        $result = $db->prepare("SELECT `id`,`title`,`descript` FROM `posts` WHERE `menu` = 1 AND status = 1 ORDER BY ordering");

        $result->execute();

        $i = 0;

        while ($row = $result->fetch()) {
            $menu[$i]['id'] = $row['id'];
            $menu[$i]['title'] = $row['title'];
            $menu[$i]['descript'] = $row['descript'];
            $i++;
        }

        return $menu;
    }

    public static function getSubMenu($parent) {

        $db = Db::getConnection();

        $subMenu = [];

        $result = $db->prepare("SELECT `id`,`title`,`type` FROM `posts` WHERE status = 1 AND `parent` = :parent ORDER BY ordering");

        $result->bindParam(':parent', $parent, PDO::PARAM_INT);

        $result->execute();

        $i = 0;

        while ($row = $result->fetch()) {
            $subMenu[$i]['id'] = $row['id'];
            $subMenu[$i]['title'] = $row['title'];
            $subMenu[$i]['type'] = $row['type'];
            $i++;
        }

        return $subMenu;
    }

    /**
     * Check if post is paid
     * @postId $postId ID of the post
     * @return boolean
     * @author abrah
     */
    public static function isPaid($postId) {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT is_paid FROM posts WHERE id = :id");
        $result->bindParam(':id', $postId, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        if ($result->fetchColumn() == 1) {
            return true;
        }
        return false;
    }

    /**
     * Check if post is bought
     * @postId $postId ID of the post
     * @return boolean
     * @author abrah
     */
    public static function isPurchased($session_id, $id) {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT `post_id`,`cdate`,`session_id`,`is_paid` FROM `orders` WHERE post_id = :id AND session_id = :session_id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':session_id', $session_id, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $item = $result->fetch();

        $curdate = datetime::createfromformat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
        $cdate = datetime::createfromformat('Y-m-d H:i:s', $item['cdate']);

        $diff = date_diff($cdate, $curdate);

        if (is_array($item)) {

            if ($diff->d <= 5 && $item['is_paid'] == 1 && !empty($item['session_id']) && !empty($item['cdate'])) {

                return true;
            }
        }

        return false;
    }

}
