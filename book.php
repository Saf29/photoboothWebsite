<?php

if(!$_POST) exit;

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$address = "melnyk.primephotobooth@gmail.com";


$name = $_POST['name'] ? $_POST['name'] : "empty";
$email = $_POST['email'] ? $_POST['email'] : "empty";
$phone = $_POST['phone'] ? $_POST['phone'] : "empty";
$eventDate = $_POST['eventDate'] ? $_POST['eventDate']  : "empty";
$package = $_POST['package'] ? $_POST['package']  : "empty";
$requestedTimeFrom = $_POST['time'] ? $_POST['time']  : "empty";
$eventType = $_POST['eventType'] ? $_POST['eventType']  : "empty";
$location = $_POST['location'] ? $_POST['location']  : "empty";
$isReadyToBook = $_POST['readyToBook'] ? $_POST['readyToBook']  : "empty";
$referral = $_POST['hearAboutUs'] ? $_POST['hearAboutUs']  : "empty";
$message = $_POST['message'] ? $_POST['message']  : "empty";

// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."

// Example, $e_subject = '$name . ' has contacted you via Your Website.';

$e_subject = 'Website inquiry from  ' . $name . '.';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

$e_body = "Name: $name \r\n";
$e_body .= "Email: $email \r\n";
$e_body .= "Phone: $phone \r\n";
$e_body .= "Requested event date: $eventDate \r\n";
$e_body .= "Requested package: $package \r\n";
$e_body .= "Requested time: $requestedTimeFrom \r\n";
$e_body .= "Event type: $eventType \r\n";
$e_body .= "Location: $location \r\n";
$e_body .= "Ready to book?: $isReadyToBook \r\n";
$e_body .= "Where did you hear about us: $referral \r\n";
$e_body .= "Message: $message \r\n";


$msg = wordwrap( $e_body );

$headers = "From: form@melnykprimephotobooth.com" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($address, $e_subject, $msg, $headers)) {

	// Email has sent successfully, echo a success page.

	echo '<script type="text/javascript">'; 
	echo 'alert("Your request was sent. We will contact you shortly.");'; 
	echo 'window.location.href = "index.html";';
	echo '</script>';

} else {

	echo '<script type="text/javascript">'; 
	echo 'alert("Something went wrong. Please try to resubmit the form or call us.");'; 
	echo 'window.location.href = "index.html";';
	echo '</script>';

}

?>