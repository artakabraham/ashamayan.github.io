<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubscribeController
 *
 * @author abrah
 */
require_once 'Controller.php';
require_once APP . '/models/Articles.php';

class SubscribeController extends Controller {

    public function actionIndex() {

        $topPrograms = Articles::getNewsTop(5, 'program');

        if (isset($_POST['register'])) {

            $errors = false;
            $success = false;

            $option['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $option['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $option['reEmail'] = filter_var($_POST['reEmail'], FILTER_SANITIZE_STRING);
            $option['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

            if (empty($option['name']) || empty($option['email']) || empty($option['reEmail'])) {

                $errors [] = '<span class="required">Заполните обязательные поля.</span>';
            } elseif (!User::checkUserName($option['name'])) {

                $errors [] = '<span class="required">Имя должно быть больше 1 символa.</span>';
            } elseif (!User::checkEmail($option['email']) || !User::checkEmail($option['reEmail'])) {

                $errors [] = '<span class="required">Неверный формат электронной почты.</span>';
            } elseif ($option['email'] != $option['reEmail']) {

                $errors [] = '<span class="required">Введенные адреса эл.почты не совпадают.</span>';
            } elseif (User::checkSubscribe($option['email']) && User::checkEmailExists($option['email'], 1)) {

                $success = '<span style="color:#398f14;"><p>Вы уже подписались.</p></span>';
            }

            if ($errors == false && !User::checkEmailExists($option['email'], 1)) {

                if (USER::userSubscribe($option, 1)) {
                    $success = '<span style="color:#398f14;"><p>Вы успешно подписались.</p></span>';
                    $headers = "Content-type:text/html;charset=UTF-8 \r\n";
                    $headers .= "MIME-Version: 1.0 \r\n";
                    $headers .= "From: <info@ashamayan.com>";
                    $subject = '=?UTF-8?B?' . base64_encode('Вы успешно подписались') . '?=';
                    $text = "<p>Вы успешно подписались.</p><p>Отписатся можно по <a href='http://asha.com/unsubscribe'>этой ссылке</a></p>";

                    mail($option['email'], $subject, $text, $headers);
                }
            }

            if (!User::checkSubscribe($option['email']) && User::checkEmailExists($option['email'], 1)) {

                if (User::updateSubscribe($option)) {
                    $success = '<span style="color:#398f14;"><p>Вы успешно подписались.</p></span>';
                    $text = "<p>Вы успешно подписались.</p><p>Отписатся можно по <a href='http://asha.com/unsubscribe'>этой ссылке</a></p>";
                    $subject = 'You are registered';
                    $headers = "MIME-Version: 1.0 \r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8 \r\n";
                    $headers .= "From: <info@ashamayan.com>";
                    mail($option['email'], $subject, $text, $headers);
                }
            }
        }
        require_once APP . '/views/subscribe/index.php';
        return true;
    }

    /**
     * addRelationship        *
     * Adds a relationship between two entities using the given relation type.        *
     * @param fromKey the original entity
     * @param toKey the referring entity
     * @param relationTypeDesc the type of relationship
     */
    public function actionUnsubscribe($email) {

        $topPrograms = Articles::getNewsTop(5, 'program');

        $errors = false;
        $success = false;

        if (isset($_POST['submit'])) {

            $email = $_POST['email'];

            if (!User::checkEmail($email)) {
                $errors [] = '<span class="required">Неверный формат электронной почты.</span>';
            }

            if ($errors == false) {

                User::unSubscribe($email);
                $success = '<span style="color:#398f14;"><p>Вы успешно Отписались.</p></span>';
            }
        }

        require_once APP . '/views/subscribe/unsubscribe.php';

        return true;
    }

}
