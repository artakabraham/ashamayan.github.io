<?php
class Gallery extends Model {
	
    public static function getUploadDates(){

        $db = Db::getConnection();

        $imageList = [];

        $result = $db->prepare("SELECT DISTINCT SUBSTRING(cdate,1,7) AS name, EXTRACT(YEAR_MONTH FROM cdate) AS value FROM `posts` WHERE type = 'image' ORDER BY cdate DESC");

        $result->execute();

        $i = 0;
                while($row = $result->fetch()) {

                        $imageList[$i]['value'] = $row['value'];
                        $imageList[$i]['name'] = $row['name'];
                        $i++;			
                }

        return $imageList;
    }
	
    public static function getImgListByDate($cdate){

        $db = Db::getConnection();

        $images = [];

        $result = $db->prepare("SELECT id, title, descript, CONCAT('uploads/',REPLACE(SUBSTRING(cdate,1,7),'-','/'),'/',content) AS path FROM `posts` WHERE type = 'image' AND REPLACE(SUBSTRING(cdate,1,7),'-','') = :cdate");

        $result->bindParam(':cdate',$cdate,PDO::PARAM_STR);

        $result->execute();

        $i = 0;
            while($row = $result->fetch()) {

                    $images[$i]['id'] = $row['id'];
                    $images[$i]['title'] = $row['title'];
                    $images[$i]['path'] = $row['path'];
                    $images[$i]['descript'] = $row['descript'];
                    $i++;			
            }

        return $images;
    }
    
    
    public static function getFilePathById($id){
        
    if($id) {

        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->prepare("SELECT CONCAT('uploads/',REPLACE(SUBSTRING(cdate,1,7),'-','/'),'/',content) AS path FROM `posts` WHERE id = :id");

        $result->bindParam(':id',$id,PDO::PARAM_INT);

        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $filePath = $result->fetch();            

        return $filePath['path'];
        }      
        
    }
    
    
     /**
     * This method does something
     * @param Something
     * @author abrah
     */
    
    
    public static function deleteImgById($id){
        
        $db = Db::getConnection();

        $filePath = "../public/".self::getFilePathById($id);    
        
        if(file_exists($filePath)){
           
            unlink($filePath);
        }        

        $result = $db->prepare("DELETE FROM `posts` WHERE type = 'image' AND id = :id");
        
        $result->bindParam(':id',$id,PDO::PARAM_INT);

        $result->execute();
        
        if($result){
            
            return true;
        }
        
        return false;
              
    }
    
     /**
     * This method does something
     * @param Something
     * @author abrah
     */
    
    public static function checkFileExists($name) {
        
        $db = Db::getConnection();
        
        $sql = "SELECT COUNT(*) FROM posts WHERE type = 'image' AND content = :content";
        $result = $db->prepare($sql);
        $result->bindParam(':content',$name,PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetchColumn()){
            
            return true;
        }        
        
        return false; 
    }  
}