<?
include "../top.php";

if($_SESSION["userid"]!="") // ȸ���̶��
{
?>
<script>
	location="reserve_view.php";
</script>
<?
}
else 
{
?>
<form method=post action=reserve_view.php>
 <table width=400 align=center>
  <caption><h2>��ȸ�� ���� ��Ȳ</h2></caption>
   <tr>
    <td>�̸�</td>
    <td><input type=texet name=name size=10></td>
   </tr>
   <tr>
    <td>��ȭ��ȣ</td>
    <td>
     <input type=text name=phone1 size=4>-
     <input type=text name=phone2 size=4>-
     <input type=text name=phone3 size=4>
    </td>
   </tr>
   <tr>
    <td colspan=2 align=center><input type=submit value=����Ȯ��></td>
   </tr>
 </table>
</form>
<?
}
include "../bottom.php";
?>