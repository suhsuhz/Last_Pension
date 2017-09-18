<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$id=$_GET["id"];
$sql="update gongji set readnum=readnum+1 where id=$id";
mysql_query($sql,$conn);

Header("location:content.php?id=$id");
?>