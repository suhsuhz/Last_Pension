<?include "../top.php"?>
<form method=post action=write_ok.php>
<table>
<caption>공지사항</caption>
 <tr>
  <td>제목</td>
  <td><input type=text name=title size=30></td>
 </tr>
 <tr>
  <td>내용</td>
  <td><textarea rows=20 cols=60 name=content></textarea></td>
 </tr>
 <tr>
  <td colspan=2 align=center><input type=submit value=전송><input type=reset value=취소></td>
 </tr>
</table>
</form>
<?include "../bottom.php"?>