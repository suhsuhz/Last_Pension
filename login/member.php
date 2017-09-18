<? include "../top.php"?>
<script>
function id_check()
{
  userid=document.pkc.userid.value;
  window.open("id_check.php?userid="+userid,"","width=300,height=200");
}
function check(pp) // pp = document.pkc
{
  if(pp.userid.value.length<6||pp.userid.value.length>10)
  {
    alert("아이디는 6~10자 가능합니다");
    pp.userid.value="";
    pp.userid.focus();
    return false;
  }
  else if(pp.pwd.value.length<6||pp.pwd.value.length>10)
       { 
         alert("비밀번호는 6~10자 가능합니다");
         pp.pwd.value="";
         pp.pwd.focus();
         return false;
       }
       else if(pp.name.value=="")
            {
              alert("이름을 입력하세요");
              pp.name.focus();
              return false;
            }
            else if(pp.zip.value.length!=5)
                 {
                   alert("우편번호는 5자리입니다");
                   pp.zip.value="";
                   pp.zip.focus();
                   return false;
                 }
                 else if(pp.birth.value.length!=8)
                      {
                        alert("생일은 8자리로 입력하세요");
                        pp.birth.value="";
                        pp.birth.focus();
                        return false;
                      }
                      else
                        return true;
}
</script>
 <form name=pkc method=post action=member_ok.php onsubmit="return check(this)">
  <table>
   <caption> <h2> 회 원 가 입 </h2> </caption>
   <tr>
    <td> 사용자 아이디 </td>
    <td>
      <input type=text name=userid size=10> 
      <input type=button value=중복확인 onclick=id_check()>
    </td>   
   </tr>
   <tr>
    <td> 비밀번호 </td>
    <td> <input type=password name=pwd size=9> </td>   
   </tr>
   <tr>
    <td> 이 름 </td>
    <td> <input type=text name=name size=10> </td>   
   </tr>
   <tr>
    <td> 우편번호 </td>
    <td> <input type=text name=zip size=6> </td>   
   </tr>
   <tr>
    <td> 주 소 </td>
    <td> <input type=text name=juso1 size=30> </td>   
   </tr>
   <tr>
    <td> 나머지주소 </td>
    <td> <input type=text name=juso2 size=20> </td>   
   </tr>
   <tr>
    <td> 생년월일 </td>
    <td> <input type=text name=birth size=10> </td>   
   </tr>
   <tr>
    <td> 전화 번호 </td>
    <td>
      <input type=text name=phone1 size=4> - 
      <input type=text name=phone2 size=4> - 
      <input type=text name=phone3 size=4>
    </td>   
   </tr>
   <tr>
    <td colspan=2 align=center> <input type=submit value=회원가입> </td>
   </tr>
  </table>
 </form>
<? include "../bottom.php"?>