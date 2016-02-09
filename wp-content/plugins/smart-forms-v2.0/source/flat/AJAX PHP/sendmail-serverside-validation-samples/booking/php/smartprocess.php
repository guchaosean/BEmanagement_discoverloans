<?php 

	if (!isset($_SESSION)) session_start(); 
	if(!$_POST) exit;
	
	// Enter your name or company name below
	$receiver_name = "Hello";
	
	// Enter email address below for receiving the form
	// All Contact messages will be sent there
	$receiver_email = "address@example.com";
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "New Booking";
	
	$guestname = strip_tags(trim($_POST["guestname"]));	
	$guestemail = strip_tags(trim($_POST["guestemail"]));
	$guestelephone = strip_tags(trim($_POST["guestelephone"]));
	$adults = strip_tags(trim($_POST["adults"]));
    $children = strip_tags(trim($_POST["children"]));
	$checkin = strip_tags(trim($_POST["checkin"]));
	$checkout = strip_tags(trim($_POST["checkout"]));
	$comment = strip_tags(trim($_POST["comment"]));
	$securitycode = strip_tags(trim($_POST["securitycode"]));
	
	/*
	========================================
	Start server side validation
	========================================
	*/ 
	$errors = array();
	 //validate name
	if(isset($_POST["guestname"])){
	 
			if (!$guestname) {
				$errors[] = "You must enter a name.";
			} elseif(strlen($guestname) < 2)  {
				$errors[] = "Name must be at least 2 characters.";
			}
	 
	}
	//validate email address
	if(isset($_POST["guestemail"])){
		if (!$guestemail) {
			$errors[] = "You must enter an email.";
		} else if (!validEmail($guestemail)) {
			$errors[] = "Your must enter a valid email.";
		}
	}
		
	//validate adults
	if(isset($_POST["adults"])){
			if (!$adults) {
				$errors[] = "You must enter the number of adults.";
			} elseif(!preg_match('/^[0-9]{0,15}$/', $adults))  {
				$errors[] = "Please enter numeric values only for adults";
			}
	}
	
	//validate children
	if(isset($_POST["children"])){
			if (!$children) {
				$errors[] = "You must enter the number of children.";
			} elseif(!preg_match('/^[0-9]{0,15}$/', $children))  {
				$errors[] = "Please enter numeric values only for children";
			}
	}
	
	//validate checkin date
	if(isset($_POST["checkin"])){
			if (!$checkin) {
				$errors[] = "You must enter a checkin date.";
			}
	}
	
	//validate checkout date
	if(isset($_POST["checkout"])){
			if (!$checkout) {
				$errors[] = "You must enter a checkout date.";
			}
	}		
	
	//validate message / comment
	if(isset($_POST["comment"])){
		if (strlen($comment) < 10) {
			if (!$comment) {
				$errors[] = "You must enter a comment or message.";
			} else {
				$errors[] = "Comment must be at least 10 characters.";
			}
		}
	}
	
	//validate security captcha
	if(isset($_POST["securitycode"])){
		if (!$securitycode) {
			$errors[] = "You must enter the security code";
		} else if (md5($securitycode) != $_SESSION['smartCheck']['securitycode']) {
			$errors[] = "The security code you entered is incorrect.";
		}
	}
	
	if ($errors) {
		//Output errors in a list
		$errortext = "";
		foreach ($errors as $error) {
			$errortext .= '<li>'. $error . "</li>";
		}
	
		echo '<div class="alert notification alert-error">The following errors occured:<br><ul>'. $errortext .'</ul></div>';
	
	} else{	
	
		require "PHPMailerAutoload.php";
		require "smartmessage.php";
			
		$mail = new PHPMailer();
		$mail->isSendmail();
		$mail->IsHTML(true);
		$mail->From = $guestemail;
		$mail->CharSet = "UTF-8";
		$mail->FromName = $guestname;
		$mail->Encoding = "base64";
		$mail->Timeout = 200;
		$mail->ContentType = "text/html";
		$mail->addAddress($receiver_email, $receiver_name);
		$mail->Subject = $msg_subject;	
		$mail->Body = $message;
		$mail->AltBody = "Use an HTML compatible email client";
				
		// For multiple email recepients from the form 
		// Simply change recepients from false to true
		// Then enter the recipients email addresses
		// echo $message;	
		$recipients = false;
		if($recipients == true){
			$recipients = array(
				"address@example.com" => "Recipient Name",
				"address@example.com" => "Recipient Name",
			);
			
			foreach($recipients as $email => $name){
				$mail->AddBCC($email, $name);
			}	
		}
		
		if($mail->Send()) {
		  echo '<div class="alert notification alert-success">Congs! message sent successfully! </div> '; 
		} else {
		  echo '<div class="alert notification alert-error">Sorry! an error occurred while sending!</div> ';
		}
	}

	// end error array if	
	// ultimate email validation function
	function validEmail($guestemail) {
		$isValid = true;
		$atIndex = strrpos($guestemail, "@");
		if (is_bool($atIndex) && !$atIndex) {
			$isValid = false;
		} else {
			$domain = substr($guestemail, $atIndex + 1);
			$local = substr($guestemail, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64) {
				// local part length exceeded
				$isValid = false;
			} else if ($domainLen < 1 || $domainLen > 255) {
				// domain part length exceeded
				$isValid = false;
			} else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
				// local part starts or ends with '.'
				$isValid = false;
			} else if (preg_match('/\\.\\./', $local)) {
				// local part has two consecutive dots
				$isValid = false;
			} else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
				// character not valid in domain part
				$isValid = false;
			} else if (preg_match('/\\.\\./', $domain)) {
				// domain part has two consecutive dots
				$isValid = false;
			} else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
				// character not valid in local part unless
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
					$isValid = false;
				}
			}
			if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
				// domain not found in DNS
				$isValid = false;
			}
		}
		return $isValid;
	}		

?>