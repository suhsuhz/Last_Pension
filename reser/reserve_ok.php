<?
session_start();
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); // mysql -uroot -apmsetup
mysql_select_db($dbname,$conn); // DB���Ӱ� ����� �����ͺ��̽� ����
//DB���Ӱ���
// post�� �Ѿ���� �� ��������

$name=$_POST["name"];  // �̸�
$bang=$_POST["bang"];  // ���Ǹ�
$price=$_POST["price"];  // ���ǰ���(�����ϼ��� ���Ե� ����)
$s_day=$_POST["s_day"];  // üũ�� ��¥
$e_day=$_POST["e_day"];  // üũ�ƿ� ��¥


// cal3.php�� �������� ��¥���ؼ� =�� �������� �ʴ´ٸ�
//$e_day=date("Y-m-d",strtotime("e_day"-60*60*24)); ��� ó���ϸ� ��
$suk=$_POST["suk"]; // �����ϼ�
$phone=$_POST["phone1"]."-".$_POST["phone2"]."-".$_POST["phone3"];

$writeday=date("Y-m-d"); // �ۼ���(���೯¥)


// �ߺ�üũ�ϱ�
$test=Array(); 
// üũ�κ��� ������ ���ڸ� �迭�� ����� ���� ex) 15~16�� ���� 15,16�� ��¥������ ����
$test[0]=strtotime($s_day); // ���ڽ������� test�迭�� 0�� �ε����� �־���
for($i=1;$i<$suk;$i++)
{
	$aa=strtotime($s_day); // $s_day�� ���ڽ����� => �ʴ����ΰ�����
	$aa=$aa+((60*60*24)*$i); // 
	$test[$i]=$aa;
}

// 5��10�Ϻ��� 3���� �Ѵٸ�?
// [0] = 5�� 10���� �ʴ����ð� , [1] = 5�� 11�� , [2] = 5�� 12��

$c=count($test); // == �����ϼ�. (test�迭�� ũ��)

$ch=Array(); // �ߺ��Ǵ� ��¥�� ���� �迭
$arr_num=0;
for($i=0;$i<$c;$i++)
{
	$ch_day=date("Y-m-d",$test[$i]); // 0������ �ʴ��� �迭�� ��-��-�� date������ �ٲ۴�.
	$sql="select * from reserve where ";
	$sql=$sql." s_day <= '$ch_day' and e_day > '$ch_day' and bang='$bang'";
	$result=mysql_query($sql,$conn);
	$total=mysql_affected_rows();
	if($total) // ���ڵ带 �о�ͼ� total�� 1�� ���� �����ٸ� 
	{
		$ch[$arr_num]=$ch_day; // $ch[i]�� �ߺ��� ���೯¥�� �Է�
		$arr_num++;
	}
}

$c=count($ch); // ������ �����ٸ� $c=0 �̰� ������ �����Ѵٸ� $c�� 1�̻��� ���� �ȴ�...
$imsi="";
for($i=0;$i<$c;$i++)
	$imsi=$imsi." ".$ch[$i];
	if($c)  // ������ �ִٸ�
	{
		?>
 <script>
 alert("<?=$imsi?>�ߺ��˴ϴ�");
 location="cal3.php";
 </script>
 <?
 echo $imsi."dd".$c;	
}
else
{
	if($_SESSION["userid"]=="")
		$userid="guest";
	else 
		$userid=$_SESSION["userid"];

$sql="insert into reserve(userid,name,bang,price,s_day,e_day,suk,phone,writeday) ";
$sql=$sql."values('$userid','$name','$bang',$price,'$s_day','$e_day',";
$sql=$sql."$suk,'$phone','$writeday')";
mysql_query($sql,$conn);
Header("location:cal3.php");
}
?>