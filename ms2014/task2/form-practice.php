
<!--
	// form-practice.php
	/* Contact Us form
		Firstname
		Lastname
		e-mail
		Form action should post back to itself, php needs to sterilize/sanitize data and generate an email.
	*/
-->

<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="styles.css"/>
		<title> Form Practice </title>
	</head>
	<body>
		<?php
			// SANITIZZE INPUTS - SUPER SERIOUS
			if(array_key_exists('flag', $_POST)){
				$firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING); 
				$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING); 
				$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
				
				$mailTo = "mschiff@stargroup1.com";
				$subject = "Form Email Subject";
				$body = "From " . $firstName . " " . $lastName;
				$body .= "\n\nEmail: " . $email . "\n\n";
				
				$headers = 'From: ' . $email . "\r\n";
				$headers .= "Reply-To: " . $email . " \r\n";
				
				//Email message
				$mailStatus = mail($mailTo, $subject, $body, $headers);
				echo "Mail status: ";
				if($mailStatus) echo "SUCCESS";
				else echo "FAIL";
			}			
		?>
				<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST">			
					<fieldset>
					<legend> Form Practice </legend>
					<label for="firstName">First Name </label><input type="text" id="firstName" name="firstName"/><br/>
					<label for="lastName">Last Name </label><input type="text" id="lastName" name="lastName"/><br/>
					<label for="email">e-mail </label> <input type="email" required="true" id="email" name="email" placeholder="Enter a valid e-mail address"/><br/>
					<input type="hidden" name="flag" id="flag" value="true"/>
					<button type="submit"> Submit </button>
					</fieldset>
				</form>

	</body>
</html>