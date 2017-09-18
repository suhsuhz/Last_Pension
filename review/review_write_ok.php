<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$title=$_POST["title"];
$name=$_POST["name"];
$fname=$_FILES["fname"]["name"]; // 파일이름 0부터 시작
$content=$_POST["content"];  // 내용 0부터 시작
$writeday=date("Y-m-d");

$ch=count($fname);
$field="";
$cont="";
$field_value="";
$cont_value="";
for($i=0;$i<$ch;$i++) // 테이블에 필드명은 fname1
{
	$field=$field."fname".($i+1).",";  // fname1~fname5
	$cont=$cont."content".($i+1).",";  // content1 ~ content5;
	
	$field_value=$field_value."'$fname[$i]'".",";
	$cont_value=$cont_value."'$content[$i]'".",";
}

$sql="insert into review(name,$field $cont writeday,readnum,title)";
$sql=$sql." values('$name',$field_value $cont_value '$writeday',0,'$title')";
//$sql="insert into review(name,fname1,content1,fname2,content2,writeday,readnum,title)";
//$sql=$sql." values('$name','$fname1','$content1','$fname2','$content2','$writeday',0,'$title')";
mysql_query($sql,$conn);
for($i=0;$i<count($fname);$i++)
	move_uploaded_file($_FILES["fname"]["tmp_name"][$i],"file/".$fname[$i]);
//move_uploaded_file($_FILES["fname1"]["tmp_name"],"file/".$fname1);
//move_uploaded_file($_FILES["fname2"]["tmp_name"],"file/".$fname2);
// 파일이 두개니까 두번!

Header("location:review_list.php");
?>
