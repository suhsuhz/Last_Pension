<?include "../top.php" // ../ =>상위폴더?>
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
// 쿼리작성
$result=mysql_query($sql,$conn);
// 쿼리실행 => 레코드 가져오기

$row=mysql_fetch_object($result);
//레코드읽어오기
?>

<script>
function update_check(pp)
{
  if(pp.pwd.value=="")
       {
         alert("비밀번호를 적으세요");
         pp.pwd.focus();
         return false;
       } 
       else if(pp.pwd.value.length>10)
            {
              alert("비밀번호의 길이는 10자이내입니다");
              pp.pwd.value="";
              pp.pwd.focus();
              return false;
            }
            else if(pp.title.value=="")
                 {
                   alert("제목을 입력하세요");
                   pp.title.focus();
                   return false;
                 } 
                 else if(pp.content.value=="")
                      {
                       alert("내용을 적으세요");
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
 <caption> 글쓰기 </caption>
 <tr>
  <td> 이 름 </td>
  <td> <?=$row->name?> </td>
 </tr>
  <tr>
  <td> 비밀번호 </td>
  <td> <input type=password name=pwd size=9>  <font color=red>*</font> 10자이내 </td>
 </tr>
 <tr>
  <td> 제 목 </td>
  <td> <input type=text name=title size=40 value="<?=$row->title?>"> </td>
 </tr>
 <tr>
  <td> 내 용 </td>
  <td> <textarea rows=10 cols=40 name=content><?=$row->content?></textarea> </td>
 </tr>
 <tr>
  <td colspan=2 align=center> 
    <input type=submit value=수정> <input type=reset value=취소>
  </td>
 </tr>
</table>
</form>
<?include "../bottom.php"?>