<? include "../top.php"?>
<script>
function userid_check(pp) // pp=form 
{
	if(pp.name.value=="")
	{
		alert("이름을 입력하세요")
		pp.name.focus();
		return false;
	}
	else if(pp.birth.value.length!=8)
	{
		alert("생일을 8자리로 입력하세요")
		pp.birth.focus();
		return false;
	}
	else
		return true;
	
}
function userpwd_check(pp)
{
	if(pp.userid.value=="")
	{
		alert("아이디를 입력하세요")
		pp.name.focus();
		return false;
	}
	else if(pp.name.value=="")
	{
		alert("이름을 입력하세요")
		pp.name.focus();
		return false;
	}
	else if(pp.birth.value.length!=8)
	{
		alert("생일을 8자리로 입력하세요")
		pp.birth.focus();
		return false;
	}
	else
		return true;
}

</script>
 <table width=400 align=center>
  <tr>
   <td> 
    <form method=post action=user_id.php onsubmit="return userid_check(this)">
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
   </td>  <!-- 아이디 찾기 폼 -->
   <td> 
    <form method=post action=user_pwd.php onsubmit="return userpwd_check(this)">
     <table> <!-- 내부테이블 시작 -->
      <tr>
       <td> 아이디 </td>
       <td> <input type=text name=userid size=6> </td>
      </tr>
      <tr>
       <td> 이름 </td>
       <td> <input type=text name=name size=6> </td>
      </tr>
      <tr>
       <td> 생년월일</td>
       <td> <input type=text name=birth size=6> </td>
      </tr>
      <tr>
       <td colspan=2> <input type=submit value=비밀번호찾기> </td>
      </tr>
     </table> <!--  내부 테이블 끝 -->
    </form>
   </td>  <!-- 비밀번호 찾기 폼 -->
  </tr> 
 </table>
<? include "../bottom.php"?>
