<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script language="javascript">
function check(form1)
{
	if(form1.insname.value=="")
	{
		alert("请输入导师姓名");
		return(false);
	}
   	if(form1.sex.value==0)
	{
		alert("请选择性别!");
	 	return(false);
	}
  	if(form1.year.value==0)
	{
	 	alert("请输入出生年份!");
	 	return(false);
	}
  	if(form1.month.value==0)
	{
	 	alert("请输入出生月份!");
	 	return(false);
	}
  	if(form1.day.value==0)
	{
	 	alert("请输入出生天数!");
	 	return(false);
	}
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="admininst1.php" onsubmit="return check(this)">
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
                  <td width="123" align="right">导师姓名：</td>
                  <td width="567"> <input type="text" name="insname"  /> </td>
                </tr>
                <tr>
                  <td width="123" align="right">性别：</td>
                  <td width="567">
        	<select name="sex">
            <option selected value=0> 请选择性别 </option>
            <option value="男">男</option>
            <option value="女">女</option>
            </select>
                  </td>
                </tr>
                <tr>
                  <td align="right">出生年月：</td>
                  <td>
                  <select name="year">
            <option selected value=0> 年 </option>
            <?php
				for($i=1950;$i<2050;$i++)
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
                </tr>
              </table> 
              </td>
            </tr>
            <tr>
              <td align="center"> <input type="submit" value="插入" /> </td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>