<?php

	//check if user coming from a request
	if ($_SERVER['REQUEST_METHOD']=='POST'){

		//This next bit loads the form field data into variables.If you add a form field, you will need to add it here.
		$name = filter_var($_REQUEST['name'],FILTER_SANITIZE_STRING);
		$mail = filter_var($_REQUEST['email'],FILTER_SANITIZE_EMAIL);
		$comment = filter_var($_REQUEST['message'],FILTER_SANITIZE_STRING);
		$msg = 
			"Name: " . $name . "\r\n" . 
			"Email: " . $email . "\r\n" . 
			"Comment: " . $comment ;

		// errors
		$formErrors = array();
		if (strlen($name)<=3) {
			$formErrors[] = '';
		}


	}

/*foreach($formErrors as $error){
				echo $error . '<br>';
			}*/

 ?>