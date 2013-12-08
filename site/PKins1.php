<?php
	header('Content-Type:text/html; charset=utf-8');
	include("Connections/webconn.php");
?>
<?php
	$name1=$_POST[name1];
	$name2=$_POST[name2];
	$name3=$_POST[name3];
	$song1=$_POST[song1];
	$song2=$_POST[song2];
	$event=$_POST[event];
	mysql_query("insert into pk (student1,song1,student2,song2,event,result) values ('$name1','$song1','$name2','$song2','$event','$name3')",$webconn);
	echo "<script>alert('恭喜，插入成功!');window.location='PKlook.php';</script>";
?>