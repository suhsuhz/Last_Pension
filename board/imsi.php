<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); // mysql -uroot -apmsetup
mysql_select_db($dbname,$conn); // DB���Ӱ� ����� �����ͺ��̽� ����
// DB���Ӱ���

$name="�۾���";
$pwd="1234";
$title="�Խ��� �׽�Ʈ";
$content="�Խ��� �� ����";
$writeday=date("Y-m-d"); // 2017-04-07

//�����Էµ� ���� �ҷ�����=> ������ ���� ��������(������ �������� �ʴ� ���� ���⼭ ������ �ȴ�)
for($i=1;$i<=15928;$i++)
{
	$name="���� $i";
	$pwd="1234";
	$title="�Խ��� �׽�Ʈ $i ��° ��";
	$content="�Խ��� $i ��° �� ����";
	$sql="insert into board(name,pwd,title,content,writeday,readnum)";
	$sql=$sql." values('$name','$pwd','$title','$content','$writeday',0)";
	mysql_query($sql,$conn);
	// �Է����� ����
}

Header("location:list.php");
// �Է��� �̵��� ����
?>