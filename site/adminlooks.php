<?php require_once('Connections/webconn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 3;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_webconn, $webconn);
$query_Recordset1 = "SELECT * FROM student";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $webconn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="adminupdt1.php" onsubmit="return check(this)">
  <table width="800" border="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="800" border="0">
        <tr>
          <td width="100">&nbsp;</td>
          <td width="700"><table width="700" border="0">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><table width="700" border="1">
                <tr>
                  <td colspan="4" align="center">学员信息</td>
                </tr>
                <?php do { ?>
                <tr>
                  <td width="175" align="center">姓名</td>
                  <td width="175" align="center"><?php echo $row_Recordset1['name']; ?></td>
                  <td width="175" align="center">性别</td>
                  <td width="175" align="center"><?php echo $row_Recordset1['sex']; ?></td>
                </tr>
                <tr>
                  <td align="center">出生日期</td>
                  <td colspan="3" align="center"><?php echo $row_Recordset1['year']; ?>年<?php echo $row_Recordset1['month']; ?>月<?php echo $row_Recordset1['day']; ?>日</td>
                </tr>
                <tr>
                  <td align="center">曲风</td>
                  <td align="center"><?php echo $row_Recordset1['songtype']; ?></td>
                  <td align="center">得票数</td>
                  <td align="center"><?php echo $row_Recordset1['c_num']; ?></td>
                </tr>
                <tr>
                  <td align="center">状态</td>
                  <td align="center"><?php echo $row_Recordset1['state']; ?></td>
                  <td align="center">最高赛事</td>
                  <td align="center"><?php echo $row_Recordset1['topmatch']; ?></td>
                </tr>
                <tr> <td colspan="4">&nbsp;  </td>
                </tr>
                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
              </table>
              </td>
            </tr>
            <tr>
              <td align="right">
              <table border="0">
  <tr>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">第一页</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">前一页</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一个</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">最后一页</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
              </td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
