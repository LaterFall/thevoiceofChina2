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
	if(form1.name1.value==0)
	{
		alert("请选择学员");
		return(false);
	}
	if(form1.name2.value==0)
	{
		alert("请选择对手学员");
		return(false);
	}
	if(form1.name1.value==form1.name2.value)
	{
		alert("学员与对手学员不能相同");
		return(false);
	}
	if(form1.song1.value==0)
	{
		alert("请输入学员所唱歌曲");
		return(false);
	}
	if(form1.song2.value==0)
	{
		alert("请输入对手学员所唱歌曲");
		return(false);
	}
	if(form1.event.value==0)
	{
		alert("请选择场次");
		return(false);
	}
	if(form1.name3.value==0)
	{
		alert("请选择获胜学员");
		return(false);
	}
	if(form1.name3.value!=form1.name1.value)
	{
    	if(form1.name3.value!=form1.name2.value)
        {
			alert("获胜学员必须在学员和对手学员之中");
			return(false);
        }
	}
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="PKins1.php" onsubmit="return check(this)">
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
                  <td width="149" align="right">学员：</td>
                  <td width="152">
                    <select name="name1">
                    <option selected value=0> 学员 </option>
                    <?php
            $sql = mysql_query("select * from student",$webconn);
            $info = mysql_fetch_array($sql);
            while($info)
            {
                echo '<option value='.$info[name].'>'.$info[name].'</option>';
                $info = mysql_fetch_assoc($sql);
            }
                    ?>
                    </select>
                  </td>
                  <td width="149" align="right"> 学员所唱歌曲：</td>
                  <td width="232">
                  <input type="text" name="song1" />
                  </td>
                </tr>
                <tr>
                  <td align="right">对手学员：</td>
                  <td>
                    <select name="name2">
                    <option selected value=0> 学员 </option>
                    <?php
            $sql = mysql_query("select * from student",$webconn);
            $info = mysql_fetch_array($sql);
            while($info)
            {
                echo '<option value='.$info[name].'>'.$info[name].'</option>';
                $info = mysql_fetch_assoc($sql);
            }
                    ?>
                    </select>
                  </td>
                  <td align="right"> 对手学员所唱歌曲：</td>
                  <td>
                  <input type="text" name="song2" />
                  </td>
                </tr>
                <tr>
                  <td align="right">场次：</td>
                  <td>
                    <select name="event">
                    <option selected value=0> 场次 </option>
                    <?php
            $sql1 = mysql_query("select * from event",$webconn);
            $info1 = mysql_fetch_array($sql1);
            while($info1)
            {
                echo '<option value='.$info1[theme].'>'.$info1[theme].'</option>';
                $info1 = mysql_fetch_assoc($sql1);
            }
                    ?>
                    </select>
                  </td>
                  <td align="right">获胜学员：</td>
                  <td>
                    <select name="name3">
                    <option selected value=0> 学员 </option>
                    <?php
            $sql = mysql_query("select * from student",$webconn);
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
                <td colspan="2" align="center"> <input type="submit" value="插入"  /> </td>
                <td colspan="2" align="center"> <input type="reset" value="重置"  /> </td>
                </tr>
              </table> 
              </td>
            </tr>
            <tr>
              <td align="right">&nbsp;  </td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>