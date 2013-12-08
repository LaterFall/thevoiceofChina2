<?php
	header('Content-Type:text/html; charset=utf-8');
	include("Connections/webconn.php");
?>
<?php
	$insname = $_POST[insname];
	$sex = $_POST[sex];
	$year = $_POST[year];
	$month = $_POST[month];
	$day = $_POST[day];
	$sql = mysql_query("select * from teacher where name='".$insname."'",$webconn);
	$info = mysql_fetch_array($sql);
	if($info==false)
	{
		mysql_query("insert into teacher (name,sex,year,month,day) values ('$insname','$sex','$year','$month','$day')",$webconn);
		echo "<script>alert('恭喜，插入成功!');window.location='adminlookt.php';</script>";
	}
	else
	{
		echo "<script>alert('该导师已经存在!');history.back();</script>";
	}
?>