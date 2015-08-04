<?php

	$to = 'blake.elshire@gmail.com';
	$subject = 'Contact from the National Student Show & Conference website.';
	$message = "From: " . $_POST['name'] . "\n";
	$message .= "Company: " . $_POST['company'] . "\n";
	$message .= "Phone: " . $_POST['phone'] . "\n";
	$message .= "Email: " . $_POST['email'] . "\n";

	$header = 'From: contact_chairman@nationalstudentshow.com';

	if (mail($to, $subject, $message, $header)) {
	  echo '<h2>Sent!</h2>';
	  echo '<p>Your information has been sent successfully. Thanks for your interest in the National Student Show & Conference.</p>';
	  echo '<p><a href="#" class="close-modal button"><span><span>Close</span></span></a></p>';
	} else {
	  echo '<h2>Error</h2>';
	  echo '<p>There was a problem please try again.</p>';
	  echo '<p><a href="#" class="close-modal button"><span><span>Close</span></span></a></p>';
	}
?>
