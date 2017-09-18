<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$id=$_GET["id"];

$sql="select * from review where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result);
?>

<form method=post action=reveiw_update_ok.php>
<table>

</table>
</form>