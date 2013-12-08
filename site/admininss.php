<?php
	include("Connections/webconn.php");
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
              <td align="center"><table width="700" border="0">
                <tr>
                  <td align="right">学员信息插入</td>
                  <td> &nbsp; </td>
                </tr>
                <tr>
              	<td colspan="2">&nbsp;</td>
            	</tr>
                <tr>
                  <td align="right">姓名：</td>
                  <td align="left">
                  <input type="text" name="name" />
                  </td>
                 </tr>
                 <tr>
                  <td align="right">性别：</td>
                  <td align="left">
        	<select name="sex">
            <option selected value=0> 请选择性别 </option>
            <option value="男">男</option>
            <option value="女">女</option>
            </select>
                  </td>
                </tr>
                <tr>
                  <td align="right">出生日期：</td>
                  <td align="left" colspan="3">
			<select name="year">
            <option selected value=0> 年 </option>
            <?php
				for($i=1950;$i<2030;$i++)
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
                <tr>
                  <td align="right">曲风：</td>
                  <td align="left">
                  <input type="text" name="songtype" />
                  </td>
                 </tr>
                <tr>
                  <td align="right">最高赛事：</td>
                  <td align="left">
        	<select name="topmatch">
            <option selected value=0> 请选择赛事 </option>
            <option value="淘汰赛">淘汰赛</option>
            <option value="半决赛">半决赛</option>
            <option value="决赛">决赛</option>
            </select>
                  </td>
                 </tr>
              </table>
              </td>
            </tr>
            <tr>
              <td align="right">&nbsp; </td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>