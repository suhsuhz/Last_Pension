<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);
// DB���Ӱ���

$name=$_POST["name"];
$pwd=$_POST["pwd"];
$title=$_POST["title"];
$content=$_POST["content"];

//�����Էµ� ���� �ҷ�����=> ������ ���� ��������(������ �������� �ʴ� ���� ���⼭ ������ �ȴ�)

$sql="insert into board(name,pwd,title,content,readnum)";
$sql=$sql." values('$name','$pwd','$title','$content',0)";
mysql_query($sql,$conn);
// �Է����� ����

Header("location:reserve_view.php");
// �Է��� �̵��� ����
?>
