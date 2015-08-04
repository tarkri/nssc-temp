<?php
 
if(isset($_POST['student_email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "nationalstudentshow.com@gmail.com";
 
    $email_subject = "There is a submission to the Golden Apple Nomination Form";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['student_name']) ||
 
        !isset($_POST['year_in_school']) ||
 
        !isset($_POST['student_email']) ||
 
        !isset($_POST['school_name']) ||
        
        !isset($_POST['school_instructor']) ||
        
        !isset($_POST['school_dean_department']) ||
        
        !isset($_POST['school_dean_phone']) ||
 
        !isset($_POST['why_nominate'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $student_name = $_POST['student_name']; // required
 
    $year_in_school = $_POST['year_in_school']; // required
 
    $email_from = $_POST['student_email']; // required
 
    $school_name = $_POST['school_name']; // not required
    
    $school_instructor = $_POST['school_instructor']; // not required
    
    $school_dean_department = $_POST['school_dean_department']; // not required
    
    $school_dean_phone = $_POST['school_dean_phone']; // not required
 
    $why_nominate = $_POST['why_nominate']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$student_name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Student Name: ".clean_string($student_name)."\n";
 
    $email_message .= "Email Address: ".clean_string($email_from)."\n";
 
    $email_message .= "Year In School: ".clean_string($year_in_school)."\n";
 
    $email_message .= "Name of School: ".clean_string($school_name)."\n";
 
    $email_message .= "Name of Instructor: ".clean_string($school_instructor)."\n";
    
    $email_message .= "Department Dean: ".clean_string($school_dean_department)."\n";
    
    $email_message .= "Department Dean Office Phone Number: ".clean_string($school_dean_phone)."\n";
    
    $email_message .= "Why does your nominee deserve this award?: ".clean_string($why_nominate)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
<?php //include 'thankyou.html'; ?> 

<?php

   header( 'Location: /thankyou' ) ;

?>
 
<!-- Thank you for contacting us. We will be in touch with you very soon. -->
 
 
 
<?php
 
}
 
?>