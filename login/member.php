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
    alert("���̵�� 6~10�� �����մϴ�");
    pp.userid.value="";
    pp.userid.focus();
    return false;
  }
  else if(pp.pwd.value.length<6||pp.pwd.value.length>10)
       { 
         alert("��й�ȣ�� 6~10�� �����մϴ�");
         pp.pwd.value="";
         pp.pwd.focus();
         return false;
       }
       else if(pp.name.value=="")
            {
              alert("�̸��� �Է��ϼ���");
              pp.name.focus();
              return false;
            }
            else if(pp.zip.value.length!=5)
                 {
                   alert("�����ȣ�� 5�ڸ��Դϴ�");
                   pp.zip.value="";
                   pp.zip.focus();
                   return false;
                 }
                 else if(pp.birth.value.length!=8)
                      {
                        alert("������ 8�ڸ��� �Է��ϼ���");
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
   <caption> <h2> ȸ �� �� �� </h2> </caption>
   <tr>
    <td> ����� ���̵� </td>
    <td>
      <input type=text name=userid size=10> 
      <input type=button value=�ߺ�Ȯ�� onclick=id_check()>
    </td>   
   </tr>
   <tr>
    <td> ��й�ȣ </td>
    <td> <input type=password name=pwd size=9> </td>   
   </tr>
   <tr>
    <td> �� �� </td>
    <td> <input type=text name=name size=10> </td>   
   </tr>
   <tr>
    <td> �����ȣ </td>
    <td> <input type=text name=zip size=6> </td>   
   </tr>
   <tr>
    <td> �� �� </td>
    <td> <input type=text name=juso1 size=30> </td>   
   </tr>
   <tr>
    <td> �������ּ� </td>
    <td> <input type=text name=juso2 size=20> </td>   
   </tr>
   <tr>
    <td> ������� </td>
    <td> <input type=text name=birth size=10> </td>   
   </tr>
   <tr>
    <td> ��ȭ ��ȣ </td>
    <td>
      <input type=text name=phone1 size=4> - 
      <input type=text name=phone2 size=4> - 
      <input type=text name=phone3 size=4>
    </td>   
   </tr>
   <tr>
    <td colspan=2 align=center> <input type=submit value=ȸ������> </td>
   </tr>
  </table>
 </form>
<? include "../bottom.php"?>