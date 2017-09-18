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
 <td><input type=text name=bang size=20 placeholder="객실명"></td>
 <td><input type=text name=num_min size=8 placeholder="최소인원"></td>
 <td><input type=text name=num_max size=8 placeholder="최대인원"> </td>
 <td><input type=text name=price size=10 placeholder="가격:만단위"></td>
 <td><input type=submit value=저장></td>
</tr>
<tr>
 <td>객실명</td>
 <td>최소인원</td>
 <td>최대인원</td>
 <td>가격</td>
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