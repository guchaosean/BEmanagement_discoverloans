<?php 

    session_start(); 
	
	// Enter your name or company name below
	$receiver_name = "Hello";
	
	// Enter email address below for receiving the form
	// All order messages will be sent there
	$receiver_email = "example@address.com";
	
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
	
	if(!$mail->Send()) {
	  echo '<div class="alert notification alert-error">Oops! An error occurred!</div>'; 
	} 
	else {
	  echo '<div class="alert notification alert-success">Congs! Message sent successfully </div>';	  
	}		

?>