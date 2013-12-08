<?php
	header('Content-Type:text/html; charset=utf-8');
	include("Connections/webconn.php");
?>
<?php
	$theme = $_POST[theme];
	$bevent = $_POST[bevent];
	$year = $_POST[year];
	$month = $_POST[month];
	$day = $_POST[day];
	$time = $year."-".$month."-".$day;
	echo $time;
	mysql_query("insert into event (theme,time,bevent) values ('$theme','$time','$bevent')",$webconn);
	echo "<script>alert('恭喜，插入成功!');window.location='adminevel.php';</script>";
?>