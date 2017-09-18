<?
include "../top.php";
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); // mysql -uroot -apmsetup
mysql_select_db($dbname,$conn); // DB접속과 사용할 데이터베이스 선택
// DB접속관련

$cla=$_GET["cla"]; // 제목 or 내용
$sear=$_GET["sear"]; //검색단어 // $cla와 $sear은 언제나 값이 있을까?
// 값 가져오기

if($cla=="")
	$sql="select * from board  order by id desc";
	else
		$sql="select * from board where $cla like '%$sear%'  order by id desc";  // 가장 최근의 글이 첫번째
		
		//echo $sql;
		// board테이블에서 읽어오는 쿼리 작성
		
		$result=mysql_query($sql,$conn);
		$total=mysql_affected_rows(); // 레코드 갯수
		// 쿼리실행하여 레코드집합을 가져오기
		if($cla=="title"||$cla=="")
			$a=0;
			else if($cla=="content")
				$a=1;
				?>
<script>
function cla_in()
{
  document.search.cla.selectedIndex=<?=$a?>;
}
function bg1(pp) //pp => tr태그
{
  pp.style.backgroundColor="#e4eff1";	
}
function bg2(pp)
{
  pp.style.backgroundColor="white";	
}
</script>
<body onload=cla_in()>
<table width=500 border=0 cellspacing=0>
 <caption> <h2> 게시판 </h2></caption>
 <tr>
   <td colspan=4 align=right>
    <form name=search method=get action=list.php>
      <select name=cla style="font-size:9pt">
       <option value=title> 제목 </option>
       <option value=content> 내용 </option>
      </select>
      <input type=text name=sear value="<?=$sear?>" size=10 style="font-size:9pt">
      <input type=submit value=검색 style="font-size:9pt">
    </form>
  </td>
 </tr>  <!-- 검색을 위한 행을 추가 -->
 <tr>
  <td> 이 름 </td>
  <td> 제 목 </td>
  <td> 작성일 </td>
  <td> 조회수 </td>
 </tr>
<?

  // ($page-1)*10     ,   ($page*10)-10;
$page=$_GET["page"]; // page값을 읽어오기

if($page=="") // 게시판에 처음 접근할때
  $page=1;  // 현재라인 이후가 되면 $page에는 현재페이지값을 가진다...
  
$page_start=($page-1)*10; // 원하는페이지의 시작레코드번호

mysql_data_seek($result,$page_start);  // 두번째 매개값을 조정함으로써 페이지를 나눌수 있다!!
    // 0번레코드로 가라!!  => 가장 첫번째 값 => 1페이지
    // ($result,10) => 2페이지
    // ($result,20) => 3페이지
    // ($result,1010) => 102페이지
 for($i=1;$i<=10;$i++) // 1페이지를 10개의 레코드로 하겠다...
 {
 	if($i%2==0)
 		$col="yellow";
 		else
 			$col="white";
 	
   $row=mysql_fetch_object($result);
   if($row->name=="")
   	break;
?> 	
 <tr bgcolor="<?=$col?>" onmouseover="bg1(this)" onmouseout="bg2(this)">  <!-- 게시판내용 출력행 -->
  <td> <?=$row->name?> </td>
  <td> <a href="content_imsi.php?id=<?=$row->id?>&page=<?=$page?>&cla=<?=$cla?>&sear=<?=$sear?>"> <?=$row->title?> </a> </td>
  <td> <?=$row->writeday?> </td>
  <td> <?=$row->readnum?> </td>
 </tr>
<?
 }
// 테이블의 형태로 출력하기
?>
 <tr>
  <td colspan=4 align=center>
  <?
   // $start는 게시판에 현재페이지를 기준으로 표시할 시작페이지값
   // $end 는 게시판에 현재페이지를 기준으로 표시할 끝페이지값
   // $start값은  현재페이지($page)의 값이 1~10이라면  $start=1;
   // 값이 11~20 이라면 $start=11;
   // 값이 21~30 이라면 $start=21;
   // 값이 31~40 이라면 $start=31; 이렇게 되야 된다...
   
   $start=floor($page/10);  // 1~9 => 0이 나온다..
   if($page%10==0) // 현재페이지가 10의 배수이면
   	$start=$start-1;
   	
   $start=intVal($start."1"); //숫자형으로 만들기 // 0."1"  => 01 

   $end=$start+9; // 현재화면에서 가장끝에 출력될 페이지
   
   $total_page=$total/10; // ex 15928개라면   $total_page=1592.8
   $total_page=floor($total_page)+1; // 소수점 버리고  +1을 한 값을 준다..  1593
   if($total%10==0)
   	$total_page=$total_page-1;  // 10으로 나누어 떨어지면 위의 +1이 필요없다..
   
   if($total_page<$end) // $end가 전체페이지수보다 크다면
   	  $end=$total_page; // 1593
   	  
   if($start!=1)  // $start 가 1일경우에 실행안되야 된다...
   {
  ?>
   <a href="list.php?page=<?=$start-1?>&cla=<?=$cla?>&sear=<?=$sear?>"> ◀ </a>
  <?
   }
   if($page!=1)  // $page값이 1이 아닐때 참!!!  1페이지 이전은 존재하지 않는다..
   {
  ?>
   <a href="list.php?page=<?=$page-1?>&cla=<?=$cla?>&sear=<?=$sear?>"> ← </a>
  <?
   }
   for($i=$start;$i<=$end;$i++) // $start부터 $end까지 출력
   {
    if($page==$i)  // 현재페이지하고  출력하는 페이지수하고 같을 경우
    {
  ?>
    <font color=#0e7ee9> <?=$i?> </font>
  <?
    }
    else 
    {
  ?> 
    <a href="list.php?page=<?=$i?>&cla=<?=$cla?>&sear=<?=$sear?>"> <?=$i?> </a> 
  <?
    } // else의 끝
   } //for의 끝   // 페이지 출력이 끝
   
  
   if($page!=$total_page)
   {
  ?>
   <a href="list.php?page=<?=$page+1?>&cla=<?=$cla?>&sear=<?=$sear?>"> → </a>
  <?
   }
   if($total_page!=$end) 
   {
  ?>
   <a href="list.php?page=<?=$end+1?>&cla=<?=$cla?>&sear=<?=$sear?>"> ▶ </a>
  <? 
   }
  ?>

  </td>
 </tr>
</table>
<a href="write.php"> 글쓰기 </a>

<? include "../bottom.php"?>