<?
session_start();  // 세션변수를 만들거나 사용하려면 무조건 추가
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$userid=$_POST["userid"];
$pwd=$_POST["pwd"];
// 넘어온 값을 가져오기

$sql="select * from member where userid='$userid' and pwd='$pwd'";
//쿼리작성 $useid와 $pwd(넘어온 값)와 같은 값을 DB에서 불러와라
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();

if($total==0) // 아이디와 비밀번호가 맞다.
{
	Header("location:login.php"); // 틀릴경우 이동할 문서
}
else // 아이디와 비밀번호가 틀리다.
{
	$row=mysql_fetch_object($result);
	$_SESSION["userid"]=$row->userid;
	$_SESSION["pwd"]=$row->pwd;
	$_SESSION["name"]=$row->name;
	Header("location:/pension/index.php");
}
?>