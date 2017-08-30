<?php

require_once "Controller.php";
require_once '../admin/app/models/Mailer.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author abrah
 */
class UserController extends Controller {

    public function ActionLogin() {

        if (isset($_POST['submit'])) {

            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = User::checkUserExists($login, $password);

            $isComfirmed = User::checkConfirmedByID($user['id']);

            $error = false;

            if (User::isEmpty($login) || User::isEmpty($password)) {

                $error = '<span class="required">Заполните обязательные поля.</span>';
            } elseif (!$user) {
                $error = '<span class="required">Неверный логин или пароль.</span>';
            } elseif ($isComfirmed == 0) {
                $error = '<span class="required">Профиль не активирован.</span>';
            } else {
                $user = User::checkUserExists($login, $password);
                User::auth($user);
                header("Location:/");
            }
        }

        require_once APP . '/views/user/login.php';
        return true;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public function actionLogout() {

        unset($_SESSION['user']);
        session_destroy();
        header("Location: /");
    }

    public function ActionRegister() {

        if (isset($_POST['register'])) {

            $error = false;
            $success = false;

            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $reEmail = filter_var($_POST['reEmail'], FILTER_SANITIZE_STRING);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $rePass = filter_var($_POST['rePass'], FILTER_SANITIZE_STRING);

            if (empty($name) || empty($email) || empty($reEmail) || empty($password) || empty($rePass)) {

                $error = '<span class="required">Заполните обязательные поля.</span>';
            } elseif (!User::checkUserName($name)) {

                $error = '<span class="required">Имя должно быть больше 1 символa.</span>';
            } elseif (!User::checkEmail($email) || !User::checkEmail($reEmail)) {

                $error = '<span class="required">Неверный формат электронной почты.</span>';
            } elseif ($email != $reEmail) {

                $error = '<span class="required">Введенные адреса эл.почты не совпадают.</span>';
            } elseif (User::checkEmailExists1($email, 1)) {

                $success = '<span class="required">Пользователя с таким Е-mail уже существует.</span>';
            } elseif (!User::checkPassword($password)) {
                $error = '<span class="required">Пароль должен содержать не менее 6 символов, большие и маленькие буквы, цифры.</span>';
            } elseif ($password != $rePass) {
                $error = '<span class="required">Введенные пароли не совпадают.</span>';
            } elseif ($error == false) {

                $type = 3;
                $array = ['name' => $name, 'email' => $email, 'phone' => $phone, 'type' => $type, 'password' => $password, 'subscribe' => 0];
                $userId = User::userCreate($array, $type);
                $session = ['userId' => $userId, 'session' => sha1(microtime()), 'date' => date('Y-m-d H:i:s'), 'status' => 0];
                User::setSession($session);
                Mailer::sendMail($email, "Complete registration", "Open link to complete registration.<br> http://www.ashamayan.com/user/confirm/" . $session['session']);
                header("Location:/complete");
            }
        }

        require_once APP . '/views/user/register.php';
        return true;
    }

    public function ActionComplete() {

        $referer = isset($_SERVER['HTTP_REFERER']);
        $previous = "http://ashamayan.com/register";

        if ($referer == $previous) {

            require_once APP . '/views/user/complete.php';
            return true;
        } else {
            header("Location:/");
        }
    }

}
