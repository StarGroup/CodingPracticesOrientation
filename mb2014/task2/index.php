<!DOCTYPE html>
<head>
<title>PHP Form Practice</title>
</head>
<body>

<?php

	/*
	ERROR CATCHING
	 */
	//ini_set('display_errors', 1);
	//error_reporting(E_ALL ^ E_NOTICE);	
	//echo 'WORK!!';
	if (array_key_exists('secret_field', $_POST)) {
		
		//SANITIZE USER INPUT
		//Always sanitize inputs ... Chinese will take over the world...
		$field_fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
		$field_lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
		$field_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);


		//Start building email
		$mail_to = 'mbrito@stargroup1.com';

		$subject = 'Success';



		//BODY OF EMAIL MESSAGE
		$body_message = 'From: ' . $field_fname . ' ' . $field_lname . "\n\n";
		$body_message .= 'Email: ' .$field_email . "\n\n"; //.= adds already defined variable (at the end)


		//Email Headers	
		$headers = 'From: '.$field_email."\r\n";
		$headers .= 'Reply-To: '.$field_email . "\r\n";

		//Mail message Yo
		//Boolean response -- Allows to do conditions with .. Bad english
		$mail_status = mail($mail_to, $subject, $body_message, $headers);

		
		//If mail status returns true -- display success message
		if ($mail_status) {
			echo "Your email has been sent! \n\n" . "<br/>";

		} //end of if statement

		else {
			echo "Email didn't send, yo... :(";
		} 

		//Display what the user inputed.
		echo "First name: " . $field_fname . "<br/>";
		echo "Last last: " . $field_lname . "<br/>";
		echo "Email: " . $field_email . "<br/>"; 
} 



	

?> <!-- END PHP --> 




<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

	First name: <input name="fname" type="text" id="fname" placeholder="First Name"> <br>

	Last name:&nbsp<input name="lname" type="text" id="lname" placeholder="Last Name" > <br>

	Email:<input name="email" type="email" id="email" placeholder="Email Address"> <br>

<!-- Submit button, yo -->
<input type="submit" value="Submit!">


<input type="hidden" value="yes" name="secret_field">

</form>
</body>
</html>
