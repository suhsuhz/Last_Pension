<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);
// DB접속관련

$pwd=$_POST["pwd"];
$title=$_POST["title"];
$content=$_POST["content"];
$id=$_POST["id"];
$page=$_POST["page"];
$cla=$_POST["cla"];
$sear=$_POST["sear"];

$sql="select * from board where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result); //$row -> pwd;가 DB의 비밀번호
// DB에 있는 비밀번호 불러오기

//폼태그에 입력된 값 가져오기

$sql="update board set title='$title',content='$content' where id=$id";


if($pwd==$row->pwd)
{
	mysql_query($sql,$conn);
	Header("location:content.php?id=$id&page=$page&cla=$cla&sear=$sear"); // 하나의 레코드만 보여줌 따라서 꼭 id값을 넘겨야함
}
else 
{
?>
<script>
 alert("비밀먼호가 틀립니다");
 history.back(); // 현재 이전 문서로 돌아가라는 뜻
</script>
<?	
}
// 폼태그에 있는 비밀번호와 DB에 있는 비밀번호가 일치하는지 비교해야함
?>
