<?php

/* File: Account.php
 * Creator: Manarpaac, Ramir
 * Description:
 *      Shorthand invoke for database transactions(sql)
 * 
 */



$paths = array(
    realpath(dirname(__FILE__) . '/library'),
    '.',
);

set_include_path(implode(PATH_SEPARATOR,$paths));

require 'Zend/Mail.php';
require 'Zend/Mail/Transport/Smtp.php';

class Account
{
    private $_mail;
//    private $_data = array();
    private $_studInfo = "sample";
    private $_account = "account";
    public $data = array();
    

    public function fetchData($mysql)
    {
            $row = mysql_fetch_assoc($mysql);
            foreach($row as $column => $value)
            {
                $_SESSION[$column] = $value;
                
               $this->data[$column] = $value;
                
            }
    }
    
    public function fetchDataNoSession($mysql)
    {
            $row = mysql_fetch_assoc($mysql);
            foreach($row as $column => $value)
            {
                
                
               $this->data[$column] = $value;
                
            }
    }
      
    public function stopSession()
    {
        
        unset($data);
        return session_destroy();
    }
    
    public function sendConfirm($arrydata)
    {
        $smtpConfig;
        $smtpHost;
        $add = array('@gmail','@yahoo','@hotmail');
        
       for($i = 0 ; $i < count($add);$i++) {
            
            $str = strstr($arrydata["email"],$add[$i]);
            
            
            if($str == "@gmail.com")
             {
                    $smtpHost = "smtp.gmail.com";
                    $smtpConfig = array(
                             'auth' => 'login',
                             'ssl' => 'ssl',
                             'port' => '465',
                             'username' => "letranrdd@gmail.com",
                             'password' => "letranrdd"
                    );
                    
                    break;  
             }
             elseif($str == "@yahoo.com")
             {
                 echo "hi im using yahoo email account";
                 break;
             }
            
            
            
        }
        
       
            $transport = new Zend_Mail_Transport_Smtp($smtpHost, $smtpConfig);
        $mail = new Zend_Mail();
         $mail->setFrom("letranrdd@gmail.com","Letran R&DD");
        $mail->addTo("morbidtritz2@gmail.com");
        $mail->setSubject('Hello World');
        $mail->setBodyText('This is the body text of the email.');
        
        $mail->send($transport);
      
        
        


        
    }
    
    
    
    
    
    
    
    
    
    
    
   
}



?>
