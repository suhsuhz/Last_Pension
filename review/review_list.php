<?include "../top.php" // ../ =>상위폴더?>
<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn); 

$sql="select * from review order by id desc"; // 가장 최근의 글을 첫번째로 가져옴
		
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows(); // 레코드의 갯수
?>

<style>
a {text-decoration:none;color:black} <? // 밑줄 없애고 색을 검정으로 ?>
a:hover {text-decoration:underline;color:green} <? // 마우스 올라가면 밑줄 ?>
</style>

<table width=600 border=1 cellspacing=0 bgcolor=#e4eff1>
<tr>
 <td>이 름</td>
 <td>제 목</td>
 <td>작성일</td>
 <td>조회수</td>
</tr>
<?
// ($page-1)*10  or  ($page*10)-10;
$page=$_GET["page"]; // get으로 넘긴 페이지값을 읽어옴
if($page=="") 
	$page=1;  // 만약  페이지 주소 없이 http://localhost/board/list.php로 들어온다면 1페이지를 보여줘라
	
$page_start=($page-1)*10;

mysql_data_seek($result,$page_start); 
for($i=1;$i<=10;$i++) // 1페이지를 10개의 레코드갯수로 하겠다.
{
	$row=mysql_fetch_object($result);
	if($row->name=="")
		break;
?>
 <tr>
 <td width=100><?=$row->name?></td>
 <td><a href="review_content_imsi.php?id=<?=$row->id?>"><?=$row->title?></a></td>
 <td><?=$row->writeday?></td>
 <td width=50 align=center><?=$row->readnum?></td>
 </tr>
<?
}
?>
<tr>
 <td colspan=4 align=center>
<?
// $start는 게시판에 현재페이지를 기준으로 표시할 시작페이지값
// $end는 게시판에 현재페이지를 기준으로 표시할 끝페이지값 
// $start값은 현재페이지($page) 1~10페이지
//  $start=1; $start=11 $start=21....

$start=floor($page/10);  // 1~9=0 이 나옴. floor은 소숫점을 버린다는 뜻
if($page%10==0)
	$start=$start-1;
$start=intVal($start."1"); // intVal:숫자형으로 만들기(1페이지가 01이라고 뜨는 경우 방지하기 위해) / . 은 연결연산자

$end=$start+9; // 현재 화면에서 가장끝에 출력될 페이지

$total_page=$total/10; // 페이지를 10개씩 나눴으니까 10을 나누고 소숫점을 버리고 +1을 하면 마지막 페이지가 나옴
$total_page=floor($total_page)+1;
if($total_page%10==0) // 단 레코드 갯수가 10으로 나누어 떨어질 때는 +1을 해주면 안됨
	$total_page=$total_page-1;
if($total_page<$end)  // $end가 전체페이지보다 크다면
	$end=$total_page;  
if($start!=1)
{
?>
<a href="review_list.php?page=<?=$start-1?>">←</a>
<?}?>
<?
if($page!=1) // 1페이지일 때는 사용하지 않는다
{
?>
<a href="review_list.php?page=<?=$page-1?>">◀</a>
<?
}	
for($i=$start;$i<=$end;$i++) // $start부터 $end까지 출력
{
	if($page==$i) // 현재페이지와 출력하는 페이지수하고 같을 경우
	{
?>
<font color=blue><?=$i?></font>
<?
	}
	else
	{
?>
<a href="review_list.php?page=<?=$i?>"><?=$i?></a>
<?
	} // else의 끝
} // for의 끝 


if($page!=$total_page) // 마지막 페이지값와 현재 페이지값이 같다면 실행하지 않는다.
{
?>
<a href="review_list.php?page=<?=$page+1?>">▶</a>
<?
}
if($total_page!=$end)
{
?>
<a href="review_list.php?page=<?=$end+1?>">→</a>
<?}?>
 </td>
</tr>
</table>
<a href="review_write.php">글쓰기</a>
</form>

<?include "../bottom.php"?>