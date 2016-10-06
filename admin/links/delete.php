<?php require_once('../../Connections/conn.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

if ((isset($_POST['deleteID'])) && ($_POST['deleteID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM links WHERE id=%s",
                       GetSQLValueString($_POST['deleteID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($deleteSQL, $conn) or die(mysql_error());

  $deleteGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_links = "1";
if (isset($_GET['id'])) {
  $colname_links = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conn, $conn);
$query_links = sprintf("SELECT * FROM links WHERE id = %s", $colname_links);
$links = mysql_query($query_links, $conn) or die(mysql_error());
$row_links = mysql_fetch_assoc($links);
$totalRows_links = mysql_num_rows($links);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>links admin | delete</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<form name="form1" id="form1" method="post" action="">
<div align="center">
<table width="500" border="1" cellspacing="2" cellpadding="2">
<caption>
are you sure you want to delete this link?
</caption>
<tr>
<td><?php echo $row_links['description']; ?></td>
<td><?php echo $row_links['address']; ?></td>
</tr>
</table>
<input name="deleteID" type="hidden" id="deleteID" value="<?php echo $row_links['id']; ?>" />
<label>
<input type="submit" name="Submit" value="Submit" />
</label>
</div>
</form>
</body>
</html>
<?php
mysql_free_result($links);
?>
