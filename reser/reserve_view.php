<?
include "../top.php";
?>

<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); 
mysql_select_db($dbname,$conn);

if($_SESSION["userid"]=="") // ȸ���� �ƴ� ���
{
 $name=$_POST["name"];
 $phone=$_POST["phone1"]."-".$_POST["phone2"]."-".$_POST["phone3"];
 if($name=="")
 {
 	$name=$_GET["name"];
 	$phone=$_GET["phone"];
 }
 
 $sql="select * from reserve where name='$name' and phone='$phone' order by id desc";
}
else // ȸ���ϰ��
{
$sql="select * from reserve where userid='$_SESSION[userid]' order by id desc";
}

$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
?>

<script>
 function bang_del(id)
 {
	 ch=confirm("�����Ͻðڽ��ϱ�?"); 
	 if(ch)   //if(confirm("�����Ͻðڽ��ϱ�?")) �� ���ٷ� ��� ��
		 location="reserve_delete.php?=<?=$name?>&phone=<?=$phone?>&id="+id//reserve_delete.php?id=10
 }
</script>

<table width=500 align=center>
 <tr>
  <td>���Ǹ�</td>
  <td>�Խ���</td>
  <td>�����</td>
  <td>������</td>
  <td>�� ��</td>
 </tr>
<?
{
	
}
for($i=1;$i<=$total;$i++)
{
	$row=mysql_fetch_object($result);
	$today=date("Y-m-d",time());
	if($today<$e_day)
		$reser_color="red";
	else
		$reser_color="black";
?>
 <tr align=center style="color:<?=$reser_color?>">
  <td> <a href="javascript:bang_del(<?=$row->id?>)"><?=$row->bang?></a> </td>
  <td> <?=$row->s_day?> </td>
  <td> <?=$row->e_day?> </td>
  <td> <?=$row->suk?>�� <?=$row->suk+1?>�� </td>
  <td align=right> <?=number_format($row->price)?>�� </td>
 </tr>
<?
}
?>
</table>
<?
include "../bottom.php";
?>