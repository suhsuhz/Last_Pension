<? include "../top.php"?>
<script>
function board_check(pp)
{
  if(pp.name.value=="")
  {
    alert("이름을 적으세요");
    pp.name.focus();
    return false;
  }
  else if(pp.pwd.value=="")
       {
         alert("비밀번호를 적으세요");
         pp.pwd.focus();
         return false;
       } 
       else if(pp.pwd.value.length>10)
            {
              alert("비밀번호의 길이는 10자이내입니다");
              pp.pwd.value="";
              pp.pwd.focus();
              return false;
            }
            else if(pp.title.value=="")
                 {
                   alert("제목을 입력하세요");
                   pp.title.focus();
                   return false;
                 } 
                 else if(pp.content.value=="")
                      {
                       alert("내용을 적으세요");
                       pp.content.focus();
                       return false;
                      }
                      else
                       return true;
}
</script>
<form method=post action=write_ok.php onsubmit="return board_check(this)">
<table width=400>
 <caption> 글쓰기 </caption>
 <tr>
  <td> 이 름 </td>
  <td> <input type=text name=name size=10> </td>
 </tr>
  <tr>
  <td> 비밀번호 </td>
  <td> <input type=password name=pwd size=9>  <font color=red>*</font> 10자이내 </td>
 </tr>
 <tr>
  <td> 제 목 </td>
  <td> <input type=text name=title size=40> </td>
 </tr>
 <tr>
  <td> 내 용 </td>
  <td> <textarea rows=10 cols=40 name=content></textarea> </td>
 </tr>
 <tr>
  <td colspan=2 align=center> 
    <input type=submit value=저장> <input type=reset value=취소>
  </td>
 </tr>
</table>
</form>
<? include "../bottom.php"?>