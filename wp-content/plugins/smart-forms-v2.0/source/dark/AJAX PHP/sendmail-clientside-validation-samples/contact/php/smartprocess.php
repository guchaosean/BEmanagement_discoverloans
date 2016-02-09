<?php 

    session_start(); 
	
	// Enter your name or company name below
	$receiver_name = "Hello";
	
	// Enter email address below for receiving the form
	// All Contact messages will be sent there
	$receiver_email = "address@example.com";
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "New Contact Message";
	
	$sendername = strip_tags(trim($_POST["sendername"]));	
	$senderemail = strip_tags(trim($_POST["senderemail"]));
	$sendersubject = strip_tags(trim($_POST["sendersubject"]));
	$sendermessage = strip_tags(trim($_POST["sendermessage"]));
    $securitycode = strip_tags(trim($_POST["securitycode"]));
	
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
	
	if(!$mail->Send()) {
	  echo '<div class="alert notification alert-error">An error occurred! Message not sent</div>'; 
	} 
	else {
	  echo '<div class="alert notification alert-success">Congs! Message sent successfully </div>';
	}	

?>