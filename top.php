<?
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style>
div.container {
	width: 96%;
	border: 1px black;
}

header, footer {
	padding: 1em;
	color: white;
	background-color: #a7bce7;
	clear: left;
	text-align: center;
}

nav {
	float: left;
	max-width: 160px;
	margin: 0;
	padding: 1em;
	height:400px;
}

nav ul {
	list-style-type: none;
	
	padding: 0;
}
 
nav ul a {
	text-decoration: none;
}

article {
	margin-left: 170px;
	border-left: 1px solid gray;
	padding: 1em;
	overflow: hidden;
	
}
#commu,#res {
    display:none;
}

.login{ 
float:left;
width:180px;
height:75px;
}

a {text-decoration:none;color:black} <? // ���� ���ְ� ���� �������� ?>
a:hover {text-decoration:underline;color:green} <? // ���콺 �ö󰡸� ���� ?>

</style>
<script>
 function view(pp)
 {
   document.getElementById(pp).style.display="inline";
 }
 function hid(pp)
 {
   document.getElementById(pp).style.display="none";
 }
 function del(aa,bb)
 {
	 if(bb==1)
	 {
		 aa.value="";
	 }
       else if(bb==2)
       {
	     aa.value="";
	     aa.type="password";
	     aa.size=6;
       }
 }
 function mov(aa,bb)
 {
	 if(bb==1&&aa.value=="")
	 {
		 aa.value="���̵�";
	 }
	 else if(bb==2&&aa.value=="")
	 {
		 aa.value="��й�ȣ";
		 aa.type="text";
	 }
 }
 function login_check(pp)
 {
	 if(pp.userid.value=="")
	 {
		 alert("���̵� �Է��ϼ���");
		 pp.userid.focus(); // ���̵������� ��Ŀ�� �̵�
		 return false; // submit�� return false�� �� �����. �ƴϸ� ���۵�!
	 }
	 else if(pp.pwd.value=="")
	 {
		 alert("��й�ȣ�� �Է��ϼ���");
		 pp.pwd.focus();
		 return false;
	 }
	 else
	  return true;
 }
</script>
</head>
<body>

<div class="container">

<header>
 <div class=login> 
 <?
 if($_SESSION["userid"]=="") // ���Ǻ����� ���ٸ�
 {
 ?>
 <!-- �α����� ���� �ʾ��� �� ��Ÿ���� ȭ�� -->
   <form method=post action=/pension/login/login_ok.php onsubmit="return login_check(this)">
    <table cellspaning=0 cellpadding=0>
     <tr>
      <td><input type=text name=userid placeholder=���̵� size=7 onfocus=del(this,1) onblur=mov(this,1)></td>
      <td rowspan=2 valign=bottom><input type=submit value=�α���></td>      
         <!-- input type=image�� submit�� ���� ����� ���� -->
     </tr>
     <tr>
      <td> <input type= text name=pwd placeholder=��й�ȣ size=7 onfocus=del(this,2) onblur=mov(this,2)></td> 
     </tr>
     <tr>
      <td colspan=2> <a href="/pension/login/user_check.php" style="color:white">����ã��</a>  | <a href="/pension/login/member.php" style="color:white">ȸ������</a></td>
     </tr>
    </table>
   </form>
 <!-- �α����� ���� �ʾ��� �� ��ȭ�� -->
 <?
 }
 else
 {
 ?>
 <!-- �α����� �Ǿ��� �� ��Ÿ���� ȭ�� -->
    <table cellspaning=0 cellpadding=0>
     <tr>
      <td><?=$_SESSION["name"]?>��</td>
      <td> <a href="/pension/login/member_edit.php" style="color:white">Mypage</a> </td>      
     </tr>
     <tr>
      <td colspan=2> <a href="/pension/login/logout.php" style="color:white">�α׾ƿ�</a></td>
     </tr>
    </table>
 <!-- �α����� �Ǿ��� �� ��ȭ�� -->
<?
}
?> 
 </div>
 <div>
  <h1><a href="/pension/index.php" style="color:white">WINTER HOUSE</a></h1>
 </div>
</header>

<nav>
<ul>
  <li><a href="/pension/sogae.php">��ǼҰ�</a></li>
 <li><a href="#" onmouseover=view("res") onmouseout=hid("res")>�������</a></li>
 <li id=res onmouseover=view("res") onmouseout=hid("res")>
   <ul>
    <li>&nbsp;&nbsp;<a href="/pension/reser/cal3.php">�����ϱ�</a> </li>
    <li>&nbsp;&nbsp;<a href="/pension/reser/reserve_check.php">����Ȯ��</a> </li>
   </ul>
 </li>
 <li><a href="#" onmouseover=view("commu") onmouseout=hid("commu")>Ŀ�´�Ƽ</a></li>
 <li id=commu onmouseover=view("commu") onmouseout=hid("commu")>
 <ul>
  <li>&nbsp;&nbsp;<a href="/pension/gongji/list.php"> �������� </a> </li>
  <li>&nbsp;&nbsp;<a href="/pension/board/list.php"> �Խ��� </a> </li>
  <li>&nbsp;&nbsp;<a href="/pension/review/review_list.php"> �����ı� </a></li>
 </ul>
 </li>
 <?
 if($_SESSION["userid"]=="admin1")
 {
 ?>
 <a href="#" onmouseover=view("admin") onmouseout=hid("admin")>�����ڸ޴�</a></li>
 <li id=admin onmouseover=view("admin") onmouseout=hid("admin")>
  <ul>
   <li> &nbsp;&nbsp;<a href="/pension/admin/room_list.php"> ���ǰ��� </a> </li>
  </ul>
 </li>
 <? 
 }
 ?>
</ul>
</nav>

<article>