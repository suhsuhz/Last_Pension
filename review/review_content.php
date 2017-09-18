<?include "../top.php"?>
<? // 하나의 레코드에 전체 내용을 보여줌
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 
//DB접속 관련

$id=$_GET["id"]; // 현재 사용자가 보고자하는 글의 id


$sql="select * from review where id=$id";
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

 function review_del(id) // 댓글의 삭제
 {
	 window.open("dat_del.php?id="+id,"","width=200,height=100");
 }
 function review_update(id) // 댓글의 수정
 {
	 window.open("dat_update.php?id="+id,"","width=300,height=100");
 }
 
</script>
<a href="review_update.php?id=<?=$row->id?>">수정</a> 
<a href="javascript:del()"> 삭 제</a>
<a href="review_list.php">목록</a>

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
 <td> 조회수 </td>
 <td> <?=$row->readnum?> </td>
</tr>
<tr>
 <td> 작성일 </td>
 <td> <?=$row->writeday?> </td>
</tr>
<tr>
 <td height=180> 내용 </td>
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
</table> <!-- 여행후기 끝 -->

<form method=post action=dat_ok.php>
<input type=hidden name=review_id value=<?=$id?>>
<!-- 현재 테이블의 아이디값을 넘겨줌. 그래야 해당 댓글을 출력할때 이 아이디값을 가진 컨텐츠에만 댓글을 가져옴-->
<table width=400> <!-- 댓글달기 입력폼 -->
 <tr> 
  <td><input type=text name=name size=8 placeholder="이 름"></td>
  <td><input type=password name=pwd size=8 placeholder="비밀번호"></td>
  <td rowspan=2><input type=submit value=댓글달기></td>
 </tr>
 <tr> 
  <td colspan=2><textarea name=content rows=3 cols=40 placeholder="댓글을 적어주세요"></textarea></td>
 </tr>
</table>
</form>

<!-- 댓글출력하기 -->
<table width=400>
<?
$sql="select * from dat where review_id=$id"; // 현재글에 달린 댓글만 가져와라
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
for($i=1;$i<=$total;$i++)
{
	$row=mysql_fetch_object($result);
?>
 <tr>
  <td><?=$row->name?></td>
  <td><?=nl2br($row->content)?></td>
  <td> <a href="javascript:review_update(<?=$row->id?>)"> 수정 </a></td>
                                    <!-- 현재댓글의 아이디를 넘겨줌 -->
  <td> <a href="javascript:review_del(<?=$row->id?>)"> 삭제 </a></td>
 </tr> 
<?
}
?>
</table>
<!-- 댓글출력하기 끝 -->


<div id=pkc> <!-- 삭제를 위한 레이어 -->
 <form method=post action=review_delete_ok.php>
 <input type=hidden name=id value=<?=$row->id?>>
  비밀번호 <input type=password name=pwd size=8>
  <input type=submit value=삭제>
 </form>
</div>
<!-- 출력 -->
<?include "../bottom.php"?>