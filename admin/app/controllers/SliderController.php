<?php

require_once APP . '/models/Slider.php';
require_once APP . '/models/Posts.php';

class SliderController extends Controller {

    public static function actionIndex() {

        $mainSlider = Slider::getSlider();

        require_once APP . '/views/sliders/index.php';

        return true;
    }

    public static function actionRemove($action, $alias, $id) {

        if ($id) {

            Slider::removeSliderById($id);
        }

        return true;
    }

    public static function actionEdit($action, $alias, $id) {

        $slider = Slider::getPostById($id);

        $sliderImgPath = Slider::getSliderImage($id);

        //debug($sliderImgPath);

        if (isset($_POST['submit'])) {

            Slider::createSilderbyID($id);

            if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

                if (getimagesize($_FILES['image']['tmp_name'])) {

                    move_uploaded_file($_FILES['image']['tmp_name'], WWW . '/public/images/slider/' . $_FILES["image"]["name"]);

                    Image::cropSliderImage(WWW . '/public/images/slider/' . $_FILES["image"]["name"], WWW . '/public/images/slider/' . $_FILES["image"]["name"], 1100, 460);

                    Posts::replacePostMeta($id, '_slider', '/images/slider/' . $_FILES["image"]["name"]);
                }
                echo '/images/slider/' . $_FILES["image"]["name"];
                exit();
            } else {
                echo $sliderImgPath;
                exit();
            }
        }

        require_once APP . '/views/sliders/update.php';

        return true;
    }

}
