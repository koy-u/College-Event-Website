<?php
   
   if(isset($_POST['submit'])){
  $name=$_POST['Name'];
  $mailFrom=$_POST['Email'];
  $message=$_POST['Message'];
 
  $mailTO = "mail@mail.com";
  $headers = "From: ".$mailFrom;
  $txt = "You have received an email from".$Name.".\n\n".$Message;
  mail($mailTo,$txt,$headers);
  header("Location: tryw3css_templates_band.php?mailsend");
   }
?>