<?
$timeused = date ("Y-m-d H:i:s" ,time ()); 
$mailFrom = "From: TRON <admin@funkydomain.com>";
$mailTo = "webmaster@funkydomain.com";
$mailSubject = "404 report from funkydomain.com";
$mailMessage = "IP: " . $_SERVER["REMOTE_ADDR"] . "\n\n
Referrer: " . $_SERVER["HTTP_REFERER"] . "\n\n
Date: $timeused\n\n
Browser: " . $_SERVER["HTTP_USER_AGENT"] . "\n\n
\n\n
THAT IS ALL\n";
mail($mailTo, $mailSubject, $mailMessage, $mailFrom);
?>
<html>
<head>
<title>404: doh!</title>
</head>
<body>
<h1>404 error</h1>
<p>The file doesn’t exist, or has been moved</p>
<p>a report has been sent to the webmaster, thanks</p>
</body>
</html>
