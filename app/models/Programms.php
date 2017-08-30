<?php
require_once CORE.'/Db.php';

class Programms {
    
   public static function getProgrammsList(){
       
       $db = Db::getConnection();

        $programmsList = [];

        $result = $db->query("SELECT id, title, descript FROM posts WHERE status = 1 AND type = 'programms' ORDER BY cdate DESC");

            $i = 0;
            while($row = $result->fetch()) {

                    $newsList[$i]['id'] = $row['id'];
                    $newsList[$i]['title'] = $row['title'];
                    $newsList[$i]['descript'] = $row['descript'];
                    $i++;			
            }

        return $programmsList;
		
    }    
}