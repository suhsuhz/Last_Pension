<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 

$id=$_POST["id"];
$pwd=$_POST["pwd"];
$content=$_POST["content"];

$sql="select * from dat where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result);

$sql="update dat set content='$content' where id=$id";
if($pwd==$row->pwd)
{	
	mysql_query($sql,$conn);
?>
<script>
 opener.location.reload();
 window.close();
</script>
<?	
}
else
{
?>
<script>
 alert("비밀번호가 틀렸습니다");
 history.back();
</script>
<?
}
?>
