<?php

class Posts extends Model {

    public static function getPostById($id) {

        if ($id) {
            $id = intval($id);
            $db = Db::getConnection();
            $result = $db->prepare("SELECT * FROM posts WHERE id = :id");
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $PostItem = $result->fetch();
            return $PostItem;
        }
    }

    public static function getPostList($type, $userId) {

        $db = Db::getConnection();

        $postList = [];

        $result = $db->prepare("SELECT id, title, author, cdate, descript, slider, status, parent, type FROM posts "
                . "WHERE status in (1,-1)"
                . "AND menu != 1 "
                . "AND type in (SELECT slug FROM terms WHERE post_id IN (SELECT post_id FROM options WHERE user_id = :user_id))"
                . "AND type = :type ORDER BY cdate DESC");
        $result->bindParam(':type', $type, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {

            $postList[$i]['id'] = $row['id'];
            $postList[$i]['title'] = $row['title'];
            $postList[$i]['author'] = $row['author'];
            $postList[$i]['cdate'] = $row['cdate'];
            $postList[$i]['descript'] = $row['descript'];
            $postList[$i]['slider'] = $row['slider'];
            $postList[$i]['status'] = $row['status'];
            $postList[$i]['parent'] = $row['parent'];
            $postList[$i]['type'] = $row['type'];
            $i++;
        }

        return $postList;
    }

    public static function addPost($options) {

        $db = Db::getConnection();

        $sql = "INSERT INTO posts (title, content, descript, cdate, startdate, author, type, status, path)"
                . "VALUES(:title, :content, :descript, :cdate, :startdate, :author, :type, :status, :path)";

        $author = 'admin';
        $cdate = date('Y-m-d H:i:s');
        $status = 1;
        if (empty($options['description'])) {
            $options['description'] = substr(strip_tags($options['content']), 0, 300);
        }

        $result = $db->prepare($sql);

        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':descript', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':cdate', $cdate, PDO::PARAM_STR);
        $result->bindParam(':startdate', $options['startdate'], PDO::PARAM_STR);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':type', $options['type'], PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':path', $options['path'], PDO::PARAM_STR);

        if ($result->execute()) {

            return $db->lastInsertId();
        }

