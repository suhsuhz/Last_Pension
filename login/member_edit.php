<? include "../top.php"?>
<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);


$sql="select * from member where userid='$_SESSION[userid]'";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result);

?>
<script>
function id_check()
{
  userid=document.pkc.userid.value;
  window.open("id_check.php?userid="+userid,"","width=300,height=200");
}
function check(pp) // pp = document.pkc
{
 else if(pp.zip.value.length!=5)
 {
    alert("우편번호는 5자리입니다");
    pp.zip.value="";
    pp.zip.focus();
    return false;
 }
             
    else
       return true;
}
</script>
 <form name=pkc method=post action=member_edit_ok.php onsubmit="return check(this)">
  <table>
   <caption> <h2> 정 보 수 정 </h2> </caption>
   <tr>
    <td> 사용자 아이디 </td>
    <td> <?=$row->userid?></td>   
   </tr>
   <tr>
    <td> 이 름 </td>
    <td> <?=$row->name?></td>   
   </tr>
   <tr>
    <td> 우편번호 </td>
    <td> <input type=text name=zip size=6 value=<?=$row->zip?>> </td>   
   </tr>
   <tr>
    <td> 주 소 </td>
    <td> <input type=text name=juso1 size=30 value="<?=$row->juso1?>"> </td>   
   </tr>
   <tr>
    <td> 나머지주소 </td>
    <td> <input type=text name=juso2 size=20 value="<?=$row->juso2?>"> </td>   
   </tr>
   <tr>
    <td> 생년월일 </td>
    <?
    $year=substr($row->birth,0,4);
    $month=substr($row->birth,4,2);
    $day=substr($row->birth,6,2);
    ?>
    <td> <?=$year."년".$month."월".$day."일"?></td>   
   </tr>
   <tr>
    <td> 전화 번호 </td>
    <td>
    <?
    $phone=split("-",$row->phone);
    ?>
      <input type=text name=phone1 size=4 value=<?="$phone[0]"?>> - 
      <input type=text name=phone2 size=4 value=<?="$phone[1]"?>> - 
      <input type=text name=phone3 size=4 value=<?="$phone[2]"?>>
    </td>   
   </tr>
   <tr>
    <td colspan=2 align=center> <input type=submit value=정보수정> </td>
   </tr>
  </table>
 </form>
<? include "../bottom.php"?>