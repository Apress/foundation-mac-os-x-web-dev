<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Chapter 5 | Dynamic Web Sites | Query Strings</title>
<link rel="stylesheet" type="text/css" href="css/green.css" title="green" /> 
<link rel="alternate stylesheet" type="text/css" media="all" href="css/purple.css" title="purple" /> 
<link rel="alternate stylesheet" type="text/css" media="all" href="css/large.css" title="large" /> 
<link rel="alternate stylesheet" type="text/css" media="all" href="css/reverse.css" title="reverse" /> 
<!-- the @import method only works from 5.0 and upwards  -->
<!-- so, using @import would "hide" the more sophisticated sheet from < 5.0 browsers -->
<!-- <style type="text/css" media="all">@import "fancy_style.css";</style> -->
<script language="JavaScript" type="text/javascript" src="js/styleswitcher.js"></script> 
</head>
<body onload="window.defaultStatus='friends of ED | Mac OS X Web Development Fundamentals: Chapter 5'">
<div id="container">
<div id="banner"><h1>this is the #banner &lt;div&gt;</h1></div>
<div id="sidebar">
<div id="navcontainer">
<ul id="navlist">
<li><a href="index.php" title="Back to the Home Page">About Me</a></li>
<li><a href="projects.php" title="Projects, past & present">Projects</a></li>
<li id="active"><a href="#" title="Contact me (this Page)">Contact</a></li>
<li><a href="links.php" title="Explore other sites">Links</a></li>
<li><a href="forum/index.php" title="Leave a message on the forum">Forum</a></li>
</ul>
</div>
<div id="styletool">
<a href="#" title="Switch Styles: green" onclick="setActiveStyleSheet('green'); return false;" accesskey="g"><img src="images/selector_green.gif" alt="Switch Styles: green" /></a> 
<a href="#" title="Switch Styles: purple" onclick="setActiveStyleSheet('purple'); return false;" accesskey="p"><img src="images/selector_purple.gif" alt="Switch Styles: purple" /></a> 
<a href="#" title="Switch Styles: large type" onclick="setActiveStyleSheet('large'); return false;" accesskey="l"><img src="images/selector_large.gif" alt="Switch Styles: large type" /></a> 
<a href="#" title="Switch Styles: reverse colors, large type" onclick="setActiveStyleSheet('reverse'); return false;" accesskey="r"><img src="images/selector_large_reverse.gif" alt="Switch Styles: reverse colors, large type" /></a> 
</div>
<div id="valid">
<a href="http://validator.w3.org/check/referer" title="Validated XHTML 1.0"><img src="images/xhtml10.png" alt="XHTML 1.0 valid" width="80" height="15" border="0" /></a><br />
<a href="http://jigsaw.w3.org/css-validator/check/referer" title="Validated CSS"><img src="images/css.gif" alt="CSS valid" width="80" height="15" border="0" /></a><br />
<a href="http://www.contentquality.com/mynewtester/cynthia.exe?Url1=http://www.freakindesign.com/booktest" title="Validated Section 508"><img src="images/sec508a.gif" alt="508 valid" width="80" height="15" border="0" /></a>
</div>
</div>
<div id="content">
<?
if (empty($_GET["id"])) { 
?>
<form name="comments" id="comments" method="post" action="contact.php?id=sent">
<table width="475" border="0" cellspacing="2" cellpadding="2" summary="This is a comments form for people to say what they think of the site.">
<caption>
What did you think of the site?
</caption>
<tr>
<td width="120" valign="top">
<div align="right">name: </div>
</td>
<td width="341">
<input name="name" type="text" id="name" accesskey="n" tabindex="1" size="40" maxlength="50" />
</td>
</tr>
<tr>
<td valign="top">
<div align="right">email address: </div>
</td>
<td>
<input name="email" type="text" id="email" accesskey="e" tabindex="2" size="40" maxlength="50" />
</td>
</tr>
<tr>
<td valign="top">
<div align="right">web site: </div>
</td>
<td>
<input name="website" type="text" id="website" accesskey="w" tabindex="3" value="http://" size="40" maxlength="50" />
</td>
</tr>
<tr>
<td valign="top">
<div align="right">are you a geek?: </div>
</td>
<td>
<input name="geek" type="text" id="geek" accesskey="g" tabindex="4" size="40" maxlength="50" />
</td>
</tr>
<tr>
<td valign="top">
<div align="right">comments:</div>
</td>
<td>
<textarea name="comments" cols="40" rows="5" id="comments" accesskey="c" tabindex="5"></textarea>
</td>
</tr>
<tr>
<td valign="top">
<div align="right"></div>
</td>
<td>
<input type="submit" name="Submit" value="Submit" accesskey="s" tabindex="6" /> 
<input type="reset" name="Reset" value="Reset" accesskey="r" tabindex="7" />
</td>
</tr>
</table>
</form>
<? } 
elseif ($_GET["id"] == "sent") {
$mailFrom = "From: " . $HTTP_POST_VARS['name'] . " <" . $HTTP_POST_VARS['email'] . ">";
$mailTo = "Funky Domain <admin@funkydomain.org>";
$mailSubject = "form submission from funkydomain.org";
$mailMessage = "Information submitted from the website, as follows: \n
Name: " . $HTTP_POST_VARS['name'] . "\n
Email: " . $HTTP_POST_VARS['email'] . "\n
Website: " . $HTTP_POST_VARS['website'] . "\n
Geek?: " . $HTTP_POST_VARS['geek'] . "\n
Comments: " . $HTTP_POST_VARS['comments'] . "\n
--EOT\n";
mail($mailTo, $mailSubject, $mailMessage, $mailFrom); ?>
<p>Thank you for your comments.  Somebody from Funky Domain will be in touch within 2-3 working days, if you required a reply. </p>
<? } 
elseif ((!empty($_GET["id"])) && ($_GET["id"] != "sent")) {
?>
<p>there appears to have been an error with your form submission. <br />
please <a href="contact.php">go back</a> and check your details</p>
<? } ?>
</div>
<div id="footer">this is the #footer &lt;div&gt;<br />everything &copy;2003 freakindesign</div>
</div>
</body>
</html>
