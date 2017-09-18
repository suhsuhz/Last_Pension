<?php
session_start();
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd);
mysql_select_db($dbname,$conn);

$zip=$_POST["zip"];
$juso1=$_POST["juso1"];
$juso2=$_POST["juso2"];
$phone=$_POST["phone1"]."-".$_POST["phone2"]."-".$_POST["phone3"];

$sql="update member set zip='$zip',juso1='$juso1',juso2='$juso2',phone='$phone' where userid='$_SESSION[userid]'";
mysql_query($sql,$conn);

Header("location:/pension/index.php");
?>