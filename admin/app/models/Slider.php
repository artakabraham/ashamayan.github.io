<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slider
 *
 * @author abrah
 */
class Slider extends Model {

    public static function getSlider() {

        $db = Db::getConnection();

        $slider = [];

        $result = $db->query("SELECT id, title, slider, type FROM posts WHERE status = 1 and slider = 1 AND type != 'modul'");

        $i = 0;
        while ($row = $result->fetch()) {

            $slider[$i]['id'] = $row['id'];
            $slider[$i]['title'] = $row['title'];
            $slider[$i]['slider'] = $row['slider'];
            $slider[$i]['type'] = $row['type'];
            $i++;
        }

        return $slider;
    }

    public static function getSliderById($id) {

        if ($id) {

            $id = intval($id);

            $db = Db::getConnection();

            $sql = "SELECT id, title, slider FROM posts WHERE status = 1 and slider = 1 AND id = :id";

            $result = $db->prepare($sql);

            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->execute();

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $sliderItem = $result->fetch();

            return $sliderItem;
        }
    }

    public static function removeSliderById($id) {

        if ($id) {

            $id = intval($id);

            $db = Db::getConnection();

            $result = $db->query("UPDATE posts SET slider = 0 WHERE id=" . $id);

            return $result->execute();
        }
    }

    public static function getPostById($id) {

        if ($id) {

            $id = intval($id);

            $db = Db::getConnection();

            $result = $db->query("SELECT id, title FROM posts WHERE status = 1 AND id=" . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $sliderItem = $result->fetch();

            return $sliderItem;
        }
    }

    public static function getImage($id) {

        $noImage = 'no-image.jpg';

        $path = '/images/slider/';

        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists(WWW . $pathToProductImage)) {

            return $pathToProductImage;
        }

        return $path . $noImage;
    }

    public static function getSliderImage($id) {

        $sliderImgPath = Posts::getPostMeta($id, '_slider')['meta_value'];

        if (empty($sliderImgPath)) {

            $sliderImgPath = Slider::getImage($id);
        }

        return $sliderImgPath;
    }

    public static function createSilderbyID($id) {

        if ($id) {
            $id = intval($id);
            $db = Db::getConnection();
            $result = $db->query("UPDATE posts SET slider = 1 WHERE id=" . $id);
            $result->execute();
        }
    }

}
