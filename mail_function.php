
<?php	

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$result=" ";
	function sendmailuser($email,$sub,$msg) {		

	require 'vendor/autoload.php';		
		
		$mail = new PHPMailer();
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		$mail->IsSMTP();
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Port     = 587;
		$mail->Username = 'Enter email';
		$mail->Password = 'enter password';
		$mail->Host     = 'smtp.gmail.com';
		//$mail->Mailer   = 'OTP USER';
		
		
		
		$mail->SetFrom('tarun.shinja@gmail.com');
		$mail->AddAddress ($email);
		
		
		$mail->IsHTML(true);
		$mail->Subject = $sub;
		$mail->MsgHTML($msg);
				
		
		
		$result = $mail->Send();
		
		return $result;
	}


?>