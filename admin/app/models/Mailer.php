<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailer
 *
 * @author abrah
 */
class Mailer {
    
    public static function sendMail($to,$subject,$text){
        
        $headers = "Content-type:text/html;charset=UTF-8 \r\n";
        $headers .= "MIME-Version: 1.0 \r\n";
        $headers .= "From: <info@ashamayan.com>";
        
        $subject = '=?UTF-8?B?' . base64_encode($subject).'?=';
        
        if(mail($to,$subject,$text,$headers)){
            
            return true;            
        }
        
        return false;        
    }
}
