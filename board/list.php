<?
include "../top.php";
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); // mysql -uroot -apmsetup
mysql_select_db($dbname,$conn); // DB���Ӱ� ����� �����ͺ��̽� ����
// DB���Ӱ���

$cla=$_GET["cla"]; // ���� or ����
$sear=$_GET["sear"]; //�˻��ܾ� // $cla�� $sear�� ������ ���� ������?
// �� ��������

if($cla=="")
	$sql="select * from board  order by id desc";
	else
		$sql="select * from board where $cla like '%$sear%'  order by id desc";  // ���� �ֱ��� ���� ù��°
		
		//echo $sql;
		// board���̺��� �о���� ���� �ۼ�
		
		$result=mysql_query($sql,$conn);
		$total=mysql_affected_rows(); // ���ڵ� ����
		// ���������Ͽ� ���ڵ������� ��������
		if($cla=="title"||$cla=="")
			$a=0;
			else if($cla=="content")
				$a=1;
				?>
<script>
function cla_in()
{
  document.search.cla.selectedIndex=<?=$a?>;
}
function bg1(pp) //pp => tr�±�
{
  pp.style.backgroundColor="#e4eff1";	
}
function bg2(pp)
{
  pp.style.backgroundColor="white";	
}
</script>
<body onload=cla_in()>
<table width=500 border=0 cellspacing=0>
 <caption> <h2> �Խ��� </h2></caption>
 <tr>
   <td colspan=4 align=right>
    <form name=search method=get action=list.php>
      <select name=cla style="font-size:9pt">
       <option value=title> ���� </option>
       <option value=content> ���� </option>
      </select>
      <input type=text name=sear value="<?=$sear?>" size=10 style="font-size:9pt">
      <input type=submit value=�˻� style="font-size:9pt">
    </form>
  </td>
 </tr>  <!-- �˻��� ���� ���� �߰� -->
 <tr>
  <td> �� �� </td>
  <td> �� �� </td>
  <td> �ۼ��� </td>
  <td> ��ȸ�� </td>
 </tr>
<?

  // ($page-1)*10     ,   ($page*10)-10;
$page=$_GET["page"]; // page���� �о����

if($page=="") // �Խ��ǿ� ó�� �����Ҷ�
  $page=1;  // ������� ���İ� �Ǹ� $page���� �������������� ������...
  
$page_start=($page-1)*10; // ���ϴ��������� ���۷��ڵ��ȣ

mysql_data_seek($result,$page_start);  // �ι�° �Ű����� ���������ν� �������� ������ �ִ�!!
    // 0�����ڵ�� ����!!  => ���� ù��° �� => 1������
    // ($result,10) => 2������
    // ($result,20) => 3������
    // ($result,1010) => 102������
 for($i=1;$i<=10;$i++) // 1�������� 10���� ���ڵ�� �ϰڴ�...
 {
 	if($i%2==0)
 		$col="yellow";
 		else
 			$col="white";
 	
   $row=mysql_fetch_object($result);
   if($row->name=="")
   	break;
?> 	
 <tr bgcolor="<?=$col?>" onmouseover="bg1(this)" onmouseout="bg2(this)">  <!-- �Խ��ǳ��� ����� -->
  <td> <?=$row->name?> </td>
  <td> <a href="content_imsi.php?id=<?=$row->id?>&page=<?=$page?>&cla=<?=$cla?>&sear=<?=$sear?>"> <?=$row->title?> </a> </td>
  <td> <?=$row->writeday?> </td>
  <td> <?=$row->readnum?> </td>
 </tr>
<?
 }
// ���̺��� ���·� ����ϱ�
?>
 <tr>
  <td colspan=4 align=center>
  <?
   // $start�� �Խ��ǿ� ������������ �������� ǥ���� ������������
   // $end �� �Խ��ǿ� ������������ �������� ǥ���� ����������
   // $start����  ����������($page)�� ���� 1~10�̶��  $start=1;
   // ���� 11~20 �̶�� $start=11;
   // ���� 21~30 �̶�� $start=21;
   // ���� 31~40 �̶�� $start=31; �̷��� �Ǿ� �ȴ�...
   
   $start=floor($page/10);  // 1~9 => 0�� ���´�..
   if($page%10==0) // ������������ 10�� ����̸�
   	$start=$start-1;
   	
   $start=intVal($start."1"); //���������� ����� // 0."1"  => 01 

   $end=$start+9; // ����ȭ�鿡�� ���峡�� ��µ� ������
   
   $total_page=$total/10; // ex 15928�����   $total_page=1592.8
   $total_page=floor($total_page)+1; // �Ҽ��� ������  +1�� �� ���� �ش�..  1593
   if($total%10==0)
   	$total_page=$total_page-1;  // 10���� ������ �������� ���� +1�� �ʿ����..
   
   if($total_page<$end) // $end�� ��ü������������ ũ�ٸ�
   	  $end=$total_page; // 1593
   	  
   if($start!=1)  // $start �� 1�ϰ�쿡 ����ȵǾ� �ȴ�...
   {
  ?>
   <a href="list.php?page=<?=$start-1?>&cla=<?=$cla?>&sear=<?=$sear?>"> �� </a>
  <?
   }
   if($page!=1)  // $page���� 1�� �ƴҶ� ��!!!  1������ ������ �������� �ʴ´�..
   {
  ?>
   <a href="list.php?page=<?=$page-1?>&cla=<?=$cla?>&sear=<?=$sear?>"> �� </a>
  <?
   }
   for($i=$start;$i<=$end;$i++) // $start���� $end���� ���
   {
    if($page==$i)  // �����������ϰ�  ����ϴ� ���������ϰ� ���� ���
    {
  ?>
    <font color=#0e7ee9> <?=$i?> </font>
  <?
    }
    else 
    {
  ?> 
    <a href="list.php?page=<?=$i?>&cla=<?=$cla?>&sear=<?=$sear?>"> <?=$i?> </a> 
  <?
    } // else�� ��
   } //for�� ��   // ������ ����� ��
   
  
   if($page!=$total_page)
   {
  ?>
   <a href="list.php?page=<?=$page+1?>&cla=<?=$cla?>&sear=<?=$sear?>"> �� </a>
  <?
   }
   if($total_page!=$end) 
   {
  ?>
   <a href="list.php?page=<?=$end+1?>&cla=<?=$cla?>&sear=<?=$sear?>"> �� </a>
  <? 
   }
  ?>

  </td>
 </tr>
</table>
<a href="write.php"> �۾��� </a>

<? include "../bottom.php"?>