<?php

	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	/*
	 * Server Configuration
	 */
    //$config = parse_ini_file('includes/dbconfig.ini', true);
	$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
	$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
	$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
	$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.

	$mail->Username = 'notavaiblee@gmail.com'; // Your Gmail address.
	$mail->Password = 'genesis300'; // Your Gmail login password or App Specific Password.

	//$mail->Username = $config['user']; // Your Gmail address.
	//$mail->Password = $config['pass']; // Your Gmail login password or App Specific Password.

	/*
	 * Message Configuration
	 */



	$to = "heyjosabet@gmail.com";
	//$cc = "";

	$message = 'test';
	$subject = 'test - sub';

	//$mail->AddReplyTo($reply_to, $fname);
	$mail->setFrom($mail->Username, 'Name - Website Form'); // Set the sender of the message.
	$mail->addAddress($to, 'Name - Website Form'); // Set the recipient of the message.
	//$mail->AddCC($cc, 'Name - Website Form');	//CC email
	$mail->Subject = $subject; // The subject of the message.

	/*
	 * Message Content - Choose simple text or HTML email
	 */
	 
	// Choose to send either a simple text email...
	$mail->Body = $message; // Set a plain text body.

	// ... or send an email with HTML.
	//$mail->msgHTML(file_get_contents('contents.html'));
	// Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
	//$mail->AltBody = 'This is a plain-text message body'; 

	// Optional: attach a file
	//$mail->addAttachment('images/phpmailer_mini.png');

	if ($mail->send()) {
	    echo "Your message was sent successfully!";
	    // $_SESSION['msg_sent'] = "set";
	    // header("Location: index");
	} else {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	    // header("Location: index");
	}


?>