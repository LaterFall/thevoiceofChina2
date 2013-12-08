<?php require_once('Connections/webconn.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script language="javascript">
function check(form1)
{
	if(form1.delname.value==0&&form1.insname.value=="")
	{
		alert("请选择要删除的学员姓名，或输入要插入的学员姓名！");
		return(false);
	}
}
</script>
</head>
<body>
<?php
	$var = $_POST[name];
	$sql = mysql_query("select * from teacher where name='".$var."'",$webconn);
	$info = mysql_fetch_array($sql);
?>
<div align="center">
<form id="form1" name="form1" method="post" action="adminupdt2.php" onsubmit="return check(this)" >
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
              <td>
              <?php
			  	echo '<input type="hidden" name="tn" value="'.$var.'" />';
			  ?>
              </td>
            </tr>
            <tr>
              <td><table width="700" border="0">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="169"><table width="700" border="1">
              	<tr>
                  <td colspan="4" align="center">导师信息</td>
                </tr>
                  <tr align="center">
                    <td width="100">姓名</td>
                    <td width="100">
                    <?php
						echo $info[name];
					?>
                    </td>
                    <td width="100">性别</td>
                    <td width="100"><?php echo $info[sex]; ?></td>
                  </tr>
                  <tr align="center">
                    <td>生日</td>
                    <td colspan="3"><?php echo $info[year]; ?>年<?php echo $info[month]; ?>月<?php echo $info[day]; ?>日</td>
                    
                  </tr>
                  <tr align="center">
                    <td>学员</td>
                    <td colspan="3">
                    <?php
	$sql1 = mysql_query("select * from teachersl where tname='".$var."'",$webconn);
	$info1 = mysql_fetch_array($sql1);
	while($info1)
	{
		echo $info1[sname];
		echo " ";
		$info1 = mysql_fetch_assoc($sql1);
	}
					?>
                    </td>
                  </tr>
                  <tr>
                  <td colspan="3" align="center">选择要删除的学员姓名：
              <select name="delname">
            <option selected value=0> 学员姓名 </option>
            <?php
	$sql2 = mysql_query("select * from teachersl where tname='".$var."'",$webconn);
	$info2 = mysql_fetch_array($sql2);
	while($info2)
	{
		echo '<option value='.$info2[sname].'>'.$info2[sname].'</option>';
		$info2 = mysql_fetch_assoc($sql2);
	}
			?>
            </select>
              </td>
                  </tr>
                  <tr>
                  <td colspan="3" align="center">
                  或输入要插入的学员姓名：<input type="text" name="insname" />
                  </td>
                  </tr>
                  <tr>
                  <td align="right" colspan="3"> <input type="submit" value="提交" /> </td>
                  </tr>
                  </table>
              </td>
            </tr>
            <tr>
              <td>&nbsp; </td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>