<?php
/*
This first bit sets the email address that you want the form to be submitted to.
You will need to change this value to a valid email address that you can access.
*/
$webmaster_email = "osamaahmed.sus@gmail.com";
	

		//This next bit loads the form field data into variables.If you add a form field, you will need to add it here.
		$name = filter_var($_REQUEST['name'],FILTER_SANITIZE_STRING);
		$mail = filter_var($_REQUEST['email'],FILTER_SANITIZE_EMAIL);
		$comment = filter_var($_REQUEST['message'],FILTER_SANITIZE_STRING);
		$msg = 
			"Name: " . $name . "\r\n" . 
			"Email: " . $mail . "\r\n" . 
			"Comment: " . $comment ;

		
	/*
The following function checks for email injection.
Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
*/
function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0D+)',
	'(%0A+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}
	$headers = 'From: '. $mail . 'r\n';
	mail($webmaster_email, 'Feedback', $msg,$headers);


 ?>