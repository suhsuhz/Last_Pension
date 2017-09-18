<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);
// DB접속관련

$name=$_POST["name"];
$pwd=$_POST["pwd"];
$title=$_POST["title"];
$content=$_POST["content"];

//폼에입력된 값을 불러오기=> 저장할 값을 가져오기(폼에서 가져오지 않는 값은 여기서 만들어야 된다)

$sql="insert into board(name,pwd,title,content,readnum)";
$sql=$sql." values('$name','$pwd','$title','$content',0)";
mysql_query($sql,$conn);
// 입력쿼리 실행

Header("location:reserve_view.php");
// 입력후 이동할 문서
?>
