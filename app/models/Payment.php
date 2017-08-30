<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Payment
 *
 * @author abrah
 */
require_once CORE . '/Db.php';

class Payment {

    public static function addPayment($options = []) {

        $date = date_create($options['datetime']);
        $newDate = date_format($date, "Y-m-d H:i:s");
        $options['codepro'] ? $codepro = 1 : $codepro = 0; 


//        file_put_contents('history.php', "notification_type - " . $options['notification_type'] . ",\n" .
//                "operation_id - " . $options['operation_id'] . ",\n" .
//                "date - " . $newDate . ",\n" .
//                "sha1_hash - " . $options['sha1_hash'] . ",\n" .
//                "label - " . $_POST['label'] . ",\n" .
//                "codepro - " . $codepro . ",\n" .
//                "currency - " . $options['currency'] . ",\n" .
//                "amount - " . $options['amount'] . ",\n" .
//                "sender - " . $options['sender']
//        );

        $unaccepted = 0;
        $userID = 0;
        $post_id = 0;

        $db = Db::getConnection();

        $result = $db->prepare("INSERT INTO yandex (notification_type, operation_id, `date`, sha1_hash, codepro, unaccepted, currency, amount, sender, user_id, post_id) "
                                         . "VALUES (:notification_type, :operation_id, :date, :sha1_hash, :codepro, :unaccepted, :currency, :amount, :sender, :user_id, :post_id)");

        $result->bindParam(':notification_type', $options['notification_type'], PDO::PARAM_STR);
        $result->bindParam(':operation_id', $options['operation_id'], PDO::PARAM_STR);
        $result->bindParam(':date', $newDate, PDO::PARAM_STR);
        $result->bindParam(':sha1_hash', $options['sha1_hash'], PDO::PARAM_STR);
        $result->bindParam(':codepro', $codepro, PDO::PARAM_STR);
        $result->bindParam(':unaccepted', $unaccepted, PDO::PARAM_STR);
        $result->bindParam(':currency', $options['currency'], PDO::PARAM_INT);
        $result->bindParam(':amount', $options['amount'], PDO::PARAM_STR);
        $result->bindParam(':sender', $options['sender'], PDO::PARAM_STR);
        $result->bindParam(':user_id', $userID, PDO::PARAM_STR);
        $result->bindParam(':post_id', $post_id, PDO::PARAM_INT);

        if ($result->execute()) {
            
            $res = $db->lastInsertId();

            file_put_contents('history.php', $res);
        } else {
            
            $res = $result->errorInfo();
            
            file_put_contents('history.php', $res);
        }
    }

}
