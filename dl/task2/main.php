<!DOCTYPE html>
<head>
	<title>Form Test</title>
</head>

<body>

	<?php echo "<h1>hello</h1>"; ?>

	<?php 
		if(array_key_exists("set", $_POST)){
			$_fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
			$_lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
			$_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

			$mail_to = "david.leslie@temple.edu";
			$subject = "Hello";
			$body_message = 'from' .$_fname ." " .$_lname ."\n";
			$body_message .= 'Email' .$_email ."\n";

			//mail function
			$header = 'From: ' .$_email ."\n";
			$header .='Reply to: ' .$_email ."\n";

			//returns is_bool(var)
			$email_status = mail($mail_to, $subject, $body_message, $header);

			if($email_status){
				echo "success";
			}
			else{
				echo "failure";
			}

		}


	?>

	<form action='<?php echo $_SERVER['PHP_SELF']; ?>'  method="POST">
		<section>
		<p>
			<label for="fname">
			<span>First Name: </span>
			<input type="text" name="fname" id="fname">
			</label>
		</p>
		<p>
			<label for="lname">
			<span>Last Name: </span>
			<input type="text" name="lname" id="lname">
			</label>
		</p>
		<p>
			<label for="email">
			<span>Email:</span>
			<input type="email" name="email" id="email">
			</label>
		</p>
		</section>
		<section>
			<input type="hidden" name="set" value="true">
		<p>
			<button>SUBMIT</button>
		</p>
		</section>


	</form>
</body>