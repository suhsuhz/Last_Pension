<?
session_start();
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); // mysql -uroot -apmsetup
mysql_select_db($dbname,$conn); // DB접속과 사용할 데이터베이스 선택
//DB접속관련
// post로 넘어오는 값 가져오기

$name=$_POST["name"];  // 이름
$bang=$_POST["bang"];  // 객실명
$price=$_POST["price"];  // 객실가격(숙박일수가 포함된 가격)
$s_day=$_POST["s_day"];  // 체크인 날짜
$e_day=$_POST["e_day"];  // 체크아웃 날짜


// cal3.php의 쿼리에서 날짜비교해서 =를 생략하지 않는다면
//$e_day=date("Y-m-d",strtotime("e_day"-60*60*24)); 라고 처리하면 됨
$suk=$_POST["suk"]; // 숙박일수
$phone=$_POST["phone1"]."-".$_POST["phone2"]."-".$_POST["phone3"];

$writeday=date("Y-m-d"); // 작성일(예약날짜)


// 중복체크하기
$test=Array(); 
// 체크인부터 숙박할 일자를 배열로 나누어서 저장 ex) 15~16일 숙박 15,16의 날짜정보를 저장
$test[0]=strtotime($s_day); // 숙박시작일을 test배열에 0번 인덱스에 넣어줌
for($i=1;$i<$suk;$i++)
{
	$aa=strtotime($s_day); // $s_day는 숙박시작일 => 초단위로가져옴
	$aa=$aa+((60*60*24)*$i); // 
	$test[$i]=$aa;
}

// 5월10일부터 3박을 한다면?
// [0] = 5월 10일의 초단위시간 , [1] = 5월 11일 , [2] = 5월 12일

$c=count($test); // == 숙박일수. (test배열의 크기)

$ch=Array(); // 중복되는 날짜를 넣을 배열
$arr_num=0;
for($i=0;$i<$c;$i++)
{
	$ch_day=date("Y-m-d",$test[$i]); // 0번방의 초단위 배열을 년-월-일 date형으로 바꾼다.
	$sql="select * from reserve where ";
	$sql=$sql." s_day <= '$ch_day' and e_day > '$ch_day' and bang='$bang'";
	$result=mysql_query($sql,$conn);
	$total=mysql_affected_rows();
	if($total) // 레코드를 읽어와서 total이 1의 값을 가진다면 
	{
		$ch[$arr_num]=$ch_day; // $ch[i]에 중복된 예약날짜를 입력
		$arr_num++;
	}
}

$c=count($ch); // 예약이 없었다면 $c=0 이고 예약이 존재한다면 $c는 1이상의 값이 된다...
$imsi="";
for($i=0;$i<$c;$i++)
	$imsi=$imsi." ".$ch[$i];
	if($c)  // 예약이 있다면
	{
		?>
 <script>
 alert("<?=$imsi?>중복됩니다");
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