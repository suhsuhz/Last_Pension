<?
$last_day = date("t", time()); // �ش���� �������� / ���� ���� �� �ϼ�

$start_week = date("w", strtotime(date("Y-m")."-01")); //  �ش����� 1���� ���ۿ��� ���ϱ�

$total_week = ceil(($last_day + $start_week) / 7);  // �� �� ������ ���ϱ�

$last_week = date('w', strtotime(date("Y-m")."-".$last_day)); //  ������ ���� ���ϱ�
?>
<table width="600" border="1" bordercolor="pink" cellspacing="0">
  <tr align="center" >
    <td height="50" colspan="7">
	  <?=date("Y�� n��")?>
	</td>
  </tr>
  <tr align=center>
    <td height="50" bgcolor="lightgray">��</td>
    <td bgcolor="lightgray">��</td>
    <td bgcolor="lightgray">ȭ</td>
    <td bgcolor="lightgray">��</td>
    <td bgcolor="lightgray">��</td>
    <td bgcolor="lightgray">��</td>
    <td bgcolor="lightgray">��</td>
  </tr>
        
<?
 $day=1;  //  ȭ�鿡 ǥ���� ��¥�� 1���� ����
 for($i=1;$i<=$total_week;$i++) // �� �ּ��� ���� �� �����
 {
?>
  <tr>
<?
  for ($j=0;$j<7;$j++)  //  ��~�� ���� �� �����
  {
  	if($j==0)
  		$co="red";
    else if($j==6)
    	   $co="blue";
         else 
           $co="black";
?>      
    <td height="50" align="center" bgcolor="#FFFFFF">
<?
    if($i==1 && $j<$start_week) // ù��°�࿡�� 1���� ���Ϻ��� j�� ���� �۴ٸ�  ��ĭ���� ���
    	echo "&nbsp;";
    else if($i==$total_week && $j>$last_week) // �������࿡�� ���������� ���Ϻ��� j�� ũ�� ��ĭ
              echo "&nbsp;";
         else 
         {
           echo "<font color=$co>".$day."</font>";
           $day++;
         }
?>
     </td>
<?
  }    //  �ι�° for ����
?>
  </tr>
<?
 }     //  ù��° for ����
?>
</table> 