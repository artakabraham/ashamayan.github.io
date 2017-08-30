<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SendMail
 *
 * @author abrah
 */
class Mail {
    
   public static function sendMail($eMail,$subject,$message){
       
       $message = wordwrap($message,70);
        
       $result = mail($eMail,$subject,$message);
       
       if(!$result) {
           
           return false;           
       }
       
       return true;
        
    }  
}