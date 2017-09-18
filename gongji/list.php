<?include "../top.php"?>
<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 

$sql="select * from gongji order by id desc";

$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
?>

<table width=400 border=1 cellspacing=0>
<tr>
 <td>제목</td>
 <td>이름</td>
 <td>날짜</td>
 <td>조회수</td>
</tr>
<?
$page=$_GET["page"];
if($page=="")
	$page=1;

$page_start=($page-1)*10;

mysql_data_seek($result,$page_start);
for($i=1;$i<=10;$i++)
{
	$row=mysql_fetch_object($result);
	if($row->title=="")
		break;
?>
<tr>
 <td width=100><a href="content_imsi.php?id=<?=$row->id?>"><?=$row->title?></a></td>
 <td>관리자!</td>
 <td><?=$row->writeday?></td>
 <td><?=$row->readnum?></td>
</tr>
<?
}
?>
<tr>
 <td colspan=4 align=center>
 <?
 $start=floor($page/10);
 if($page%10==0)
 	$start=$start-1;
 $start=intVal($start."1");
 
 $end=$start+9;
 
 $total_page=$total/10;
 $total_page=floor($total_page)+1;
 if($total_page%10==0)
 	$total_page=$total_page-1;
 if($total_page<$end)
 	$end=$total_page;
 if($start!=1)
 {
 ?>
 <a href="list.php?page=<?=$start-1?>">★</a>
 <?}?>
 <?
 if($page!=1)
 {
 ?>
 <a href="list.php?page=<?=$page-1?>">◀</a>
 <?
 }
for($i=$start;$i<=$end;$i++)
{
	if($page==$i)
	{	
 ?>
 <font color=blue><?=$i?></font>
 <?
    }
  else
  {
 ?>
 <a href="lisg.php?page=<?=$i?>"><?=$i?></a>
 <?
  }
}

if($page!=$total_page)
{
 ?>
 <a href="list.php?page=<?=$page+1?>">▶</a>
 <?
}
if($total_page!=$end)
{
?>
<a href="list.php?page=<?=$end+1?>">★</a>
<?}?>
 </td>
</tr>
</table>
<?include "../bottom.php"?>


