<? include "../top.php"?>
<script>
function board_check(pp)
{
  if(pp.name.value=="")
  {
    alert("�̸��� ��������");
    pp.name.focus();
    return false;
  }
  else if(pp.pwd.value=="")
       {
         alert("��й�ȣ�� ��������");
         pp.pwd.focus();
         return false;
       } 
       else if(pp.pwd.value.length>10)
            {
              alert("��й�ȣ�� ���̴� 10���̳��Դϴ�");
              pp.pwd.value="";
              pp.pwd.focus();
              return false;
            }
            else if(pp.title.value=="")
                 {
                   alert("������ �Է��ϼ���");
                   pp.title.focus();
                   return false;
                 } 
                 else if(pp.content.value=="")
                      {
                       alert("������ ��������");
                       pp.content.focus();
                       return false;
                      }
                      else
                       return true;
}
</script>
<form method=post action=write_ok.php onsubmit="return board_check(this)">
<table width=400>
 <caption> �۾��� </caption>
 <tr>
  <td> �� �� </td>
  <td> <input type=text name=name size=10> </td>
 </tr>
  <tr>
  <td> ��й�ȣ </td>
  <td> <input type=password name=pwd size=9>  <font color=red>*</font> 10���̳� </td>
 </tr>
 <tr>
  <td> �� �� </td>
  <td> <input type=text name=title size=40> </td>
 </tr>
 <tr>
  <td> �� �� </td>
  <td> <textarea rows=10 cols=40 name=content></textarea> </td>
 </tr>
 <tr>
  <td colspan=2 align=center> 
    <input type=submit value=����> <input type=reset value=���>
  </td>
 </tr>
</table>
</form>
<? include "../bottom.php"?>