<?include "../top.php"?>
<script>
function add()
{
	img_add.innerHTML=img_add.innerHTML+"<table><tr><td>�� ��</td> <td><input type=file name=fname[]></td></tr> <tr><td>����</td> <td><textarea cols=30 rows=3 name=content[]></textarea></td></tr></table>"
}
</script>
<form method=post action=review_write_ok.php  enctype="multipart/form-data">
<table border=0 width=400>
<caption>�����ı�</caption>
 <tr>
  <td> �� �� </td>
  <td> <input type=text name=title> </td>
 </tr>
 <tr>
  <td> �� �� </td>
  <td> 
    <input type=text name=name>
     <input type=button onclick=add() value=�߰�>
  </td>
 </tr>
 <tr>
 <td colspan=2>
   <div id=img_add>
    <table border=0 cellspacing=0>
     <tr>
      <td> �� �� </td>
      <td> <input type=file name=fname[]> </td>
     </tr>
     <tr>
      <td> �� �� </td>
      <td> <textarea cols=30 rows=3 name=content[]></textarea> </td>
     </tr>
   </table>
  </div>
 </td>
 </tr>

 <tr>
  <td colsapn=2><input type=submit value=����></td>
 </tr>
</table>
</form>
<?include "../bottom.php"?>