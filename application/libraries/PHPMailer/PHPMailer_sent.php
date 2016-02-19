<?php
date_default_timezone_set('Etc/UTC');

class PHPMailer_sent{
	public function PHPmailer_send_confirmation_link($email, $name, $token){
		require 'PHPMailerAutoload.php';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Custom connection options

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "achillewanguedaniel@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "mami00237";
		//Set who the message is to be sent from
		$mail->setFrom('no-reply@postanews.com', 'PostaNews');
		//Set an alternative reply-to address
		//$mail->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress($email, $name);
		//Set the subject line
		$mail->Subject = 'Please Confirm Your PostaNews Registration';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		//Replace the plain text body with one created manually

		$mail->isHTML(true);

		$mail->Body = "<h2>HELLO $name,</h2> Thank you for signin up for MYNEWS. We are happy to have you!</br> <p style='font-size:14px'>Click on this <a href='http://localhost/postanews/savepass/$token' target='_blank'>link</a> to verify your account and get started.</p></hr><br><address > <strong>PostaNews</strong><br>  Yaounde, Cameroon. <br>    <abbr title='Phone'>P:</abbr> (+237) 6 80 10 25 64   <br>  <abbr title='Email'>E:</abbr> achillewanguedaniel0@yahoo.com     </address>";

	

	//send the message, check for errors
	if (!$mail->send()) {
    		return $a= "Mailer Error: " . $mail->ErrorInfo;
	} else {
  	   	return $a ="Message sent!";
	}

  }


 }