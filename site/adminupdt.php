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
	if(form1.name.value==0)
	{
		alert("请选择导师姓名");
		return(false);
	}
}
</script>
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
              <td align="center">选择要更改的导师姓名：
              <select name="name">
            <option selected value=0> 导师姓名 </option>
            <?php
	$sql = mysql_query("select * from teacher",$webconn);
	$info = mysql_fetch_array($sql);
	while($info)
	{
		echo '<option value='.$info[name].'>'.$info[name].'</option>';
		$info = mysql_fetch_assoc($sql);
	}
			?>
            </select>
              </td>
            </tr>
            <tr>
              <td align="right"> <input type="submit" value="提交" /> </td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>