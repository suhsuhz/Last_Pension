<?include "../top.php" // ../ =>��������?>
<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 

$sql="select * from review order by id desc"; // ���� �ֱ��� ���� ù��°�� ������
		
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows(); // ���ڵ��� ����
?>

<style>
a {text-decoration:none;color:black} <? // ���� ���ְ� ���� �������� ?>
a:hover {text-decoration:underline;color:green} <? // ���콺 �ö󰡸� ���� ?>
</style>

<table width=600 border=1 cellspacing=0 bgcolor=#e4eff1>
<tr>
 <td>�� ��</td>
 <td>�� ��</td>
 <td>�ۼ���</td>
 <td>��ȸ��</td>
</tr>
<?
// ($page-1)*10  or  ($page*10)-10;
$page=$_GET["page"]; // get���� �ѱ� ���������� �о��
if($page=="") 
	$page=1;  // ����  ������ �ּ� ���� http://localhost/board/list.php�� ���´ٸ� 1�������� �������
	
$page_start=($page-1)*10;

mysql_data_seek($result,$page_start); 
for($i=1;$i<=10;$i++) // 1�������� 10���� ���ڵ尹���� �ϰڴ�.
{
	$row=mysql_fetch_object($result);
	if($row->name=="")
		break;
?>
 <tr>
 <td width=100><?=$row->name?></td>
 <td><a href="review_content_imsi.php?id=<?=$row->id?>"><?=$row->title?></a></td>
 <td><?=$row->writeday?></td>
 <td width=50 align=center><?=$row->readnum?></td>
 </tr>
<?
}
?>
<tr>
 <td colspan=4 align=center>
<?
// $start�� �Խ��ǿ� ������������ �������� ǥ���� ������������
// $end�� �Խ��ǿ� ������������ �������� ǥ���� ���������� 
// $start���� ����������($page) 1~10������
//  $start=1; $start=11 $start=21....

$start=floor($page/10);  // 1~9=0 �� ����. floor�� �Ҽ����� �����ٴ� ��
if($page%10==0)
	$start=$start-1;
$start=intVal($start."1"); // intVal:���������� �����(1�������� 01�̶�� �ߴ� ��� �����ϱ� ����) / . �� ���Ῥ����

$end=$start+9; // ���� ȭ�鿡�� ���峡�� ��µ� ������

$total_page=$total/10; // �������� 10���� �������ϱ� 10�� ������ �Ҽ����� ������ +1�� �ϸ� ������ �������� ����
$total_page=floor($total_page)+1;
if($total_page%10==0) // �� ���ڵ� ������ 10���� ������ ������ ���� +1�� ���ָ� �ȵ�
	$total_page=$total_page-1;
if($total_page<$end)  // $end�� ��ü���������� ũ�ٸ�
	$end=$total_page;  
if($start!=1)
{
?>
<a href="review_list.php?page=<?=$start-1?>">��</a>
<?}?>
<?
if($page!=1) // 1�������� ���� ������� �ʴ´�
{
?>
<a href="review_list.php?page=<?=$page-1?>">��</a>
<?
}	
for($i=$start;$i<=$end;$i++) // $start���� $end���� ���
{
	if($page==$i) // ������������ ����ϴ� ���������ϰ� ���� ���
	{
?>
<font color=blue><?=$i?></font>
<?
	}
	else
	{
?>
<a href="review_list.php?page=<?=$i?>"><?=$i?></a>
<?
	} // else�� ��
} // for�� �� 


if($page!=$total_page) // ������ ���������� ���� ���������� ���ٸ� �������� �ʴ´�.
{
?>
<a href="review_list.php?page=<?=$page+1?>">��</a>
<?
}
if($total_page!=$end)
{
?>
<a href="review_list.php?page=<?=$end+1?>">��</a>
<?}?>
 </td>
</tr>
</table>
<a href="review_write.php">�۾���</a>
</form>

<?include "../bottom.php"?>