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

a {text-decoration:none;color:black} <? // 밑줄 없애고 색을 검정으로 ?>
a:hover {text-decoration:underline;color:green} <? // 마우스 올라가면 밑줄 ?>

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
		 aa.value="아이디";
	 }
	 else if(bb==2&&aa.value=="")
	 {
		 aa.value="비밀번호";
		 aa.type="text";
	 }
 }
 function login_check(pp)
 {
	 if(pp.userid.value=="")
	 {
		 alert("아이디를 입력하세요");
		 pp.userid.focus(); // 아이디쪽으로 포커스 이동
		 return false; // submit은 return false를 꼭 줘야함. 아니면 전송됨!
	 }
	 else if(pp.pwd.value=="")
	 {
		 alert("비밀번호를 입력하세요");
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
 if($_SESSION["userid"]=="") // 세션변수가 없다면
 {
 ?>
 <!-- 로그인이 되지 않았을 때 나타나는 화면 -->
   <form method=post action=/pension/login/login_ok.php onsubmit="return login_check(this)">
    <table cellspaning=0 cellpadding=0>
     <tr>
      <td><input type=text name=userid placeholder=아이디 size=7 onfocus=del(this,1) onblur=mov(this,1)></td>
      <td rowspan=2 valign=bottom><input type=submit value=로그인></td>      
         <!-- input type=image는 submit과 같은 기능을 해줌 -->
     </tr>
     <tr>
      <td> <input type= text name=pwd placeholder=비밀번호 size=7 onfocus=del(this,2) onblur=mov(this,2)></td> 
     </tr>
     <tr>
      <td colspan=2> <a href="/pension/login/user_check.php" style="color:white">정보찾기</a>  | <a href="/pension/login/member.php" style="color:white">회원가입</a></td>
     </tr>
    </table>
   </form>
 <!-- 로그인이 되지 않았을 때 끝화면 -->
 <?
 }
 else
 {
 ?>
 <!-- 로그인이 되었을 때 나타나는 화면 -->
    <table cellspaning=0 cellpadding=0>
     <tr>
      <td><?=$_SESSION["name"]?>님</td>
      <td> <a href="/pension/login/member_edit.php" style="color:white">Mypage</a> </td>      
     </tr>
     <tr>
      <td colspan=2> <a href="/pension/login/logout.php" style="color:white">로그아웃</a></td>
     </tr>
    </table>
 <!-- 로그인이 되었을 때 끝화면 -->
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
  <li><a href="/pension/sogae.php">펜션소개</a></li>
 <li><a href="#" onmouseover=view("res") onmouseout=hid("res")>예약관련</a></li>
 <li id=res onmouseover=view("res") onmouseout=hid("res")>
   <ul>
    <li>&nbsp;&nbsp;<a href="/pension/reser/cal3.php">예약하기</a> </li>
    <li>&nbsp;&nbsp;<a href="/pension/reser/reserve_check.php">예약확인</a> </li>
   </ul>
 </li>
 <li><a href="#" onmouseover=view("commu") onmouseout=hid("commu")>커뮤니티</a></li>
 <li id=commu onmouseover=view("commu") onmouseout=hid("commu")>
 <ul>
  <li>&nbsp;&nbsp;<a href="/pension/gongji/list.php"> 공지사항 </a> </li>
  <li>&nbsp;&nbsp;<a href="/pension/board/list.php"> 게시판 </a> </li>
  <li>&nbsp;&nbsp;<a href="/pension/review/review_list.php"> 여행후기 </a></li>
 </ul>
 </li>
 <?
 if($_SESSION["userid"]=="admin1")
 {
 ?>
 <a href="#" onmouseover=view("admin") onmouseout=hid("admin")>관리자메뉴</a></li>
 <li id=admin onmouseover=view("admin") onmouseout=hid("admin")>
  <ul>
   <li> &nbsp;&nbsp;<a href="/pension/admin/room_list.php"> 객실관련 </a> </li>
  </ul>
 </li>
 <? 
 }
 ?>
</ul>
</nav>

<article>