<?php
	header('location: index.php');
	$status = array(

	);

    $firstname = @trim(stripslashes($_POST['firstname']));
		$lastname = @trim(stripslashes($_POST['lastname']));
    $email = @trim(stripslashes($_POST['email']));
    $subject = @trim(stripslashes($_POST['subject']));
    $message = @trim(stripslashes($_POST['message']));

    $email_from = $email;
    $email_to = 'clevenger7@live.marshall.edu';//replace with your email

    $body = 'First Name: ' . $firstname . "\n\n" .'Last Name: ' . $lastname . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;
