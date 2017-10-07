<?php
require_once('resources/PHP/func.php');

// ตัวอย่างLink ตอนเข้าหน้านี้ http://localhost/forumresponsiveProject/post.php?PostID=OP1503326319?9
$PostID=$_GET['PostID'];

// ดึงข้อมูลหัวกระทู้
$op=getPost($PostID);
// ดึง  comment  ทั้งหมด ลง array เก้บ ใน comment
$Comment=getPostComment($PostID);

 
// Expect output
/*

array(1) { [0]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Title"]=> string(4) "TEST" ["content"]=> string(7) "Content" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(2) "dd" ["isOP"]=> string(1) "1" ["AvatarURL"]=> string(11) "AVARTar URL" } } 

array(2) { [0]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Date"]=> string(19) "2017-09-12 00:00:00" ["content"]=> string(6) "sdsdsd" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(13) "dddddsfsfsfaf" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(11) "AVARTar URL" } [1]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Date"]=> string(19) "2017-09-12 23:29:44" ["content"]=> string(11) "Contentdddd" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(5) "ddddd" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(11) "AVARTar URL" } }

*/
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="resources/css/Header+FooterCss.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>


<link rel="stylesheet" href="resources/css/font-awesome.css">

  
  <script type="text/javascript" src="resources/JS/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="resources/JS/responsiveCarousel.min.js"></script>

<style>

.button {
    background-color:hsla(0,0%,100%,0.00);
    border: none;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
}
	.Font{
		font-family:Orator Std;
		font-size: 18px;
	}
	.Font2{
		font-family:Orator Std;
		color: #263c4b;
	}

</style>
</head>


<body>
<div id="wrapper">
	<div align="center" class="Logo"><a href="#" class="button"><img src="resources/images/logo.png"  width="112" height="112"></a></div> 
		<header>
		
		<input type="checkbox" id="btn-menu">
		<label for="btn-menu"><img src="resources/images/list.png" width="55" height="55" alt=""/></label>
		<nav class="Menu" style=" z-index:14">
			<ul>
				<li><a href="#" class="o"><span class="fa fa-home" style="font-size: 30px;padding-top: 12px;"><p class="Font">  HomePage</p></a></li>
				<li><a href="#" class="o"><span class="fa fa-search" style="font-size: 30px;padding-top: 12px;"><p class="Font">  Search</p></a></li>
				<li><div align="center" class="Logo2 col-s-hidden col-m-12 col-l-12">
				<a href="#" class="button"><img src="resources/images/logo.png" style="padding-top: 10px;" width="112" height="112"></a></div></li>
				<li><a href="#" class="o"><span class="fa fa-magic" style="font-size: 30px;padding-top: 12px;"><p class="Font">  CreatePost</p></a></li>
				<li><a href="#" class="o"><span class="fa fa-smile-o" style="font-size: 30px;padding-top: 12px;"><p class="Font">  About</p></a></li>
			</ul>
		</header>
		
		<main>
				<div style="margin-bottom: 50px; color: aliceblue; text-align: center;">
                    
<?php 


var_dump($op);
echo "<br><br>";

var_dump($Comment);

// Expect output
/*

array(1) { [0]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Title"]=> string(4) "TEST" ["content"]=> string(7) "Content" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(2) "dd" ["isOP"]=> string(1) "1" ["AvatarURL"]=> string(11) "AVARTar URL" } } 

array(2) { [0]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Date"]=> string(19) "2017-09-12 00:00:00" ["content"]=> string(6) "sdsdsd" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(13) "dddddsfsfsfaf" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(11) "AVARTar URL" } [1]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Date"]=> string(19) "2017-09-12 23:29:44" ["content"]=> string(11) "Contentdddd" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(5) "ddddd" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(11) "AVARTar URL" } }

*/
?>



                </div>
		</main>
		
		
		<footer>
				<div class="footer" style="padding-top: 25px;">เว็บไซต์นี้เป็นส่วนหนึ่งของวิชา <strong>MTE-435</strong>(ฝากแก้ไขข้อความด้วย ไม่รู้จะพิมพ์อะไร)</div>	
		</footer>

		</nav>
</div> <!-- wrapper -->

</body>

<script>

function submitRate(xRate){
//check validate here 
 
let xUser_ID = <?php echo getUserID(); ?>;//$_SESSION['curUser_ID'];
 if(xUser_ID=""){
//  pop login
	return;
 }

$.post("resources/PHP/ratePost.php",
{ 
	Rate: xRate,
	User_ID  : xUser_ID,
	Post_ID :  <?php echo $PostID ?>
},
function(data,status){
					if(status!='success'){  // response == 406
                        alert("ERROR"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                    else{
                        alert("success: click ok to go to page"); //จะขึ้น Modal, Breadcrumb
						$(location).attr('href', 'post.php?PostID='+data);
                    }
});

}


function submitcomment(){
//check validate here 
 
let xUser_ID = <?php echo getUserID(); ?>;//$_SESSION['curUser_ID'];
 if(xUser_ID=""){
//  pop login
	return;
 }

let Content  = document.getElementById('comment').value; // !@#$%^
 
$.post("resources/PHP/ratePost.php",
{ 
	PostContent: Content,
	User_ID  : xUser_ID,
	Post_ID :  <?php echo $PostID ?>
},
function(data,status){
					if(status!='success'){  // response == 406
                        alert("ERROR"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                    else{
                        alert("success: click ok to go to page"); //จะขึ้น Modal, Breadcrumb
						$(location).attr('href', 'post.php?PostID='+<?php echo $PostID ?>);
                    }
});

}

</script>
</html>