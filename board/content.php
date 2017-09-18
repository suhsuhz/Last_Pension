<?include "../top.php" // ../ =>상위폴더?>
<? // 하나의 레코드에 전체 내용을 보여줌
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 
//DB접속 관련

$id=$_GET["id"];
$page=$_GET["page"];
$cla=$_GET["cla"];
$sear=$_GET["sear"];
// list.php에서 넘어온 값을 가져옴

// 조회수 시작
/*$sql="update board set readnum=readnum+1 where id=$id";
mysql_query($sql,$conn);  => 새로고침할 때마다 조회수가 올라간다는 단점. 따라서 다른파일(content_imsi.php)로 처리하자*/

// 조회수 끝


$sql="select * from board where id=$id";
// 쿼리작성

$result=mysql_query($sql,$conn);
// 쿼리실행, 무조건 하나의 레코드만 보여주기 때문에 total올 필요 없음

$row=mysql_fetch_object($result);
// 레코드를 읽어오기

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
		 alert("비밀번호를 입력하세요")
		 pp.pwd.focus();
		 return false;
	 }
	 else
		 return true;
 }
</script>
<table width=500 border=1 cellspacing=0>
<tr>
 <td> 제 목 </td>
 <td> <?=$row->title?> </td>
</tr>
<tr>
 <td> 작성자  </td>
 <td> <?=$row->name?> </td>
</tr>
<tr>
 <td height=180> 내용 </td>
 <td> <?=nl2br($row->content)?> </td>
</tr>
<tr>
 <td> 조회수 </td>
 <td> <?=$row->readnum?> </td>
</tr>
<tr>
 <td> 작성일 </td>
 <td> <?=$row->writeday?> </td>
</tr>
</table>
<a href="update.php?id=<?=$row->id?>&page=<?=$page?>&cla=<?=$cla?>&sear=<?=$sear?>">수정</a> 
<a href="javascript:del()"> 삭 제</a>
<a href="list.php?page=<?=$page?>&cla=<?=$cla?>&sear=<?=$sear?>">목록</a>

<div id=pkc>
 <form method=post action=delete_ok.php onsubmit="return del_check(this)">
 <input type=hidden name=id value=<?=$row->id?>>
 <input type=hidden name=page value="<?=$row->page?>">
 <input type=hidden name=cla value="<?=$row->cla?>">
 <input type=hidden name=sear value="<?=$row->sear?>">
  비밀번호 <input type=password name=pwd size=8>
  <input type=submit value=삭제>
 </form>
</div>
<!-- 출력 -->
<?include "../bottom.php"?>