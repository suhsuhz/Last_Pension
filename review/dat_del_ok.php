<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 

$id=$_POST["id"];
$pwd=$_POST["pwd"];
// 값을 가져오기(id,비밀번호)

$sql="select * from dat where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result);
// DB에 있는 비밀번호 가져오기		
		
$sql="delete from dat where id=$id";
// 쿼리작성


if($pwd==$row->pwd) // 입력폼의 비밀번호와 DB의 비밀번호 비교
{
	mysql_query($sql,$conn);
?>
<script>
 opener.location.reload(); // 부모창을 새로 고쳐라!
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