        debug($result->errorInfo());
    }

    public static function addDraft() {

        $db = Db::getConnection();

        $sql = "INSERT INTO posts (cdate, author, status)"
                . "VALUES(:cdate, :author, :status)";

        $author = 'admin';
        $cdate = date('Y-m-d H:i:s');
        $status = -1;
 
        $result = $db->prepare($sql);        
        $result->bindParam(':cdate', $cdate, PDO::PARAM_STR);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);

        if ($result->execute()) {

            return $db->lastInsertId();
        }

        debug($result->errorInfo());
    }

    public static function updatePost($id, $options) {

        $db = Db::getConnection();

        $sql = "UPDATE posts
                SET title = :title,
                content = :content,
                descript = :descript,
                startdate = :startdate,
                type = :type,
		is_paid = :is_paid
                WHERE id = :id";

        $descript = substr(strip_tags($options['content']), 0, 300);
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':descript', $descript, PDO::PARAM_STR);
        $result->bindParam(':type', $options['type'], PDO::PARAM_STR);
        $result->bindParam(':startdate', $options['startdate'], PDO::PARAM_STR);
        $result->bindParam(':is_paid', $options['is_paid'], PDO::PARAM_INT);

        if ($result->execute()) {

            return true;
        } else {

            debug($result->errorInfo());
        }
    }

    public static function getImage($id) {

        $path = '../../uploads/';
        $noImage = 'no-image.jpg';

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

    /**
     * Change post status to 2.
     * @param post ID
     */
    public static function deleteProductById($id) {

        $db = Db::getConnection();

        $sql = 'UPDATE posts SET status = 2 WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getType($type) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT name, slug FROM terms WHERE term_id IN (SELECT term_id FROM term_taxonomy WHERE taxonomy = :type)");

        $result->bindParam(':type', $type, PDO::PARAM_STR);

        $result->execute();

        $i = 0;

        while ($row = $result->fetch()) {
            $types[$i]['name'] = $row['name'];
            $types[$i]['slug'] = $row['slug'];
            $i++;
        }

        return $types;
    }

    public static function getTrashList() {

        $db = Db::getConnection();

        $postList = [];

        $result = $db->prepare("SELECT id, title, cdate, type FROM posts WHERE status = 2");

        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {
            $postList[$i]['id'] = $row['id'];
            $postList[$i]['title'] = $row['title'];
            $postList[$i]['cdate'] = $row['cdate'];
            $postList[$i]['type'] = $row['type'];
            $i++;
        }

        return $postList;
    }

    public static function Restore($id) {

        $db = Db::getConnection();

        $sql = "UPDATE posts
                SET status = 1
                WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function Remove($id) {

        $db = Db::getConnection();

        $result = $db->prepare("DELETE FROM posts WHERE id = :id");

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        if ($result->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Check if post meta_value exists
     * @param Something
     * @author abrah
     */
    public static function checkPostMetaExists($postId, $metaKey) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT COUNT(*) FROM `post_meta` WHERE `post_id` = :id AND `meta_key` = :thumbnail_id");
        $result->bindParam(':id', $postId, PDO::PARAM_INT);
        $result->bindParam(':thumbnail_id', $metaKey, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

    public static function replacePostMeta($postId, $metaKey, $metaValue) {

        if (Posts::checkPostMetaExists($postId, $metaKey)) {

            Posts::updPostMeta(array(0 => $postId, 1 => $metaKey, 2 => $metaValue));
        } else {
            Posts::setPostMeta(array(0 => $postId, 1 => $metaKey, 2 => $metaValue));
        }
        return true;
    }

    /**
     * Check if post meta_value exists
     * @param Something
     * @author abrah
     */
    public static function setPostMeta($options) {

        $db = Db::getConnection();

        $result = $db->prepare("INSERT INTO post_meta (post_id, meta_key, meta_value) VALUES(:post_id, :meta_key, :meta_value);");
        $result->bindParam(':post_id', $options[0], PDO::PARAM_INT);
        $result->bindParam(':meta_key', $options[1], PDO::PARAM_STR);
        $result->bindParam(':meta_value', $options[2], PDO::PARAM_INT);
        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

    /**
     * Check if post meta_value exists
     * @param Something
     * @author abrah
     */
    public static function getPostMeta($postId, $metaKey) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT post_id, meta_value FROM post_meta WHERE post_id = :post_id AND meta_key = :meta_key");
        $result->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $result->bindParam(':meta_key', $metaKey, PDO::PARAM_STR);

        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $metaValue = $result->fetch();

        if ($metaValue) {
            return $metaValue;
        }
        return false;
    }

    /**
     * Check if post meta_value exists
     * @param Something
     * @author abrah
     */
    public static function updPostMeta($options) {

        $db = Db::getConnection();

        $result = $db->prepare("UPDATE post_meta SET meta_value = :meta_value WHERE meta_key = :meta_key AND post_id = :post_id");

        $result->bindParam(':post_id', $options[0], PDO::PARAM_INT);
        $result->bindParam(':meta_key', $options[1], PDO::PARAM_STR);
        $result->bindParam(':meta_value', $options[2], PDO::PARAM_INT);

        $result->execute();

        if ($result) {
            return true;
        }

        return false;
    }

    public static function changeStatusById($id) {

        $status = 2;

        $db = Db::getConnection();

        $currentStatus = $db->prepare('SELECT status FROM `posts` WHERE id = :id');
        $currentStatus->bindParam(':id', $id, PDO::PARAM_INT);

        $currentStatus->execute();

        $currentStatus = $currentStatus->fetchColumn(0);

        if ($currentStatus == 2) {
            $status = 1;
        }

        $result = $db->prepare('UPDATE posts SET status = :status WHERE id = :id');

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);

        return $result->execute();
    }

}
