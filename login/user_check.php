<? include "../top.php"?>
<script>
function userid_check(pp) // pp=form 
{
	if(pp.name.value=="")
	{
		alert("�̸��� �Է��ϼ���")
		pp.name.focus();
		return false;
	}
	else if(pp.birth.value.length!=8)
	{
		alert("������ 8�ڸ��� �Է��ϼ���")
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
		alert("���̵� �Է��ϼ���")
		pp.name.focus();
		return false;
	}
	else if(pp.name.value=="")
	{
		alert("�̸��� �Է��ϼ���")
		pp.name.focus();
		return false;
	}
	else if(pp.birth.value.length!=8)
	{
		alert("������ 8�ڸ��� �Է��ϼ���")
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
   </td>  <!-- ���̵� ã�� �� -->
   <td> 
    <form method=post action=user_pwd.php onsubmit="return userpwd_check(this)">
     <table> <!-- �������̺� ���� -->
      <tr>
       <td> ���̵� </td>
       <td> <input type=text name=userid size=6> </td>
      </tr>
      <tr>
       <td> �̸� </td>
       <td> <input type=text name=name size=6> </td>
      </tr>
      <tr>
       <td> �������</td>
       <td> <input type=text name=birth size=6> </td>
      </tr>
      <tr>
       <td colspan=2> <input type=submit value=��й�ȣã��> </td>
      </tr>
     </table> <!--  ���� ���̺� �� -->
    </form>
   </td>  <!-- ��й�ȣ ã�� �� -->
  </tr> 
 </table>
<? include "../bottom.php"?>
