<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>basic xhtml/css layout | php version</title>
<link rel="stylesheet" type="text/css" href="css/green.css" title="green" /> 
<link rel="alternate stylesheet" type="text/css" media="all" href="css/purple.css" title="purple" /> 
<link rel="alternate stylesheet" type="text/css" media="all" href="css/large.css" title="large" /> 
<link rel="alternate stylesheet" type="text/css" media="all" href="css/reverse.css" title="reverse" /> 
<!-- the @import method only works from 5.0 and upwards  -->
<!-- so, using @import would "hide" the more sophisticated sheet from < 5.0 browsers -->
<!-- <style type="text/css" media="all">@import "fancy_style.css";</style> -->
 <script language="JavaScript" type="text/javascript" src="js/styleswitcher.js"></script> 
</head>
 <body >
<div id="container">
<div id="banner">
<h1>this is the #banner &lt;div&gt;</h1>
</div>
<div id="sidebar">
<div id="navcontainer">
<ul id="navlist">
<li><a href="index.php" title="Back to the Home Page">About Me</a></li>
<li id="active"><a href="#" title="Projects, past &amp; present (this page)">Projects</a></li>
<li><a href="contact.php" title="Contact me">Contact</a></li>
<li><a href="links.php" title="Explore other sites">Links</a></li>
<li><a href="forum/index.php" title="leave a message on the forum">Forum</a></li>
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
switch ($_GET['id']) {
    case "1": $inc = 'projects/1.inc.php';
    break;
    case "2": $inc = 'projects/2.inc.php';
    break;
    case "3": $inc = 'projects/3.inc.php';
    break;
    case "4": $inc = 'projects/4.inc.php';
    break;
    default: $inc = 'projects/1.inc.php';
    break;
  }
include ($inc);
?>
</div>
<div id="footer">this is the #footer &lt;div&gt;<br />everything &copy;2003 freakindesign</div>
</div>
</body>
</html>
