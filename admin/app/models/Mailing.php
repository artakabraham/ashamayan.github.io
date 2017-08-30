<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailing
 *
 * @author Artak.Abrahamyan
 */
class Mailing {
   
    
        public static function getLastPost($count, $type) {

        $db = Db::getConnection();

        $NewsTop = [];

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
    
    
}
