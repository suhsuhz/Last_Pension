<?include "../top.php" // ../ =>��������?>
<? // �ϳ��� ���ڵ忡 ��ü ������ ������
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 
//DB���� ����

$id=$_GET["id"];
$page=$_GET["page"];
$cla=$_GET["cla"];
$sear=$_GET["sear"];
// list.php���� �Ѿ�� ���� ������

// ��ȸ�� ����
/*$sql="update board set readnum=readnum+1 where id=$id";
mysql_query($sql,$conn);  => ���ΰ�ħ�� ������ ��ȸ���� �ö󰣴ٴ� ����. ���� �ٸ�����(content_imsi.php)�� ó������*/

// ��ȸ�� ��


$sql="select * from board where id=$id";
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
 function del_check(pp)
 {
	 if(pp.pwd.value=="")
	 {
		 alert("��й�ȣ�� �Է��ϼ���")
		 pp.pwd.focus();
		 return false;
	 }
	 else
		 return true;
 }
</script>
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
 <td height=180> ���� </td>
 <td> <?=nl2br($row->content)?> </td>
</tr>
<tr>
 <td> ��ȸ�� </td>
 <td> <?=$row->readnum?> </td>
</tr>
<tr>
 <td> �ۼ��� </td>
 <td> <?=$row->writeday?> </td>
</tr>
</table>
<a href="update.php?id=<?=$row->id?>&page=<?=$page?>&cla=<?=$cla?>&sear=<?=$sear?>">����</a> 
<a href="javascript:del()"> �� ��</a>
<a href="list.php?page=<?=$page?>&cla=<?=$cla?>&sear=<?=$sear?>">���</a>

<div id=pkc>
 <form method=post action=delete_ok.php onsubmit="return del_check(this)">
 <input type=hidden name=id value=<?=$row->id?>>
 <input type=hidden name=page value="<?=$row->page?>">
 <input type=hidden name=cla value="<?=$row->cla?>">
 <input type=hidden name=sear value="<?=$row->sear?>">
  ��й�ȣ <input type=password name=pwd size=8>
  <input type=submit value=����>
 </form>
</div>
<!-- ��� -->
<?include "../bottom.php"?>