

<?php

if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "sethkin30@gmail.com";
 
    $email_subject = "Contact Email From Portfolio";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Oops, there appears to be a problem with the form you submitted.<br/><br/> ";
 
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
        
        echo "<a href=".$_SERVER['HTTP_REFERER'].">Go back</a>";
		 
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['comments'])) {
 
        died('Oops, there appears to be a problem with the form you submitted.<br /><br />');       
 
    }
 
     
 
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '*Invalid Email<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= '*Invalid First Name<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= '*Invalid Last Name<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= '*Invalid Comments<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
  
<p style="text-align: center;">Thank you for contacting me!</p>
<p style="text-align: center;">I will be in touch with you very soon!</p>
 
 
 
<?php
 
}



?>

