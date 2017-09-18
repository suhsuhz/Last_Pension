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

if($_SESSION["userid"]=="") // 회원이 아닐 경우
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
else // 회원일경우
{
$sql="select * from reserve where userid='$_SESSION[userid]' order by id desc";
}

$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
?>

<script>
 function bang_del(id)
 {
	 ch=confirm("삭제하시겠습니까?"); 
	 if(ch)   //if(confirm("삭제하시겠습니까?")) 로 한줄로 묶어도 됨
		 location="reserve_delete.php?=<?=$name?>&phone=<?=$phone?>&id="+id//reserve_delete.php?id=10
 }
</script>

<table width=500 align=center>
 <tr>
  <td>객실명</td>
  <td>입실일</td>
  <td>퇴실일</td>
  <td>숙박일</td>
  <td>가 격</td>
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
  <td> <?=$row->suk?>박 <?=$row->suk+1?>일 </td>
  <td align=right> <?=number_format($row->price)?>원 </td>
 </tr>
<?
}
?>
</table>
<?
include "../bottom.php";
?>