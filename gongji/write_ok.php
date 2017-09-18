<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$title=$_POST["title"];
$content=$_POST["content"];
$writeday=date("Y-m-d");

$sql="insert into gongji(title,content,writeday,readnum) values('$title','$content','$writeday',0)";
mysql_query($sql,$conn);

Header("location:list.php");
?>
