<?
include "../top.php";

if($_SESSION["userid"]!="") // 회원이라면
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
  <caption><h2>비회원 예약 현황</h2></caption>
   <tr>
    <td>이름</td>
    <td><input type=texet name=name size=10></td>
   </tr>
   <tr>
    <td>전화번호</td>
    <td>
     <input type=text name=phone1 size=4>-
     <input type=text name=phone2 size=4>-
     <input type=text name=phone3 size=4>
    </td>
   </tr>
   <tr>
    <td colspan=2 align=center><input type=submit value=예약확인></td>
   </tr>
 </table>
</form>
<?
}
include "../bottom.php";
?>