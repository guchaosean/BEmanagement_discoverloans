<?php 

	if (!isset($_SESSION)) session_start(); 
	if(!$_POST) exit;
	
	// Enter your name or company name below
	$receiver_name = "Hello";
	
	// Enter email address below for receiving the form
	// All Contact messages will be sent there
	$receiver_email = "email@example.com";
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "New Contact Message";
	
	$sendername = strip_tags(trim($_POST["sendername"]));	
	$senderemail = strip_tags(trim($_POST["senderemail"]));
	$sendersubject = strip_tags(trim($_POST["sendersubject"]));
	$sendermessage = strip_tags(trim($_POST["sendermessage"]));
    $securitycode = strip_tags(trim($_POST["securitycode"]));
	$sendcopy = strip_tags(trim($_POST["sendcopy"]));
	if (isset($_POST['sendcopy'])){
	  $sendcopy = "YES";
	} else {
	  $sendcopy = "NO";
	}	
	
	
	/*
	========================================
	Start server side validation
	========================================
	*/ 
	$errors = array();
	 //validate name
	if(isset($_POST["sendername"])){
			if (!$sendername) {
				$errors[] = "You must enter a name.";
			} elseif(strlen($sendername) < 2)  {
				$errors[] = "Name must be at least 2 characters.";
			}
	}
	//validate email address
	if(isset($_POST["senderemail"])){
		if (!$senderemail) {
			$errors[] = "You must enter an email.";
		} else if (!validEmail($senderemail)) {
			$errors[] = "Your must enter a valid email.";
		}
	}
	
	//validate subject
	if(isset($_POST["sendersubject"])){
			if (!$sendersubject) {
				$errors[] = "You must enter a subject.";
			} elseif(strlen($sendersubject) < 4)  {
				$errors[] = "Subject must be at least 4 characters.";
			}
	}
	
	//validate message / comment
	if(isset($_POST["sendermessage"])){
		if (strlen($sendermessage) < 10) {
			if (!$sendermessage) {
				$errors[] = "You must enter a message.";
			} else {
				$errors[] = "Message must be at least 10 characters.";
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
		$mail->From = $senderemail;
		$mail->CharSet = "UTF-8";
		$mail->FromName = $sendername;
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
		// echo $autoresponder;
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
			if(isset($_POST["sendcopy"])){
				require "autoresponder.php";
				$automail = new PHPMailer();
				$automail->isSendmail();
				$automail->From = $receiver_email;
				$automail->FromName = $receiver_name;
				$automail->isHTML(true);                                 
				$automail->CharSet = "UTF-8";
				$automail->Encoding = "base64";
				$automail->Timeout = 200;
				$automail->ContentType = "text/html";
				$automail->AddAddress($senderemail, $sendername);
				$automail->Subject = "Thank you for contacting us";
				$automail->Body = $autoresponder;
				$automail->AltBody = "Use an HTML compatible email client";
				$automail->Send();	 
			}
			echo '<div class="alert notification alert-success"><p>Message sent successfully!</p></div> ';	
		} else {
			echo '<div class="alert notification alert-error">An error occurred while sending message, please try again!</div> ';
		}			
	}
		
	// ultimate email validation function
	function validEmail($senderemail) {
		$isValid = true;
		$atIndex = strrpos($senderemail, "@");
		if (is_bool($atIndex) && !$atIndex) {
			$isValid = false;
		} else {
			$domain = substr($senderemail, $atIndex + 1);
			$local = substr($senderemail, 0, $atIndex);
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