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
              <td align="center"> <table width="700" border="1">
              <?php
              $sql = mysql_query("select * from event order by time",$webconn);
			  $info = mysql_fetch_array($sql);
			  while($info)
			  {
				  echo '<tr>';
				  echo '<td width="175" align="center">';
				  echo '主题：';
				  echo '</td>';
				  echo '<td width="175" align="center">';
				  echo $info[theme];
				  echo '</td>';
				  echo '<td width="175" align="center">';
				  echo '所属比赛阶段：';
				  echo '</td>';
				  echo '<td width="175" align="center">';
				  echo $info[bevent];
				  echo '</td>';
				  echo '</tr>';
				  echo '<tr>';
				  echo '<td align="center">';
				  echo 'PK记录：';
				  echo '</td>';
				  $var = $info[theme];
				  echo '<td colspan="3"> <table border="1" width="525">';
				  $sql1 = mysql_query("select * from pk where event = '".$var."' ",$webconn);
			  	  $info1 = mysql_fetch_array($sql1);
				  while($info1)
				  {
					  echo '<tr>';
					  echo '<td width="100" align="center">';
					  echo '学员：';
					  echo '</td>';
					  echo '<td width="100" align="center">';
					  echo $info1[student1];
					  echo '</td>';
					  echo '<td width="160" align="center">';
					  echo '学员所唱歌曲：';
					  echo '</td>';
					  echo '<td width="160" align="center">';
					  echo $info1[song1];
					  echo '</td>';
					  echo '</tr>';
					  echo '<tr>';
					  echo '<td align="center">';
					  echo '对手学员：';
					  echo '</td>';
					  echo '<td align="center">';
					  echo $info1[student2];
					  echo '</td>';
					  echo '<td align="center">';
					  echo '对手学员所唱歌曲：';
					  echo '</td>';
					  echo '<td align="center">';
					  echo $info1[song2];
					  echo '</td>';
					  echo '</tr>';
					  echo '<tr>';
					  echo '<td colspan="2" align="center">';
					  echo '获胜学员：';
					  echo '</td>';
					  echo '<td colspan="2" align="center">';
					  echo $info1[result];
					  echo '</td>';
					  echo '</tr>';
					  $info1 = mysql_fetch_assoc($sql1);
				  }
				  echo '</table> </td>';
				  echo '</tr>';
				  $info = mysql_fetch_assoc($sql);
			  }
	          ?>
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