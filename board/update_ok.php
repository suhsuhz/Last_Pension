<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);
// DB���Ӱ���

$pwd=$_POST["pwd"];
$title=$_POST["title"];
$content=$_POST["content"];
$id=$_POST["id"];
$page=$_POST["page"];
$cla=$_POST["cla"];
$sear=$_POST["sear"];

$sql="select * from board where id=$id";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_object($result); //$row -> pwd;�� DB�� ��й�ȣ
// DB�� �ִ� ��й�ȣ �ҷ�����

//���±׿� �Էµ� �� ��������

$sql="update board set title='$title',content='$content' where id=$id";


if($pwd==$row->pwd)
{
	mysql_query($sql,$conn);
	Header("location:content.php?id=$id&page=$page&cla=$cla&sear=$sear"); // �ϳ��� ���ڵ常 ������ ���� �� id���� �Ѱܾ���
}
else 
{
?>
<script>
 alert("��и�ȣ�� Ʋ���ϴ�");
 history.back(); // ���� ���� ������ ���ư���� ��
</script>
<?	
}
// ���±׿� �ִ� ��й�ȣ�� DB�� �ִ� ��й�ȣ�� ��ġ�ϴ��� ���ؾ���
?>
