<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$userid=$_GET["userid"];

// 현재 DB에 있는 member테이블중 userid필드 중에 '방금 입력한 내용'하고 같은게 있나 체크
$sql="select * from member where userid='$userid'";
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
?>

<script>
function check()
{
	opener.document.pkc.userid.value="<?=$userid?>";
  // opener=부모창의 userid에 값을 줘서 출력해라
	  close();
}
</script>

<?
if($total==0)
{
?>
<?=$userid?> → 사용가능한 아이디<p>
 <input type=button onclick=check() value=사용하기>
<?
}
else 
{
?>
사용하지 못하는 아이디<p>
<form method=get action=id_Check.php>
 <input type=text name=userid value="<?=$userid?>"> <input type=submit value=중복체크>
</form>
<?
}
?>