<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author abrah
 */
class Menu extends Controller {

    public static function getMenu() {

        $db = Db::getConnection();

        $postList = [];

        $result = $db->prepare("SELECT id, title, author, cdate, descript, slider, status, ordering FROM posts WHERE type = 'menu' ORDER BY ordering");

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
            $postList[$i]['ordering'] = $row['ordering'];
            $i++;
        }

        return $postList;
    }

    public static function add($options) {

        $db = Db::getConnection();

        $sql = "INSERT INTO posts (title, content, descript, cdate, startdate, author, type, status, path, menu, ordering)"
                . "VALUES(:title, :content, :descript, :cdate, :startdate, :author, :type, :status, :path, 1, :ordering)";

        $author = 'admin';
        $cdate = date('Y-m-d H:i:s');
        $status = 2;
        $content = '';
        $path = '';
        $startdate = NULL;
        $type = 'menu';

        $result = $db->prepare($sql);

        $result->bindParam(':title', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':content', $content, PDO::PARAM_STR);
        $result->bindParam(':descript', $options['alias'], PDO::PARAM_STR);
        $result->bindParam(':cdate', $cdate, PDO::PARAM_STR);
        $result->bindParam(':startdate', $startdate, PDO::PARAM_STR);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':type', $type, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':path', $path, PDO::PARAM_STR);
        $result->bindParam(':ordering', $options['order'], PDO::PARAM_INT);

        if ($result->execute()) {

            return $db->lastInsertId();
        }

        debug($result->errorInfo());
    }

    public static function updateMenu($id, $options) {

        $db = Db::getConnection();
        $result = $db->prepare("UPDATE posts SET title = :title, descript = :descript, type = :type WHERE id = :id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':descript', $options['alias'], PDO::PARAM_STR);
        $result->bindParam(':type', $options['type'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getMenuById($id) {

        if ($id) {

            $id = (int) $id;

            $db = Db::getConnection();

            $result = $db->prepare("SELECT id, title, descript FROM posts WHERE type = 'menu' AND id = :id");

            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->execute();

            if ($result) {
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $menuItem = $result->fetch();
                return $menuItem;
            } else {
                $result->errorInfo();
            }
        }
    }

    public static function getMenuItemList($user_id) {

        $db = Db::getConnection();

        $menuItems = [];

        $result = $db->prepare("SELECT `name`, `slug` FROM terms WHERE term_id IN (SELECT `term_id` FROM `term_taxonomy` "
                . "WHERE `taxonomy` = 'page')"
                . "AND `post_id` IN (SELECT `post_id` FROM options WHERE user_id = :user_id)");
        
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {

            $menuItems[$i]['name'] = $row['name'];
            $menuItems[$i]['slug'] = $row['slug'];
            $i++;
        }

        return $menuItems;
    }

    public static function swapeMenu($id) {

        $db = Db::getConnection();

        $menuOrder = [];

        $result = $db->prepare("SELECT `id`, `ordering` FROM `posts` WHERE type = 'menu' ORDER BY ordering");

        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {

            $menuOrder[$i]['id'] = $row['id'];
            $menuOrder[$i]['order'] = $row['ordering'];
            $i++;
        }

        $tmp = 1;
        for ($i = 0; $i < count($menuOrder); $i ++) {

            if ($menuOrder[$i]['order'] != 1 && $menuOrder[$i]['id'] == $id) {

                $tmp = $menuOrder[$i]['order'];

                $menuOrder[$i]['order'] = $menuOrder[$i - 1]['order'];

                $result = $db->prepare("UPDATE posts SET ordering = " . $menuOrder[$i - 1]['order'] . " WHERE id = " . $menuOrder[$i]['id']);

                $result->execute();

                $menuOrder[$i - 1]['order'] = $tmp;

                $result1 = $db->prepare("UPDATE posts SET ordering = " . $tmp . " WHERE id = " . $menuOrder[$i - 1]['id']);

                $result1->execute();
            }
        }
    }

    public static function addTerms($postId, $options) {

        $db = Db::getConnection();

        $name = ucfirst($options['alias']);
        $slug = $options['alias'];

        $result = $db->prepare("INSERT INTO terms (post_id, name, slug) VALUES(:post_id, :name, :slug)");

        $result->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':slug', $slug, PDO::PARAM_STR);

        if ($result->execute()) {

            return $db->lastInsertId();
        }
        debug($result->errorInfo());
    }

    public static function updateTerms($id, $options) {

        $db = Db::getConnection();

        $alias = ucfirst($options['alias']);
        $slug = strtolower($options['alias']);

        $result = $db->prepare("UPDATE terms SET name = :name, slug = :slug WHERE id = :id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $alias, PDO::PARAM_STR);
        $result->bindParam(':slug', $slug, PDO::PARAM_STR);
        if ($result) {
            return $result->execute();
        } else {
            debug($result->errorInfo());
        }
    }

    public static function addTermTaxonomy($termId, $taxonomy) {

        $db = Db::getConnection();

        $result = $db->prepare("INSERT INTO term_taxonomy (term_id, taxonomy) VALUES(:term_id, :taxonomy)");

        $result->bindParam(':term_id', $termId, PDO::PARAM_INT);
        $result->bindParam(':taxonomy', $taxonomy, PDO::PARAM_STR);

        if ($result->execute()) {

            return $db->lastInsertId();
        }

        debug($result->errorInfo());
    }

    public static function getLastOrder() {
        
        $db = Db::getConnection();

        $result = $db->prepare("SELECT ordering FROM posts WHERE type = 'menu' ORDER BY ordering DESC LIMIT 1");

        if ($result->execute()) {

            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            $lastOrder = $result->fetchColumn(0);
            
            return $lastOrder +1;
        } 
        else {
            
            $result->errorInfo();
        }
    }

}
