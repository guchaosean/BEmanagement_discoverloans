<?php 

	if (!isset($_SESSION)) session_start(); 
	if(!$_POST) exit;
	
	// Enter your name or company name below
	$receiver_name = "Hello";
	
	// Enter email address below for receiving the form
	// All order messages will be sent there
	$receiver_email = "example@domain.com";
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "New Order";	
		
	$sendername = strip_tags(trim($_POST["sendername"]));	
	$senderemail = strip_tags(trim($_POST["senderemail"]));
	$sendertelephone = strip_tags(trim($_POST["sendertelephone"]));
	$senderwebsite = strip_tags(trim($_POST["senderwebsite"]));
	$orderservices = strip_tags(trim($_POST["orderservices"]));
	$orderbudget = strip_tags(trim($_POST["orderbudget"]));
	$ordertimeframe = strip_tags(trim($_POST["ordertimeframe"]));
	$sendermessage = strip_tags(trim($_POST["sendermessage"]));
    $securitycode = strip_tags(trim($_POST["securitycode"]));
	
	$order_file = uniqid();
	$order_upload = $order_file.$_FILES['orderfiles']['name'];	
	
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
			$errors[] = "Your must enter a valid email address.";
		}
	}
		
	//validate services
	if(isset($_POST["orderservices"])){
			if (!$orderservices) {
				$errors[] = "You must select a service.";
			}
	}
	
	//validate file uploads
	if(isset($_FILES['orderfiles'])) {
		// maximum file size :: 2MB
		$maxsize    =  2097152; 
		// File must be attached
		if (empty($_FILES['orderfiles']['name'])) {
			$errors[] = "You must browse or attach a file.";
		}
		// File size must be 2MB or less
		if ($_FILES['orderfiles']['size'] > $maxsize) {
			$errors[] = "File uploaded is too large. Try 2MB or less.";
		}
		// Detect allowed file extentions
		$valid_file_extensions = array(".jpg", ".jpeg", ".png");
		$file_extension = strrchr($_FILES["orderfiles"]["name"], ".");
		// Check that the uploaded file is actually an image
		if (!in_array($file_extension, $valid_file_extensions)) {
			$errors[] = "Please upload a jpg or png image file.";
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
	
	//In case there are errors, output them in a list
	if ($errors) {
		$errortext = "";
		foreach ($errors as $error) {
			$errortext .= '<li>'. $error . "</li>";
		}
		echo '<div class="alert notification alert-error">The following errors occured:<br><ul>'. $errortext .'</ul></div>';
	
	} else{		
		
		if ($_FILES['orderfiles']['error'] == 0) {
			move_uploaded_file($_FILES['orderfiles']['tmp_name'], '../smuploads/' .$order_upload);	
		
			require "PHPMailerAutoload.php";
			require "smartmessage.php";
				
			$mail = new PHPMailer();
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp1.example.com';                    // Specify main SMTP servers 
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'your-smtp-username';               // SMTP username
			$mail->Password = 'your-smtp-password';               // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'tls' also accepted	
			$mail->Port = 465;									  // SMTP Port number e.g. smtp.gmail.com uses port 465	
			
			$mail->IsHTML(true);
			$mail->From = $senderemail;
			$mail->CharSet = "UTF-8";
			$mail->FromName = $sendername;
			$mail->Encoding = "base64";
			$mail->Timeout = 200;
			$mail->ContentType = "text/html";
			$mail->addAddress($receiver_email, $receiver_name);
			$mail->Subject = $msg_subject;
			$mail->AddAttachment('../smuploads/'.$order_upload);	
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
			  
				// Start delete function 
				// Automatically deletes files from the smuploads folder after successful sending
				// You can remove this function if you want to keep uploads on your server
				$files = glob('../smuploads/*'); 
				foreach($files as $file){ 
				  if(is_file($file))
					unlink($file); 
				} 
				// end delete function		  
			  
			} else {
			  echo '<div class="alert notification alert-error">Sorry! an error occurred while sending!</div> ';
			}
		}
	} // end else

	// end error array if	
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