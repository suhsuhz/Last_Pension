<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);
//DB접속 관련

$id=$_GET["id"];
$sql="update review set readnum=readnum+1 where id=$id";
mysql_query($sql,$conn);

Header("location:review_content.php?id=$id"); // id값도 보냄
?>