<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 

$name=$_POST["name"];
$pwd=$_POST["pwd"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
$review_id=$_POST["review_id"];
// 값을 가져오기

$sql="insert into dat(name,pwd,content,writeday,review_id) values('$name','$pwd','$content','$writeday','$review_id')";
mysql_query($sql,$conn);

Header("location:review_content.php?id=$review_id");
?>