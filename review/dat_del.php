<?
$id=$_GET["id"];
?>
<form method=post action=dat_del_ok.php>
 <input type=hidden name=id value=<?=$id?>>
비밀번호 <input type=password name=pwd><p>
<input type=submit value=삭제>
</form>