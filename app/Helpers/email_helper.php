<?php 
function sendEmail($userEmail,$subject,$message){
   $email = \Config\Services::email();

   $email->setTo($userEmail);
   $email->setSubject($subject);
   $email->setMessage($message);
   $email->send();
}
?>