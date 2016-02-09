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
	$msg_subject = "New Review";	
	
	$firstname = strip_tags(trim($_POST["firstname"]));	
	$lastname = strip_tags(trim($_POST["lastname"]));
	$email = strip_tags(trim($_POST["email"]));
	$company = strip_tags(trim($_POST["company"]));
	$mobile = strip_tags(trim($_POST["mobile"]));
	$department = strip_tags(trim($_POST["department"]));
	$products = strip_tags(trim($_POST["products"]));
	$support = strip_tags(trim($_POST["support"]));
	$response = strip_tags(trim($_POST["response"]));
	$comment = strip_tags(trim($_POST["comment"]));
	$improve = $_POST["improve"];
	if ($improve[0]!=""){
		$improve_list = implode( '<br/>', $improve);
	}
	
	/* CSV FILE SETTINGS
	---------------------------------------------------
	 * Create a csv file named smartcsv.csv
	 * Put the fields you want in the csv in an array
	-------------------------------------------------- */
	$csvFile = "smartcsv.csv";	
	$csvData = array(
		$_POST['firstname'],
		$_POST['lastname'],
		$_POST['email'],
		$_POST['company'],
		$_POST['mobile'],
		$_POST['department'],
		$_POST['products'],
		$_POST['support'],
		$_POST['response']		
	);
	
	/*
	========================================
	Start server side validation
	========================================
	*/ 
	$errors = array();
	 //validate firstname
	if(isset($_POST["firstname"])){
			if (!$firstname) {
				$errors[] = "You must enter your  firstname.";
			} elseif(strlen($firstname) < 2)  {
				$errors[] = "Firstname must be at least 2 characters.";
			}
	}
	//validate email address
	if(isset($_POST["email"])){
		if (!$email) {
			$errors[] = "You must enter an email.";
		} else if (!validEmail($email)) {
			$errors[] = "Your must enter a valid email.";
		}
	}
	
	//validate mobile phone number
	if(isset($_POST["mobile"])){
			if (!$mobile) {
				$errors[] = "You must enter your mobile phone number.";
			} elseif(!preg_match('/^[0-9]+$/', $mobile))  {
				$errors[] = "Phone number must include numbers only";
			} elseif(strlen($mobile) < 10)  {
				$errors[] = "Phone number must not be less than 10 numbers";
			} elseif(strlen($mobile) > 12)  {
				$errors[] = "Phone number must not exceed 12 numbers";
			}
	}	
		
	//validate department
	if(isset($_POST["department"])){
			if (!$department) {
				$errors[] = "Please select a department.";
			}
	}
	
	//validate check boxes
	if($improve[0]==''){	
		$errors[] = "Please check at least one option.";
	}	
	
	//validate message / comment
	if(isset($_POST["comment"])){
		if (strlen($comment) < 10) {
			if (!$comment) {
				$errors[] = "Oops you forgot to comment.";
			} else {
				$errors[] = "Comment must be at least 10 characters.";
			}
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
			$mail->From = $email;
			$mail->CharSet = "UTF-8";
			$mail->FromName = $firstname;
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
			 echo $message;
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
			
			if(!$mail->Send()) {
			  	echo '<div class="alert notification alert-error">Oops! An error occurred!</div>'; 
			} 
			else {
			  	echo '<div class="alert notification alert-success">Congs! Message sent successfully </div>';
				
				/* GENERATE / CREATE THE CSV FILE
				------------------------------------------------------
				 * Give the csv top row headings names in an array 
				------------------------------------------------------*/		
				if (file_exists($csvFile)) {
					$csvFileData = fopen($csvFile, 'a');
					fputcsv($csvFileData, $csvData );
				} else {
					$csvFileData = fopen($csvFile, 'a'); 
					$headerRowFields = array(
						"First Name",
						"Last Name",
						"Email",
						"Company",
						"Telephone",
						"Department",
						"Product Rating",
						"Support Rating",
						"Response Rating"
					);
					fputcsv($csvFileData,$headerRowFields);
					fputcsv($csvFileData, $csvData );
				}
				fclose($csvFileData);
									  
			}
	}
	
	// ultimate email validation function
	function validEmail($email) {
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex) {
			$isValid = false;
		} else {
			$domain = substr($email, $atIndex + 1);
			$local = substr($email, 0, $atIndex);
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