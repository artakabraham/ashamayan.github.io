<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CheckoutController
 *
 * @author abrah
 */
require_once "Controller.php";

class CheckoutController extends Controller {

    public function actionCheckout($id) {

        if (isset($_POST['submit'])) {

            $options = $_POST;

            if (isset($_SESSION['user'])) {
                $options['user'] = $_SESSION['user']['id'];
            } else {
                $options['user'] = $_SESSION['guest'];
            }
            require_once APP . '/views/books/checkout.php';
            return true;
        }

        header("Location: /");
    }

}
