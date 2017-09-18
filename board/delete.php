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
?>

<form method=post border=1 action="delete_ok.php">
<input type=hidden name=id value=<?=$id?>>
<input type=hidden name=page value=<?=$page?>>
<input type=hidden name=cla value=<?=$cla?>>
<input type=hidden name=sear value=<?=$sear?>>
<table width=300>
<tr>
 <td width=80>비밀번호 입력</td>
 <td><input type=password name=pwd size=9></td>
</tr>
<tr>
<td width=120 align=center>
<input type=submit value="삭제"> <input type=reset value="취소">
</td>
<tr>
</table>
</form>