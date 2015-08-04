<?php

	$to = 'studentshow@dsvc.org';
	$subject = 'Show packet request from the National Student Show & Conference website.';
	$message = "From: " . $_POST['educator-name'] . "\n";
	$message .= "School: " . $_POST['school'] . "\n";
	$message .= "Address:\n";
	$message .= $_POST['address-1'] . "\n";
	if ($_POST['address-2']) {
  	$message .= $_POST['address-2'] . "\n";
	}
	if ($_POST['address-3']) {
  	$message .= $_POST['address-3'] . "\n";
	}
	$message .= $_POST['city'] . ", " . $_POST['state'] . ", " . $_POST['zip'] . "\n";
	$message .= "Email: " . $_POST['educator-email'] . "\n";

	$header = 'From: show_packet@nationalstudentshow.com';

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
