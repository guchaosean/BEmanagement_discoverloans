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
	$msg_subject = "New Quotation";	
	
	$sendername = strip_tags(trim($_POST["sendername"]));	
	$senderemail = strip_tags(trim($_POST["senderemail"]));
	$sendertelephone = strip_tags(trim($_POST["sendertelephone"]));
	$senderwebsite = strip_tags(trim($_POST["senderwebsite"]));
	$services = strip_tags(trim($_POST["services"]));
	$budget = strip_tags(trim($_POST["budget"]));
	$timeframe = strip_tags(trim($_POST["timeframe"]));
	$details = strip_tags(trim($_POST["details"]));
    $securitycode = strip_tags(trim($_POST["securitycode"]));
	
	/* CSV FILE SETTINGS
	---------------------------------------------------
	 * Create a csv file named smartcsv.csv
	 * Put the fields you want in the csv in an array
	-------------------------------------------------- */
	$csvFile = "smartcsv.csv";	
	$csvData = array(
		$_POST['sendername'],
		$_POST['senderemail'],
		$_POST['sendertelephone'],
		$_POST['senderwebsite'],
		$_POST['services'],
		$_POST['budget'],
		$_POST['timeframe']		
	);		
	
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
		
	
	//validate checkin date
	if(isset($_POST["services"])){
			if (!$services) {
				$errors[] = "Please choose a service.";
			}
	}
	
	//validate checkout date
	if(isset($_POST["budget"])){
			if (!$budget) {
				$errors[] = "Pleease set your project budget";
			}
	}		
	
	//validate message / comment
	if(isset($_POST["details"])){
		if (strlen($details) < 10) {
			if (!$details) {
				$errors[] = "You must enter project details or specifics.";
			} else {
				$errors[] = "Project details must at least be 10 characters.";
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
						"Names",
						"Email",
						"Telephone",
						"Website URL",
						"Services",
						"Time Frame",
						"Budget"
					);
					fputcsv($csvFileData,$headerRowFields);
					fputcsv($csvFileData, $csvData );
				}
				fclose($csvFileData);
			  
			} 
			else {
				echo '<div class="alert notification alert-error">Sorry! an error occurred while sending!</div>'; 	  
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