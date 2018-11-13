<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './helper/PHPMailer/Exception.php';
require './helper/PHPMailer/PHPMailer.php';
require './helper/PHPMailer/SMTP.php';/**
 * 
 */
class ZMail
{
	public function posljiMail($to, $from, $subject, $message, $attachment)
	{
		global $MAIL_HOST, $MAIL_PORT, $MAIL_USERNAME, $MAIL_PASSWORD;

		$mail= new PHPMailer(); 

		$mail->Host = $MAIL_HOST;
		$mail->Port = $MAIL_PORT;
		$mail->Username = $MAIL_USERNAME;
		$mail->Password = $MAIL_PASSWORD;
		$mail->SMTPAuth = true;
    	//$mail->SMTPDebug = 1;
    	$mail->IsSMTP();

		$mail->SetFrom($from);

		$mail->AddAddress($to);

		$mail->Subject = $subject;

		$mail->Body = $message;

		$mail->AddAttachment($attachment);  

		if(!$mail->Send()) {
			return false;
		} else {
			return true;
		}
	}
}


 ?>