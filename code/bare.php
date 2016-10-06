<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Chapter 5 | Dynamic Web Sites | Query Strings</title>
	<meta name="generator" content="BBEdit 7.0" />
</head>
<body>
<?
if (empty($_GET["id"])) { 
?>
<p><a href="?id=sent">empty</a></p>
<?php
} elseif ($_GET["id"] == "sent") {
?>
<p><a href="?id=nonsense">sent</a></p> 
<?php } 
elseif ((!empty($_GET["id"])) && ($_GET["id"] != "sent")) {
?>
<p>error</p>
<? } ?>
</body>
</html>
