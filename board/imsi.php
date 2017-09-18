<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); // mysql -uroot -apmsetup
mysql_select_db($dbname,$conn); // DB접속과 사용할 데이터베이스 선택
// DB접속관련

$name="글쓴이";
$pwd="1234";
$title="게시판 테스트";
$content="게시판 글 내용";
$writeday=date("Y-m-d"); // 2017-04-07

//폼에입력된 값을 불러오기=> 저장할 값을 가져오기(폼에서 가져오지 않는 값은 여기서 만들어야 된다)
for($i=1;$i<=15928;$i++)
{
	$name="저자 $i";
	$pwd="1234";
	$title="게시판 테스트 $i 번째 글";
	$content="게시판 $i 번째 글 내용";
	$sql="insert into board(name,pwd,title,content,writeday,readnum)";
	$sql=$sql." values('$name','$pwd','$title','$content','$writeday',0)";
	mysql_query($sql,$conn);
	// 입력쿼리 실행
}

Header("location:list.php");
// 입력후 이동할 문서
?>