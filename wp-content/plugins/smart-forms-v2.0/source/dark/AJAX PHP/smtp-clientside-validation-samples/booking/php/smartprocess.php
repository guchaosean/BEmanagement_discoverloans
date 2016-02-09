<?php 

    session_start(); 
	
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
	
	if(!$mail->Send()) {
	  echo '<div class="alert notification alert-error">An error occurred! Message not sent</div>'; 
	} 
	else {
	  echo '<div class="alert notification alert-success">Congs! Message sent successfully </div>';
	}	

?>