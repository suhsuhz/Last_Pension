<?
include "../top.php";
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); 
mysql_select_db($dbname,$conn);
// DB접속관련

$name=$_POST["name"];
$birth=$_POST["birth"];
//값 가져오기
$sql="select * from member where name='$name' and birth='$birth'";
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
$row=mysql_fetch_object($result);
if($total==0) // 정보가 일치하지 않는다
{
	?>
   일치하는 회원정보가 없습니다..<p>
   <form method=post action=user_id.php>
     <table> <!-- 내부테이블 시작 -->
      <tr>
       <td> 이름 </td>
       <td> <input type=text name=name size=6> </td>
      </tr>
      <tr>
       <td> 생년월일</td>
       <td> <input type=text name=birth size=6> </td>
      </tr>
      <tr>
       <td colspan=2> <input type=submit value=아이디찾기> </td>
      </tr>
     </table> <!--  내부 테이블 끝 -->
    </form>
<?	
}
else  
{
	echo "당신의 아이디는 ".$row->userid." 입니다";
}
	
include "../bottom.php";
?>
