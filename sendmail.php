<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
  $fName =$_POST['fname'];
  $senderEmail = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['contact_message'];

//Validate first
if(empty($fname)||empty($senderEmail)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($senderEmail))
{
    echo "Bad email value!";
    exit;
}

$email_from = '$senderEmail';//<== update the email address
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $name.\n".
    "Here is the message:\n $message".
    
$to = "tom@amazing-designs.com";//<== update the email address
$headers = "From: $senderEmail \r\n";
$headers .= "Reply-To: $senderEmail \r\n";
//Send the email!
$send_email= mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
// header('Location: thank-you.html');

if ($send_email){

  echo  '<div class="success alert alert-success text-center rounded-pill mt-2">Email has been sent successfully.</div>' : 'Error: Email did not send.';
}
else
{
  echo '<div class="failed alert alert-danger text-center rounded-pill mt-2">Failed: Email not Sent.</div>';
}


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 