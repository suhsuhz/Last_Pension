<?
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$userid=$_POST["userid"];
$pwd=$_POST["pwd"];
$name=$_POST["name"];
$zip=$_POST["zip"];
$juso1=$_POST["juso1"];
$juso2=$_POST["juso2"];
$birth=$_POST["birth"];
$phone=$_POST["phone1"]."-".$_POST["phone2"]."-".$_POST["phone3"];
// . 은 연결연산자

$sql="insert into member (userid,pwd,name,zip,juso1,juso2,birth,phone)";
$sql=$sql." values('$userid','$pwd','$name','$zip','$juso1','$juso2','$birth','$phone')";
mysql_query($sql,$conn);

Header("location:../index.php");
?>