<?
include "../top.php";
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$name=$_POST["name"];
$userid=$_POST["userid"];
$birth=$_POST["birth"];
$sql="select * from member where name='$name' and userid='$userid' and birth='$birth'";
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
$row=mysql_fetch_object($result);

if($total==0)
{
?>
��ġ�ϴ� ������ �����ϴ�
	<form method=post action=user_pwd.php>
	<table> <!-- �������̺� ���ۺκ� -->
	<tr>
	<td> �̸� </td>
	<td> <input type=text name=name size=6> </td>
	</tr>
	<tr>
	<td> ���̵� </td>
	<td> <input type=text name=userid size=6> </td>
	</tr>
	<tr>
	<td> ������� </td>
	<td> <input type=text name=birth size=6> </td>
	</tr>
	<tr>
	<td colspan=2> <input type=submit value=��й�ȣã��> </td>
	</tr>
	</table> <!-- �������̺� ���κ� -->
	</form>
<?
}
else
{
	echo "����� ��й�ȣ�� ".$row->pwd." �Դϴ�";
}
?>

<? include "../bottom.php"?>
