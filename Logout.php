<?php
   session_start();
  
   //When breaking session, redirects to login page 
   if(session_destroy()) {
      header("Location: login.php");
   }
?>