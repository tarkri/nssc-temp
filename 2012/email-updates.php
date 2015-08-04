<?php

	$to = 'studentshow@dsvc.org';
	$subject = 'Request for email updates from the National Student Show & Conference website.';
	$message = "From: " . $_POST['student-name'] . "\n";
	$message .= "School: " . $_POST['student-school'] . "\n";
	$message .= "Email: " . $_POST['student-email'] . "\n";

	$header = 'From: email_updates@nationalstudentshow.com';

	if (mail($to, $subject, $message, $header)) {
	  echo '<h2>Sent!</h2>';
	  echo '<p>Your information has been sent successfully. Thanks for your interest in the National Student Show & Conference.</p>';
	  echo '<p><a href="#" class="close-modal btn"><span><span>Close</span></span></a></p>';
	} else {
	  echo '<h2>Error</h2>';
	  echo '<p>There was a problem please try again.</p>';
	  echo '<p><a href="#" class="close-modal btn"><span><span>Close</span></span></a></p>';
	}
?>
