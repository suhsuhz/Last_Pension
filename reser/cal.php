<?
$last_day = date("t", time()); // 해당월의 마지막날 / 현재 월의 총 일수

$start_week = date("w", strtotime(date("Y-m")."-01")); //  해당년월의 1일의 시작요일 구하기

$total_week = ceil(($last_day + $start_week) / 7);  // 총 몇 주인지 구하기

$last_week = date('w', strtotime(date("Y-m")."-".$last_day)); //  마지막 요일 구하기
?>
<table width="600" border="1" bordercolor="pink" cellspacing="0">
  <tr align="center" >
    <td height="50" colspan="7">
	  <?=date("Y년 n월")?>
	</td>
  </tr>
  <tr align=center>
    <td height="50" bgcolor="lightgray">일</td>
    <td bgcolor="lightgray">월</td>
    <td bgcolor="lightgray">화</td>
    <td bgcolor="lightgray">수</td>
    <td bgcolor="lightgray">목</td>
    <td bgcolor="lightgray">금</td>
    <td bgcolor="lightgray">토</td>
  </tr>
        
<?
 $day=1;  //  화면에 표시할 날짜를 1부터 시작
 for($i=1;$i<=$total_week;$i++) // 총 주수에 따른 행 만들기
 {
?>
  <tr>
<?
  for ($j=0;$j<7;$j++)  //  일~월 까지 열 만들기
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
    if($i==1 && $j<$start_week) // 첫번째행에서 1일의 요일보다 j의 값이 작다면  빈칸으로 출력
    	echo "&nbsp;";
    else if($i==$total_week && $j>$last_week) // 마지막행에서 마지막일의 요일보다 j가 크면 빈칸
              echo "&nbsp;";
         else 
         {
           echo "<font color=$co>".$day."</font>";
           $day++;
         }
?>
     </td>
<?
  }    //  두번째 for 종료
?>
  </tr>
<?
 }     //  첫번째 for 종료
?>
</table> 