<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$userid=$_GET["userid"];

// ���� DB�� �ִ� member���̺��� userid�ʵ� �߿� '��� �Է��� ����'�ϰ� ������ �ֳ� üũ
$sql="select * from member where userid='$userid'";
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
?>

<script>
function check()
{
	opener.document.pkc.userid.value="<?=$userid?>";
  // opener=�θ�â�� userid�� ���� �༭ ����ض�
	  close();
}
</script>

<?
if($total==0)
{
?>
<?=$userid?> �� ��밡���� ���̵�<p>
 <input type=button onclick=check() value=����ϱ�>
<?
}
else 
{
?>
������� ���ϴ� ���̵�<p>
<form method=get action=id_Check.php>
 <input type=text name=userid value="<?=$userid?>"> <input type=submit value=�ߺ�üũ>
</form>
<?
}
?>