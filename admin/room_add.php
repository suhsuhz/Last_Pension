<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$bang=$_POST["bang"];
$num_min=$_POST["num_min"];
$num_max=$_POST["num_max"];
$price=$_POST["price"];

$sql="insert into room(bang,num_min,num_max,price) values('$bang',$num_min,$num_max,$price)";
mysql_query($sql,$conn);

Header("location:room_list.php");
?>