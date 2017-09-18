<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$id=$_GET["id"];
$name=$_GET["name"];
$phone=$_GET["phone"];

$sql="delete from reserve where id=$id";

mysql_query($sql,$conn);

Header("location:reserve_view.php?name=$name&phone=$phone");
?>