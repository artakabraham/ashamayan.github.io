<?php

$hash = sha1($_POST['notification_type'].'&'.
        $_POST['operation_id'].'&'.
        $_POST['amount'].'&'.
        $_POST['currency'].'&'.
        $_POST['datetime'].'&'.
        $_POST['sender'].'&'.
        $_POST['codepro'].'&'.
        'APcOdcGY0uhFh+K7FOTcQZd2'.'&'.
        $_POST['label']);

$a = '';

if($_POST['sha1_hash'] != $hash || $_POST['codepro'] === true || $_POST['unaccepted'] === true ){
    
    echo "Error";
    
} 
    
    $a = print_r($_POST);

    file_put_contents('history.php',$_POST['label'],FILE_APPEND);    




