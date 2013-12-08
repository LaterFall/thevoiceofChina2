<?php
	header('Content-Type:text/html; charset=utf-8');
	include("Connections/webconn.php");
?>
<?php
	$insname = $_POST[insname];
	$delname = $_POST[delname];
	$tn = $_POST[tn];
	if($insname == "")
	{
		$var = $delname;
		mysql_query("delete from teachersl where tname='".$tn."' and sname = '".$var."'",$webconn);
		echo "<script>alert('恭喜，删除成功!');window.location='adminlookt.php';</script>";
	}
	else
	{
		$var = $insname;
		$sql = mysql_query("select * from teachersl where tname='".$tn."' and sname='".$var."'",$webconn);
		$info = mysql_fetch_array($sql);
		if($info==true)
		{
			echo "<script>alert('该学员已经存在!');history.back();</script>";
			exit;
		}
		else
		{
			mysql_query("insert into teachersl (tname,sname) values ('$tn','$insname')",$webconn);
			echo "<script>alert('恭喜，插入成功!');window.location='adminlookt.php';</script>";
		}
	}
?>