<?
include "../top.php";
$hostname="localhost";
$dbname="suhz";
$userid="root";
$pwd="apmsetup";

$conn=mysql_connect($hostname,$userid,$pwd); 
mysql_select_db($dbname,$conn);
// DB���Ӱ���

$name=$_POST["name"];
$birth=$_POST["birth"];
//�� ��������
$sql="select * from member where name='$name' and birth='$birth'";
$result=mysql_query($sql,$conn);
$total=mysql_affected_rows();
$row=mysql_fetch_object($result);
if($total==0) // ������ ��ġ���� �ʴ´�
{
	?>
   ��ġ�ϴ� ȸ�������� �����ϴ�..<p>
   <form method=post action=user_id.php>
     <table> <!-- �������̺� ���� -->
      <tr>
       <td> �̸� </td>
       <td> <input type=text name=name size=6> </td>
      </tr>
      <tr>
       <td> �������</td>
       <td> <input type=text name=birth size=6> </td>
      </tr>
      <tr>
       <td colspan=2> <input type=submit value=���̵�ã��> </td>
      </tr>
     </table> <!--  ���� ���̺� �� -->
    </form>
<?	
}
else  
{
	echo "����� ���̵�� ".$row->userid." �Դϴ�";
}
	
include "../bottom.php";
?>
