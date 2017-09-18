<?
include "../top.php";
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$name=$_POST["name"];
$userid=$_POST["userid"];
$birth=$_POST["birth"];
$sql="select * from member where name='$name' and userid='$userid' and birth='$birth'";
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
$row=mysql_fetch_object($result);

if($total==0)
{
?>
일치하는 정보가 없습니다
	<form method=post action=user_pwd.php>
	<table> <!-- 내부테이블 시작부분 -->
	<tr>
	<td> 이름 </td>
	<td> <input type=text name=name size=6> </td>
	</tr>
	<tr>
	<td> 아이디 </td>
	<td> <input type=text name=userid size=6> </td>
	</tr>
	<tr>
	<td> 생년월일 </td>
	<td> <input type=text name=birth size=6> </td>
	</tr>
	<tr>
	<td colspan=2> <input type=submit value=비밀번호찾기> </td>
	</tr>
	</table> <!-- 내부테이블 끝부분 -->
	</form>
<?
}
else
{
	echo "당신의 비밀번호는 ".$row->pwd." 입니다";
}
?>

<? include "../bottom.php"?>
