<?
session_start();  // ���Ǻ����� ����ų� ����Ϸ��� ������ �߰�
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$userid=$_POST["userid"];
$pwd=$_POST["pwd"];
// �Ѿ�� ���� ��������

$sql="select * from member where userid='$userid' and pwd='$pwd'";
//�����ۼ� $useid�� $pwd(�Ѿ�� ��)�� ���� ���� DB���� �ҷ��Ͷ�
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();

if($total==0) // ���̵�� ��й�ȣ�� �´�.
{
	Header("location:login.php"); // Ʋ����� �̵��� ����
}
else // ���̵�� ��й�ȣ�� Ʋ����.
{
	$row=mysql_fetch_object($result);
	$_SESSION["userid"]=$row->userid;
	$_SESSION["pwd"]=$row->pwd;
	$_SESSION["name"]=$row->name;
	Header("location:/pension/index.php");
}
?>