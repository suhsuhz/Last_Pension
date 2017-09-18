<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$id=$_GET["id"];
$sql="select * from dat where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result);
?>
<form method=post action=dat_update_ok.php>
<input type=hidden name=id value=<?=$row->id?>>
<table>
<tr>
 <td><input type=text value="<?=$row->name?>" size=5></td>
 <td><input type=password name=pwd size=9 placeholder="비밀번호"></td>
</tr>
<tr>
 <td colspan=2><textarea name=content rows=3 cols=40 <?=$row->content?> placeholder="댓글을 적어주세요"></textarea></td>
</tr>
<tr>
<tr>
 <td colspan=2><input type=submit value=수정></td>
</tr>
</table>
</form>