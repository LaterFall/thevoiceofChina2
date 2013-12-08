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
$query_Recordset1 = "SELECT * FROM event ORDER BY `time` ASC";
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
<?php
	include("Connections/webconn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script language="javascript">
function check(form1)
{
	if(form1.theme.value==0)
	{
		alert("请输入主题");
		return(false);
	}
	if(form1.bevent.value==0)
	{
		alert("请输入所属比赛阶段");
		return(false);
	}
  	if(form1.year.value==0)
	{
	 	alert("请输入场次年份!");
	 	return(false);
	}
  	if(form1.month.value==0)
	{
	 	alert("请输入场次月份!");
	 	return(false);
	}
  	if(form1.day.value==0)
	{
	 	alert("请输入场次天数!");
	 	return(false);
	}
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="adminevel1.php" onsubmit="return check(this)">
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
              <td align="center"><table width="700" border="0">
                <tr>
                  <td colspan="4" align="center">场次管理</td>
                </tr>
                <tr>
                  <td align="center">主题：</td>
                  <td align="center">
                  <input type="text" name="theme" />
                  </td>
                  <td align="center">所属比赛阶段：</td>
                  <td align="center">
                    <select name="bevent">
                    <option selected value=0> 请选择阶段 </option>
                    <option value="淘汰赛">淘汰赛</option>
                    <option value="半决赛">半决赛</option>
                    <option value="决赛">决赛</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align="center">时间：</td>
                  <td align="center">
			<select name="year">
            <option selected value=0> 年 </option>
            <?php
				for($i=2011;$i<2021;$i++)
				{
					echo '<option value='.$i.'>'.$i.'</option>';
				}
			?>
            </select>
            <select name="month">
            <option selected value=0> 月 </option>
            <?php
				for($i=1;$i<13;$i++)
				{
					echo '<option value='.$i.'>'.$i.'</option>';
				}
			?>
            </select>
            <select name="day">
            <option selected value=0> 日 </option>
            <?php
				for($i=1;$i<32;$i++)
				{
					echo '<option value='.$i.'>'.$i.'</option>';
				}
			?>
            </select>
                  </td>
                  <td align="center">&nbsp;</td>
                  <td align="center">
                  <input type="submit" value="提交">
                  </td>
                </tr>
              </table>
              </td>
            </tr>
            <tr>
              <td align="right"><table width="700" border="0">
                <tr>
                  <td colspan="2" align="center">&nbsp;
                  
                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                  场次信息
                  </td>
                </tr>
                <?php do { ?>
                <tr>
                  <td width="432" align="center">主题：</td>
                  <td width="258"><?php echo $row_Recordset1['theme']; ?></td>
                </tr>
                <tr>
                  <td align="center">时间：</td>
                  <td><?php echo $row_Recordset1['time']; ?></td>
                </tr>
                <tr>
                  <td align="center">所属比赛阶段：</td>
                  <td><?php echo $row_Recordset1['bevent']; ?></td>
                </tr>
                <tr>
                <td colspan="2"> &nbsp;</td>
                </tr>
                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                    <tr>
                    <td colspan="2" align="right">
                    <table border="0">
      <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">第一页</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">前一页</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一页</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">最后一页</a>
          <?php } // Show if not last page ?></td>
          </table> </td>
    </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <table border="0">

  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
