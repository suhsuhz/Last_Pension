<?
include "../top.php";
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$sql="select * from room orderm";
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
?>

<form method=post action=room_add.php>
<table>
<tr>
 <td><input type=text name=bang size=20 placeholder="���Ǹ�"></td>
 <td><input type=text name=num_min size=8 placeholder="�ּ��ο�"></td>
 <td><input type=text name=num_max size=8 placeholder="�ִ��ο�"> </td>
 <td><input type=text name=price size=10 placeholder="����:������"></td>
 <td><input type=submit value=����></td>
</tr>
<tr>
 <td>���Ǹ�</td>
 <td>�ּ��ο�</td>
 <td>�ִ��ο�</td>
 <td>����</td>
</tr>
<?
for($i=1;$i<=$total;$i++)
{
	$row=mysql_fetch_object($result);
	if($row->bang=="")
		break;
?>
<tr>
 <td><?=$row->bang?></td>
 <td><?=$row->num_min?></td>
 <td><?=$row->num_max?></td>
 <td><?=$row->price?></td>
</tr>
<?
}
?>
</table>
</form>

<?include "../bottom.php"?>