<?include "../top.php"?>
<? // �ϳ��� ���ڵ忡 ��ü ������ ������
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 
//DB���� ����

$id=$_GET["id"]; // ���� ����ڰ� �������ϴ� ���� id


$sql="select * from review where id=$id";
// �����ۼ�

$result=mysql_query($sql,$conn);
// ��������, ������ �ϳ��� ���ڵ常 �����ֱ� ������ total�� �ʿ� ����

$row=mysql_fetch_object($result);
// ���ڵ带 �о����

?>
<style>
 #pkc {position:absolute;left:100;top:320;visibility:hidden}
</style>
<script>
 function del()
 {
   document.all.pkc.style.visibility="visible";
 }

 function review_del(id) // ����� ����
 {
	 window.open("dat_del.php?id="+id,"","width=200,height=100");
 }
 function review_update(id) // ����� ����
 {
	 window.open("dat_update.php?id="+id,"","width=300,height=100");
 }
 
</script>
<a href="review_update.php?id=<?=$row->id?>">����</a> 
<a href="javascript:del()"> �� ��</a>
<a href="review_list.php">���</a>

<table width=500 border=1 cellspacing=0>
<tr>
 <td> �� �� </td>
 <td> <?=$row->title?> </td>
</tr>

<tr>
 <td> �ۼ���  </td>
 <td> <?=$row->name?> </td>
</tr>
<tr>
 <td> ��ȸ�� </td>
 <td> <?=$row->readnum?> </td>
</tr>
<tr>
 <td> �ۼ��� </td>
 <td> <?=$row->writeday?> </td>
</tr>
<tr>
 <td height=180> ���� </td>
 <td>  
 <?
   	if($row->fname1 != "")
   	{
   		
 ?>
    <img src="file/<?=$row->fname1?>" width=300 height=300><br>
    <?=nl2br($row->content1)?><br>
 <?
   }
 ?>
 <?
   	if($row->fname2 != "")
   	{
   		
 ?>
    <img src="file/<?=$row->fname2?>" width=300 height=300><br>
    <?=nl2br($row->content2)?><br>
 <?
   }
 ?>
 <?
   	if($row->fname3 != "")
   	{
   		
 ?>
    <img src="file/<?=$row->fname3?>" width=300 height=300><br>
    <?=nl2br($row->content3)?><br>
 <?
   }
 ?>
 <?
   	if($row->fname4 != "")
   	{
   		
 ?>
    <img src="file/<?=$row->fname4?>" width=300 height=300><br>
    <?=nl2br($row->content4)?><br>
 <?
   }
 ?>
 <?
   	if($row->fname5 != "")
   	{
   		
 ?>
    <img src="file/<?=$row->fname5?>" width=300 height=300><br>
    <?=nl2br($row->content5)?><br>
 <?
   }
 ?>
 </td>
</tr>
</table> <!-- �����ı� �� -->

<form method=post action=dat_ok.php>
<input type=hidden name=review_id value=<?=$id?>>
<!-- ���� ���̺��� ���̵��� �Ѱ���. �׷��� �ش� ����� ����Ҷ� �� ���̵��� ���� ���������� ����� ������-->
<table width=400> <!-- ��۴ޱ� �Է��� -->
 <tr> 
  <td><input type=text name=name size=8 placeholder="�� ��"></td>
  <td><input type=password name=pwd size=8 placeholder="��й�ȣ"></td>
  <td rowspan=2><input type=submit value=��۴ޱ�></td>
 </tr>
 <tr> 
  <td colspan=2><textarea name=content rows=3 cols=40 placeholder="����� �����ּ���"></textarea></td>
 </tr>
</table>
</form>

<!-- �������ϱ� -->
<table width=400>
<?
$sql="select * from dat where review_id=$id"; // ����ۿ� �޸� ��۸� �����Ͷ�
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
for($i=1;$i<=$total;$i++)
{
	$row=mysql_fetch_object($result);
?>
 <tr>
  <td><?=$row->name?></td>
  <td><?=nl2br($row->content)?></td>
  <td> <a href="javascript:review_update(<?=$row->id?>)"> ���� </a></td>
                                    <!-- �������� ���̵� �Ѱ��� -->
  <td> <a href="javascript:review_del(<?=$row->id?>)"> ���� </a></td>
 </tr> 
<?
}
?>
</table>
<!-- �������ϱ� �� -->


<div id=pkc> <!-- ������ ���� ���̾� -->
 <form method=post action=review_delete_ok.php>
 <input type=hidden name=id value=<?=$row->id?>>
  ��й�ȣ <input type=password name=pwd size=8>
  <input type=submit value=����>
 </form>
</div>
<!-- ��� -->
<?include "../bottom.php"?>