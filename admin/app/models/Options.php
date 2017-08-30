<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Options
 *
 * @author abrah
 */
class Options {

    public static function getPermission($userId, $modul) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT count(o.id) FROM options o, terms t, term_taxonomy tx
                                WHERE o.user_id = :user_id
                                AND t.slug = :modul
                                AND o.post_id = t.post_id                                
                                AND t.term_id = tx.term_id
                                AND tx.taxonomy IN ('page','modul');");

        $result->bindParam('user_id', $userId, PDO::PARAM_INT);
        $result->bindParam('modul', $modul, PDO::PARAM_STR);

        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

    public static function getPermissionByUser($userId) {

        $db = Db::getConnection();

        $itemList = [];

        $result = $db->prepare("SELECT t.post_id, t.name, o.user_id FROM terms t 
                                LEFT JOIN (
                                SELECT  user_id, post_id
                                FROM options 
                                WHERE user_id = :user_id) o ON t.post_id = o.post_id
                                WHERE `term_id` IN (SELECT term_id FROM term_taxonomy WHERE taxonomy IN ('page','modul'))
                                AND t.slug NOT IN ('menu','media','slider','service','users','mail');");
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {

            $itemList[$i]['post_id'] = $row['post_id'];
            $itemList[$i]['name'] = $row['name'];
            $itemList[$i]['user_id'] = $row['user_id'];
            $i++;
        }

        return $itemList;
    }

    public static function getPermissionByUserModul($userId) {

        $db = Db::getConnection();

        $itemList = [];

        $result = $db->prepare("SELECT t.post_id, t.name, o.user_id FROM terms t 
                                LEFT JOIN (
                                SELECT  user_id, post_id
                                FROM options 
                                WHERE user_id = :user_id) o ON t.post_id = o.post_id
                                WHERE t.slug IN ('menu','media','slider','service','users','mail') 
                                AND `term_id` IN (SELECT term_id FROM term_taxonomy WHERE taxonomy IN ('page','modul'));");
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {

            $itemList[$i]['post_id'] = $row['post_id'];
            $itemList[$i]['name'] = $row['name'];
            $itemList[$i]['user_id'] = $row['user_id'];
            $i++;
        }

        return $itemList;
    }

    public static function checkPermission($userId, $pageId) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT count(*) FROM options WHERE user_id = :user_id AND post_id = :post_id");

        $result->bindParam('user_id', $userId, PDO::PARAM_INT);
        $result->bindParam('post_id', $pageId, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

    public static function unsetPermission($userId, $pageId) {

        $db = Db::getConnection();

        $result = $db->prepare("DELETE FROM options WHERE `user_id` = :user_id AND `post_id` = :post_id");

        $result->bindParam('user_id', $userId, PDO::PARAM_INT);
        $result->bindParam('post_id', $pageId, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

    public function setPermission($userId, $pageId) {

        $db = Db::getConnection();

        $result = $db->prepare("INSERT INTO options (`user_id`,`post_id`) VALUES (:user_id,:post_id)");

        $result->bindParam('user_id', $userId, PDO::PARAM_INT);
        $result->bindParam('post_id', $pageId, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

}
