<?include "../top.php" // ../ =>��������?>
<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$id=$_GET["id"];
$page=$_GET["page"];
$cla=$_GET["cla"];
$sear=$_GET["sear"];

$sql="select * from board where id=$id";
// �����ۼ�
$result=mysql_query($sql,$conn);
// �������� => ���ڵ� ��������

$row=mysql_fetch_object($result);
//���ڵ��о����
?>

<script>
function update_check(pp)
{
  if(pp.pwd.value=="")
       {
         alert("��й�ȣ�� ��������");
         pp.pwd.focus();
         return false;
       } 
       else if(pp.pwd.value.length>10)
            {
              alert("��й�ȣ�� ���̴� 10���̳��Դϴ�");
              pp.pwd.value="";
              pp.pwd.focus();
              return false;
            }
            else if(pp.title.value=="")
                 {
                   alert("������ �Է��ϼ���");
                   pp.title.focus();
                   return false;
                 } 
                 else if(pp.content.value=="")
                      {
                       alert("������ ��������");
                       pp.content.focus();
                       return false;
                      }
                      else
                       return true;
}
</script>

<form method=post action=update_ok.php onsubmit="return update_check(this)">
<input type=hidden name=id value=<?=$row->id?>>
<input type=hidden name=page value="<?=$page?>">
<input type=hidden name=cla value="<?=$cla?>">
<input type=hidden name=sear value="<?=$sear?>">
<table width=400>
 <caption> �۾��� </caption>
 <tr>
  <td> �� �� </td>
  <td> <?=$row->name?> </td>
 </tr>
  <tr>
  <td> ��й�ȣ </td>
  <td> <input type=password name=pwd size=9>  <font color=red>*</font> 10���̳� </td>
 </tr>
 <tr>
  <td> �� �� </td>
  <td> <input type=text name=title size=40 value="<?=$row->title?>"> </td>
 </tr>
 <tr>
  <td> �� �� </td>
  <td> <textarea rows=10 cols=40 name=content><?=$row->content?></textarea> </td>
 </tr>
 <tr>
  <td colspan=2 align=center> 
    <input type=submit value=����> <input type=reset value=���>
  </td>
 </tr>
</table>
</form>
<?include "../bottom.php"?>