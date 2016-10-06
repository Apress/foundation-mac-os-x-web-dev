<?php require_once('../../Connections/conn.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_links = 5;
$pageNum_links = 0;
if (isset($_GET['pageNum_links'])) {
  $pageNum_links = $_GET['pageNum_links'];
}
$startRow_links = $pageNum_links * $maxRows_links;

mysql_select_db($database_conn, $conn);
$query_links = "SELECT * FROM links ORDER BY id ASC";
$query_limit_links = sprintf("%s LIMIT %d, %d", $query_links, $startRow_links, $maxRows_links);
$links = mysql_query($query_limit_links, $conn) or die(mysql_error());
$row_links = mysql_fetch_assoc($links);

if (isset($_GET['totalRows_links'])) {
  $totalRows_links = $_GET['totalRows_links'];
} else {
  $all_links = mysql_query($query_links);
  $totalRows_links = mysql_num_rows($all_links);
}
$totalPages_links = ceil($totalRows_links/$maxRows_links)-1;

$queryString_links = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_links") == false && 
        stristr($param, "totalRows_links") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_links = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_links = sprintf("&totalRows_links=%d%s", $totalRows_links, $queryString_links);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>links admin | index</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

<div align="center">
<p><a href="insert.php">add a link</a></p>
<table border="1" cellpadding="2" cellspacing="2">
<tr>
<td>id</td>
<td>description</td>
<td>address</td>
<td>edit link </td>
<td>delete link</td>
</tr>
<?php do { ?>
<tr>
<td><?php echo $row_links['id']; ?></td>
<td><?php echo $row_links['description']; ?></td>
<td><a href="<?php echo $row_links['address']; ?>"><?php echo $row_links['address']; ?></a></td>
<td>
<div align="center"><a href="edit.php?id=<?php echo $row_links['id']; ?>">edit?</a></div>
</td>
<td>
<div align="center"><a href="delete.php?id=<?php echo $row_links['id']; ?>">delete?</a></div>
</td>
</tr>
<?php } while ($row_links = mysql_fetch_assoc($links)); ?>
</table>

<table border="0" width="50%" align="center">
<tr>
<td width="23%" align="center">
<?php if ($pageNum_links > 0) { // Show if not first page ?>
<a href="<?php printf("%s?pageNum_links=%d%s", $currentPage, 0, $queryString_links); ?>">First</a>
<?php } // Show if not first page ?>
</td>
<td width="31%" align="center">
<?php if ($pageNum_links > 0) { // Show if not first page ?>
<a href="<?php printf("%s?pageNum_links=%d%s", $currentPage, max(0, $pageNum_links - 1), $queryString_links); ?>">Previous</a>
<?php } // Show if not first page ?>
</td>
<td width="23%" align="center">
<?php if ($pageNum_links < $totalPages_links) { // Show if not last page ?>
<a href="<?php printf("%s?pageNum_links=%d%s", $currentPage, min($totalPages_links, $pageNum_links + 1), $queryString_links); ?>">Next</a>
<?php } // Show if not last page ?>
</td>
<td width="23%" align="center">
<?php if ($pageNum_links < $totalPages_links) { // Show if not last page ?>
<a href="<?php printf("%s?pageNum_links=%d%s", $currentPage, $totalPages_links, $queryString_links); ?>">Last</a>
<?php } // Show if not last page ?>
</td>
</tr>
</table>
</div>
</body>
</html>
<?php
mysql_free_result($links);
?>
