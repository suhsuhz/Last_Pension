<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$pwd=$_POST["pwd"];
$id=$_POST["id"];
$page=$_POST["page"];
$cla=$_POST["cla"];
$sear=$_POST["sear"];

$sql="select * from board where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result);

$sql="delete from board where id=$id";

if($pwd==$row->pwd)
{
	mysql_query($sql,$conn);
	Header("location:list.php?page=$page&cla=$cla&sear=$sear"); 
}
else
{
?>
<script>
 alert("비밀먼호가 틀립니다");
 history.back(); 
</script>
<?	
}
mysql_close($conn);
?>