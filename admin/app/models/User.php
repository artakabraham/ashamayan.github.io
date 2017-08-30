<?php

//namespace admin\app\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author abrah
 */
class User {

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkPassword($password) {

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
            return false;
        }
        return true;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkEmail($email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return true;
        }
        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkUserName($name) {

        $name = filter_var(str_replace(' ', '', $name), FILTER_SANITIZE_STRING);

        if (strlen($name) >= 1) {

            return true;
        }
        return false;
    }

    public static function isEmpty($string) {

        $string = preg_replace('/\s+/', '', $string);
        if ($string === '' || empty($string)) {
            return true;
        }
        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function Sanitize($name) {

        return $name = filter_var(str_replace(' ', '', $name), FILTER_SANITIZE_STRING);
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkEmailExists($email, $type) {

        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM users WHERE roleID IN($type) AND email = :email";
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        //$result->bindParam(':roleID', $type, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

    public static function checkEmailExists1($email) {

        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkSubscribe($email) {

        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM users WHERE email = :email AND subscribe = 1";
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {

            return true;
        }

        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkUserData($email, $password) {

        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE email = :email AND password = :password AND roleID IN (0,2)";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $user = $result->fetch();

        if ($user) {

            return $user;
        }

        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function auth($userID) {

        $_SESSION['user'] = $userID;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkLogged() {

        if (isset($_SESSION['user'])) {

            return $_SESSION['user'];
        }

        header("Location: user/login");
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function userSubscribe($array, $type) {
        $db = Db::getConnection();
        $sql = "INSERT INTO users (name, email, phone, roleID, subscribe, cdate) VALUES (:name, :email, :phone, :type, :subscribe, :cdate)";
        $cdate = date('Y-m-d H:i:s');
        $result = $db->prepare($sql);

        $result->bindParam(':name', $array['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $array['email'], PDO::PARAM_STR);
        $result->bindParam(':phone', $array['phone'], PDO::PARAM_STR);
        $result->bindParam(':type', $type, PDO::PARAM_INT);
        $result->bindParam(':subscribe', $array['subscribe'], PDO::PARAM_INT);
        $result->bindParam(':cdate', $cdate, PDO::PARAM_STR);
        $result->execute();
        if ($result) {

            return $db->lastInsertId();
        }
        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function updateSubscribe($array) {

        $db = Db::getConnection();

        $sql = "UPDATE users SET name = :name, phone = :phone, subscribe = 1, cdate = :cdate WHERE email = :email";

        $cdate = date('Y-m-d H:i:s');

        $result = $db->prepare($sql);
        $result->bindParam(':name', $array['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $array['email'], PDO::PARAM_STR);
        $result->bindParam(':cdate', $cdate, PDO::PARAM_STR);
        $result->bindParam(':phone', $array['phone'], PDO::PARAM_STR);

        $result->execute();

        if ($result) {

            return true;
        }

        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function unSubscribe($email) {

        $db = Db::getConnection();

        $sql = "UPDATE users SET subscribe = 0 WHERE email = :email";
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);

        $result->execute();

        if ($result) {

            return true;
        }

        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkAdmin($id) {

        $db = Db::getConnection();

        $sql = "SELECT count(*) FROM users WHERE roleID = 0 AND id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $result->fetch();

        if ($result) {

            return true;
        }

        return false;
    }

    public static function getSubscribers($status) {
        $db = Db::getConnection();
        $subscribers = [];
        $sql = "SELECT name, email, phone, cdate FROM users WHERE roleID = 1 AND subscribe = :subscribe";
        $result = $db->prepare($sql);
        $result->bindParam(':subscribe', $status, PDO::PARAM_INT);
        $result->execute();
        if ($result) {
            $i = 0;
            while ($row = $result->fetch()) {
                $subscribers[$i]['name'] = $row['name'];
                $subscribers[$i]['email'] = $row['email'];
                $subscribers[$i]['phone'] = $row['phone'];
                $subscribers[$i]['cdate'] = $row['cdate'];
                $i++;
            }
            return $subscribers;
        }
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function setUserData($name, $email, $phone, $password) {

        $db = Db::getConnection();

        $sql = "Update users SET name = :name, email = :email, phone = :phone WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

        $result->execute();

        if ($result) {

            return true;
        }

        return false;
    }

    public static function getUserData() {

        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE id = :id";

        $result = $db->prepare($sql);

        $result->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $userData = $result->fetch();

        if ($result) {

            return $userData;
        }

        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkPasswordExists($id, $password) {
        $db = Db::getConnection();
        $sql = "SELECT count(*) FROM users WHERE password = :password AND id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
        $result->execute();
        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    /**
     * This method sets user password
     * @password string
     * @newPassword string
     */
    public static function setPassword($password, $newPassword) {

        $db = Db::getConnection();

        $sql = "UPDATE users SET password = :newPassword WHERE password = :password AND id = :id";

        $result = $db->prepare($sql);

        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
        $result->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

        $result->execute();

        if ($result) {

            return true;
        }

        return false;
    }

    public static function getEmailList() {

        $db = Db::getConnection();

        $mailList = '';

        $result = $db->prepare("SELECT email FROM users WHERE subscribe = 1");

        $result->execute();

        if ($result) {

            $i = 0;
            while ($row = $result->fetch()) {
                $mailList = $row['email'] . "," . $mailList;
                $i++;
            }
            return rtrim($mailList, ",");
        }
    }

    public static function getUsers() {

        $db = Db::getConnection();

        $userList = [];

        $result = $db->prepare("SELECT id, name, email, phone, roleID, subscribe, cdate FROM users WHERE roleID IN (0,2)");

        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {

            $userList[$i]['id'] = $row['id'];
            $userList[$i]['name'] = $row['name'];
            $userList[$i]['email'] = $row['email'];
            $userList[$i]['phone'] = $row['phone'];
            $userList[$i]['cdate'] = $row['cdate'];
            $userList[$i]['subscribe'] = $row['subscribe'];
            $i++;
        }
        return $userList;
    }

    public static function setSession($session) {
        $db = Db::getConnection();
        $result = $db->prepare("INSERT INTO sessions(`user_id`,`session`,`date`,`status`) VALUES(:user_id,:session,:date,:status)");

        $result->bindParam(':user_id', $session['userId'], PDO::PARAM_INT);
        $result->bindParam(':session', $session['session'], PDO::PARAM_STR);
        $result->bindParam(':date', $session['date'], PDO::PARAM_STR);
        $result->bindParam(':status', $session['status'], PDO::PARAM_INT);

        $result->execute();
    }

    private static function getUserIdBySession($session) {

        $db = Db::getConnection();
        $result = $db->prepare("SELECT user_id FROM sessions WHERE session = :session");
        $result->bindParam(':session', $session, PDO::PARAM_STR);
        $result->execute();
        return $result->fetchColumn(0);
    }

    public static function checkConfirmed($session) {

        $db = Db::getConnection();
        $result = $db->prepare("SELECT status FROM sessions WHERE session = :session");
        $result->bindParam(':session', $session, PDO::PARAM_STR);
        $result->execute();
        return $result->fetchColumn(0);
    }

    public static function checkConfirmedByID($userID) {
        
        $db = Db::getConnection();
        $result = $db->prepare("SELECT status FROM sessions WHERE user_id = :user_id");
        $result->bindParam(':user_id', $userID, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchColumn(0);
    }

    public static function confirmUser($session, $password) {

        $db = Db::getConnection();

        $userId = User::getUserIdBySession($session);

        $result = $db->prepare("UPDATE sessions SET status = 1 WHERE session = :session AND user_id = :user_id");
        $result->bindParam(':session', $session, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);

        $result1 = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
        $result1->bindParam(':password', $password, PDO::PARAM_STR);
        $result1->bindParam(':id', $userId, PDO::PARAM_INT);

        $result->execute();
        $result1->execute();

        if ($result && $result1) {

            return true;
        }
        return false;
    }

    //////////////// FRONT //////

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function checkUserExists($email, $password) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $user = $result->fetch();

        if ($user) {

            return $user;
        }

        //$result->errorInfo();
        return false;
    }

    /**
     * This method does something
     * @param Something
     * @author abrah
     */
    public static function userRegister($array, $type) {
        $db = Db::getConnection();
        $sql = "INSERT INTO users (name, email, phone, roleID, subscribe, cdate) VALUES (:name, :email, :phone, :type, :subscribe, :cdate)";
        $cdate = date('Y-m-d H:i:s');
        $result = $db->prepare($sql);

        $result->bindParam(':name', $array['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $array['email'], PDO::PARAM_STR);
        $result->bindParam(':phone', $array['phone'], PDO::PARAM_STR);
        $result->bindParam(':type', $type, PDO::PARAM_INT);
        $result->bindParam(':subscribe', $array['subscribe'], PDO::PARAM_INT);
        $result->bindParam(':cdate', $cdate, PDO::PARAM_STR);
        $result->execute();
        if ($result) {

            return $db->lastInsertId();
        }
        return false;
    }

    /**
     * Create front user
     */
    public static function userCreate($array, $type) {

        $db = Db::getConnection();
        $sql = "INSERT INTO users (name, email, phone, roleID, subscribe, cdate, password) VALUES (:name, :email, :phone, :type, :subscribe, :cdate, :password)";
        $cdate = date('Y-m-d H:i:s');
        $result = $db->prepare($sql);

        $result->bindParam(':name', $array['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $array['email'], PDO::PARAM_STR);
        $result->bindParam(':phone', $array['phone'], PDO::PARAM_STR);
        $result->bindParam(':type', $type, PDO::PARAM_INT);
        $result->bindParam(':subscribe', $array['subscribe'], PDO::PARAM_INT);
        $result->bindParam(':cdate', $cdate, PDO::PARAM_STR);
        $result->bindParam(':password', $array['password'], PDO::PARAM_STR);
        $result->execute();
        if ($result) {

            return $db->lastInsertId();
        }
        return false;
    }

}
