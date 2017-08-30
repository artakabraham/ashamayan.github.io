<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaymentController
 *
 * @author abrah
 */
require_once APP . '/models/Payment.php';
class PaymentController {

    public function ActionEvents() {

        $hash = sha1($_POST['notification_type'] . '&' .
                $_POST['operation_id'] . '&' .
                $_POST['amount'] . '&' .
                $_POST['currency'] . '&' .
                $_POST['datetime'] . '&' .
                $_POST['sender'] . '&' .
                $_POST['codepro'] . '&' .
                'VGMt8vmDj/h9eMUdMw41PjMM' . '&' .
                $_POST['label']);

        if ($_POST['sha1_hash'] != $hash /* || $_POST['codepro'] === true || $_POST['unaccepted'] === true */) {

            file_put_contents('history.php', "Error");
        } 
        else 
            {

            Payment::addPayment($_POST);
        }
        return true;
    }

}
