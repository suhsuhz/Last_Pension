<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 

$id=$_POST["id"];
$pwd=$_POST["pwd"];
// ���� ��������(id,��й�ȣ)

$sql="select * from dat where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result);
// DB�� �ִ� ��й�ȣ ��������		
		
$sql="delete from dat where id=$id";
// �����ۼ�


if($pwd==$row->pwd) // �Է����� ��й�ȣ�� DB�� ��й�ȣ ��
{
	mysql_query($sql,$conn);
?>
<script>
 opener.location.reload(); // �θ�â�� ���� ���Ķ�!
 window.close();
</script>
<?
}
else
{
?>
<script>
 alert("��й�ȣ�� Ʋ�Ƚ��ϴ�");
 history.back();
</script>
<?
}
?>
