<?include "../top.php"?>
<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$id=$_GET["id"];

$sql="select * from gongji where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result);
?>

</script>
<table width=500 border=1 cellspacing=0>
<tr>
 <td>제목</td>
 <td><?=$row->title?></td>
</tr>
<tr>
 <td>날짜</td>
 <td><?=$row->writeday?></td>
</tr>
<tr>
 <td>조회수</td>
 <td><?=$row->readnum?></td>
</tr>
<tr>
 <td>내용</td>
 <td><?=nl2br($row->content)?></td> <!-- nl2br이 없으면 줄바꿈이 안돼서 출력됨 -->
</tr>
</table>

<?include "../bottom.php"?>