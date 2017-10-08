
<?php
require_once('resources/PHP/func.php');

// ตัวอย่างLink ตอนเข้าหน้านี้ http://localhost/forumresponsiveProject/post.php?PostID=OP1503326319?9
$PostID=$_GET['PostID'];

// ดึงข้อมูลหัวกระทู้
$op=getPost($PostID);
// ดึง  comment  ทั้งหมด ลง array เก้บ ใน comment
$Comment=getPostComment($PostID);


if (!isset($_SESSION)) {
    session_start();
}
 
$Allpostnum = getAllPostNum();  // count all post in the system
$Hotpost = getHotPost(5); // 5 is select top 5
  
?><head>
<link rel="stylesheet" type="text/css" href="resources/css/Header+FooterCss_index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>


<link rel="stylesheet" href="resources/css/font-awesome.css">
  
  <link rel="stylesheet" type="text/css" media="all" href="resources/css/HOTstyles.css">
  <link rel="stylesheet" type="text/css" media="all" href="resources/css/TAGstyles.css">
  <link rel="stylesheet" type="text/css" media="all" href="resources/css/main.css">
  <script type="text/javascript" src="resources/JS/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="resources/JS/responsiveCarousel.min.js"></script>
  <script type="text/javascript" src="resources/JS/MD5.js"></script>
  <script type="text/javascript" src="resources/ckeditor/ckeditor.js"></script> 

 
</head>
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
<body>

<div   align="center" class="Logo"><a href="#" class="button"><img src="resources/images/logo.png"  width="112" height="112"></a></div> 
<header>

<input type="checkbox" id="btn-menu">
<label for="btn-menu"><img src="resources/images/list.png" width="55" height="55" alt=""/></label>
<nav class="Menu" style=" z-index:14">
    <ul>
        <li><a href="#" onClick="goToLink('index.php');"class="o"><span class="fa fa-home" style="font-size: 30px;padding-top: 12px;"><p class="Font">  HomePage</p></a></li>
        <li><a href="#" class="o"><span  onClick="PopSearch();"class="fa fa-search" style="font-size: 30px;padding-top: 12px;"><p class="Font">  Search</p></a></li>
        <li><div align="center" class="Logo2 col-s-hidden col-m-12 col-l-12">
        <a href="#" class="button"><img src="resources/images/logo.png" style="padding-top: 10px;" width="112" height="112"></a></div></li>
        <li><a href="#" onClick="PopcreatePost();" class="o"><span class="fa fa-magic" style="font-size: 30px;padding-top: 12px;"><p class="Font">  CreatePost</p></a></li>
        <li><a href="#" onClick="goToLink('member.php');"class="o"><span class="fa fa-smile-o" style="font-size: 30px;padding-top: 12px;"><p class="Font">  About</p></a></li>
    </ul>
</nav>	
</header>


<!-- CreatePostBox -->
<div id='backdrop' class="modal  hide" onClick="hideAll();"></div>
<div id="CreatePostBox"class="modal hide">


<div style="margin-bottom: 50px; color: aliceblue; text-align: center;" class="col-l-12">
            <div align="center"  class=" col-l-12 col-m-12" style="border-radius:10px;background-color:#dbe4ea;">
             
            <button type="button" class="closebtnModal"onClick="hideAll();" data-dismiss="modal"><span style="font-size: 3em;" aria-hidden="true">×</span></button> <!-- Close Btn -->

<table align="center" class="Font2 fa-2x" style="padding:30px; ">
<tr><td colspan="1">Title: </td>
<td><input type="text" name="title" class="fa" id="PostTitle" style="width:100%; border-radius:5px;"></td></tr>
<tr><td>Subtitle: </td><td><input type="text" id="PostSubtitle"name="subtitle" style="width:100%;border-radius:5px;" class="fa"></td></tr>
<tr><td>Content: </td><td><textarea name="Postaddress" id="PostContent" ></textarea>
       <script type="text/javascript">
    //<![CDATA[
        CKEDITOR.replace( 'PostContent',{
            skin : 'office2013',				
            
            
        filebrowserBrowseUrl : './resources/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : './resources/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : './resources/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : './resources/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : './resources/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : './resources/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        
            } );
    //]]>
    </script>
</td></tr>
<tr><td>TAG: </td><td><input id="PostTag" type="text" name="tag" class="fa" style="width:100%; border-radius:5px;"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" onClick="submitPost();" value="Submit" class="Font2 fa" style="border-radius:5px; 
background-color:#263c4b; color:aliceblue; padding:10px; padding-top:15px;"></td></tr>
</table>
            </div>
        </div>



</div> <!--END CreatePostBox  -->


<!-- Login RegisterBox -->
<div id="RegisterBox"class="modal hide fadepopIN">

<div style="background-color:#dbe4ea; border-radius:15px; height:300px;width: 80%;margin: auto;" align="center"> 
<div> <button type="button" class="closebtnModal" style="right: 10%;"onClick="hideAll();" data-dismiss="modal"><span style="font-size: 3em;" aria-hidden="true">×</span></button> <!-- Close Btn -->
<div class=" " id="regisOption" style="margin:auto;width:80%;padding-top:30px">

<div id="signup" style="float:left;width:50%;height: -webkit-fill-available;">

<table style="margin:auto">
 <form>
    <tr>
        <td width="102" class="Font">NickName
        </td>
        <td width="144" > 
         <input class="require Regisinput"  ID="Name" name="Nick Name" type="text">  <!--  TAE   -->
         <div id="Name_error" class="hideErrorMessage errmsg Font" >Require</div><!--  TAE   -->
        </td>


    </tr>

    <tr>
         <td width="102" class="Font">Avatar
        </td>
        <td width="144"> 
         <input   id="avatarPath"  class="Regisinput" name = "avatar" type="file" value="Upload" accept="image/*"/>   <!--  TAE   -->
         <div id="avatar_error" class="hideErrorMessage errmsg Font">Require</div><!--  TAE   -->
        </td>

        
    </tr>
    
         <tr>
        <td class="Font">Username
        </td>
        <td> 
         <input class="require Regisinput" ID="username" name="username" type="text"> <!--  TAE   -->
         <div id="username_error" class="hideErrorMessage errmsg Font">Require</div><!--  TAE   -->
        </td>
    </tr>
     <tr>
        <td class="Font">Password
        </td>
        <td> 
         <input class="require Regisinput" id ='Password' name="password" type="password"> <!--  TAE   -->
        
        </td>
    </tr>
     <tr>
        <td class="Font">Confirm Password
        </td>
        <td> 
         <input class="require Regisinput" id ='Password2'name="passwordconfirm" type="password"> <!--  TAE   -->
         <div id="Password_error" class="hideErrorMessage errmsg Font">Require</div><!--  TAE   -->
        </td>
    </tr>
         <tr>
        <td>
        </td>
        <td> 
         <input onclick ="register();" id="Register"type="button" value="Sign up" class="Font"/>  <!--  TAE   -->
        </td>
    </tr>
   
     </form>
</table>

</div>
<div id="login" style="float:left;width:50%;height: -webkit-fill-available;">
<table style="margin:auto">
 <form>
     <tr>
        <td class="Font">Username
        </td>
        <td> 
         <input id="Login_ID" name="username" class="reqLog Regisinput" type="text">  <!-- TAE  -->
         <div id="Login_ID_error" class="hideErrorMessage errmsg Font">Require</div><!--  TAE   -->
        </td>
    </tr>
     <tr>
        <td class="Font">Password
        </td>
        <td> 
         <input id="Login_Pass" name="password" class="reqLog Regisinput" type="text"> <!-- TAE  -->
         <div id="Login_Pass_error" class="hideErrorMessage errmsg Font">Require</div><!--  TAE   -->
        </td>
    </tr>
    <tr>
    <td> 
        </td>
     <td align="right"> 
         <input type="button" onclick = 'Loginpage();' value="Log in" class="Font"/>
        </td>
    </tr>
</form>
</table>
</div>
</div></div>
</div>
</div>
<!--END Login RegisterBox -->


<!-- SEARCH Box -->
<div id="SearchBox"class="modal hide fadepopIN">

<div style="background-color:#dbe4ea; border-radius:15px;width: 80%;margin: auto;" align="center"> 
<div> <button type="button" class="closebtnModal" style="right: 10%;"onClick="hideAll();" data-dismiss="modal"><span style="font-size: 3em;" aria-hidden="true">×</span></button> <!-- Close Btn -->
<div class=" " style="margin:auto;width:80%;padding-top:30px">

      <!-- Xureality Tag -->
<div>
<form>
   <div id="tagbox"><span id="tagDisplay" style="top: 5px;position: absolute;"></span><input   id="textin" class="taginput fa" type="text" onkeyup="showHint(this.value)"></div>
</form>

<p>
   <span id="tagHint" ></span>
</p></div>

<!--    Xureality Tag-->
    
<ul class="demo-list-three mdl-list">
<li class="mdl-list__item mdl-list__item--three-line">
<span class="mdl-list__item-primary-content">
<i class="material-icons mdl-list__item-avatar">person</i>
<span>Bryan Cranston</span>
<span class="mdl-list__item-text-body">
Bryan Cranston played the role of Walter in Breaking Bad. He is also known
for playing Hal in Malcom in the Middle.
</span>
</span>
<span class="mdl-list__item-secondary-content">
<a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">star</i></a>
</span>
</li>
<li class="mdl-list__item mdl-list__item--three-line">
<span class="mdl-list__item-primary-content">
<i class="material-icons  mdl-list__item-avatar">person</i>
<span>Aaron Paul</span>
<span class="mdl-list__item-text-body">
Aaron Paul played the role of Jesse in Breaking Bad. He also featured in
the "Need For Speed" Movie.
</span>
</span>
<span class="mdl-list__item-secondary-content">
<a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">star</i></a>
</span>
</li>
<li class="mdl-list__item mdl-list__item--three-line">
<span class="mdl-list__item-primary-content">
<i class="material-icons  mdl-list__item-avatar">person</i>
<span>Bob Odenkirk</span>
<span class="mdl-list__item-text-body">
Bob Odinkrik played the role of Saul in Breaking Bad. Due to public fondness for the
character, Bob stars in his own show now, called "Better Call Saul".
</span>
</span>
<span class="mdl-list__item-secondary-content">
<a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">star</i></a>
</span>
</li>
</ul>
</div>
</div>
</div>
</div>
<!--END Login RegisterBox -->
 
<main id="main">

	<div style="margin-bottom: 50px; color: aliceblue; text-align: center;">
		
	<div style="margin-bottom: 50px; color: aliceblue;">
		<div class=" col-l-12 col-m-12 col-s-12" style="box-sizing:border-box; border-radius:10px; background-color:#dbe4ea; padding-bottom:40px; padding-top:25px; padding-left:25px; padding-right:25px;margin-bottom:20px;">
			<!-- Title --> 
			<h1 style="color:#263c4b;text-align:left"><?php echo $op[0]["Title"];?></h1>
			<!-- END title -->
		
		<div class="col-l-2 col-m-3 col-s-12" style="box-sizing:border-box; padding-right:25px;">
<!-- avartar --> 
				<div class="" aling="center" style="box-sizing:content-box; border-radius:10px; background-color:#263c4b; height:120px; width:120px;object-fit: contain;background: url('<?php echo $op[0]["AvatarURL"] ?>');    background-size:     cover;                   
	background-repeat:   no-repeat;
	background-position: center center; ">
		 
		

				
				</div>
<!--avartar -->
		
				<div class="col-l-12 col-m-12 col-s-12"><p class="Font2"><?php echo getName( $op[0]["User_ID"]);?></p></div>

			</div>

			<div class="col-l-10 col-m-9 col-s-12" style="box-sizing:border-box; padding-left:25px;">
				
				<div class="col-m-12" style="box-sizing:content-box; border-radius:10px; background-color:#263c4b;padding-top:10px;padding-bottom:10px; width:100%; ">
							<?PHP echo $op[0]["content"]; ?>   <!---  Post content -->
				</div>

				<div class="col-l-12" style="box-sizing:content-box; border-radius:10px; background-color:#263c4b; height:400px; width:auto; ">

				</div>
				
				<div class="col-l-12 col-m-12 col-s-12" style="padding-top:10px;">
					<h1 class="Font2" style="font-size:24px;float:left">Rating : 
						<?php
						echo htmlStar(getPostRate($op[0]['Post_ID']));
						?>
					</h1>
	 
				</div>

			</div>



		</div>
		
		<!-- Comment -->

		<div class=" col-l-12 col-m-12 col-s-12" style="box-sizing:border-box; border-radius:5px; background-color:#dbe4ea;padding-top:5px;padding-left:5px;">
			<p class="Font2" style="margin:0px;"><h1 style="color:#263c4b;text-align:left"> Comment</h1></p>
			
			<div id='CommentSection'>
 
		 
		<div class=" col-l-12 col-m-12 col-s-12" style="box-sizing:border-box; border-radius:10px; background-color:#dbe4ea; padding-bottom:40px; padding-top:25px; padding-left:25px; padding-right:25px;margin-bottom:20px;">
			<!-- Title --> 
			<h5 style="color:#263c4b;text-align:left" >Title : </h5> <h1 style="color:#263c4b;text-align:left"><?php echo $op[0]["Title"];?></h1>
			<!-- END title -->
		
		<div class="col-l-2 col-m-3 col-s-12" style="box-sizing:border-box; padding-right:25px;">
<!-- avartar --> 
				<div class="" aling="center" style="box-sizing:content-box; border-radius:10px; background-color:#263c4b; height:120px; width:120px;object-fit: contain;background: url('<?php echo $op[0]["AvatarURL"] ?>');    background-size:     cover;                   
	background-repeat:   no-repeat;
	background-position: center center; ">
		 
		

				
				</div>
<!--avartar -->
		
				<div class="col-l-12 col-m-12 col-s-12"><p class="Font2"><?php echo getName( $op[0]["User_ID"]);?></p></div>

			</div>

			<div class="col-l-10 col-m-9 col-s-12" style="box-sizing:border-box; padding-left:25px;">
				
				<div class="col-m-12" style="box-sizing:content-box; border-radius:10px; background-color:#263c4b;padding-top:10px;padding-bottom:10px; width:100%; ">
							<?PHP echo $op[0]["content"]; ?>   <!---  Post content -->
				</div>

				<div class="col-l-12" style="box-sizing:content-box; border-radius:10px; background-color:#263c4b; height:400px; width:auto; ">

				</div>
				 

			</div>


 
			</div>


		</div>

		<!-- end Comment -->


 <hr  size=30>

		<!--Postiing comment  -->
<div style="width:100%:margin-top:20px;">
<h2 class="fa">Wanna Post ? </h2>


<!-- Post comment  Avatar       -->
	<div class="col-l-2 col-m-3 col-s-12"style="float:left">
	<div class="" aling="center" style="box-sizing:content-box; border-radius:10px; background-color:#263c4b; height:120px; width:120px;object-fit: contain;background: url('<?php echo getAvatarURL();?> ');    background-size:     cover;                   
	background-repeat:   no-repeat;
	background-position: center center; ">
	
			
				<div class="col-l-12 col-m-12 col-s-12"><p class="Font2"><?php echo getcname();?></p></div>
		</div>
	</div>

		<!--Post comment content   -->

		<div style="col-l-8 col-m-7 col-s-12" style="float:left">
			<table align="center" class="Font2 fa-2x" style="padding:30px;    width: 100%; ">
    	<tr><td colspan="1">Title: </td>
        <td><input type="text" name="CommentTITLE" class="fa" id="CommentTITLE" style=" border-radius:5px;"></td></tr>
      
        <tr><td>Content: </td><td><textarea name="Postaddress" id="Comment" ></textarea>
           	<script type="text/javascript">
			//<![CDATA[
				CKEDITOR.replace( 'Comment',{
					skin : 'office2013',				

				filebrowserBrowseUrl : './resources/ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : './resources/ckfinder/ckfinder.html?Type=Images',
				filebrowserFlashBrowseUrl : './resources/ckfinder/ckfinder.html?Type=Flash',
				filebrowserUploadUrl : './resources/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : './resources/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : './resources/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				
					} );
			//]]>
			</script>
    </td></tr>
        <tr><td colspan="2" align="right"><input type="submit" onClick="subccmitPost();" value="Submit" class="Font2 fa" style="border-radius:5px; 
        background-color:#263c4b; color:aliceblue; padding:10px; padding-top:15px;"></td></tr>
	</table>
	</div>
</div></div>


		</main>
		




		
		<footer class=" col-m-12 col-s-hidden col-l-12" style=" position:relative; margin-top:60px;">


				<div class="footer  col-m-12 col-s-hidden col-l-12" style="padding-top: 25px;">
					
				
				
				
				เว็บไซต์นี้เป็นส่วนหนึ่งของวิชา <strong>MTE-435</strong> </div>	
		</footer>

		</nav>
</div> <!-- wrapper -->

</body>
 
 





<script type="text/javascript">
 
 function submitRate(xRate){
//check validate here 
 
let xUser_ID = <?php echo getUserID(); ?>;//$_SESSION['curUser_ID'];
 if(xUser_ID==false){  // not login
//  pop login
    PopRegisterPost();
	return;
 }

$.post("resources/PHP/ratePost.php",
{ 
	Rate: (xRate*2),
	User_ID  : xUser_ID,
	Post_ID :  '<?php echo $PostID; ?>'
},
function(data,status){
					if(status!='success'){  // response == 406
                        alert("ERROR"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                    else{
                        alert("success"); //จะขึ้น Modal, Breadcrumb
						$(location).attr('href', 'post.php?PostID='+'<?php echo $PostID; ?>');
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
	Post_ID :  '<?php echo $PostID; ?>'
},
function(data,status){
					if(status!='success'){  // response == 406
                        alert("ERROR"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                    else{
                        alert("success: click ok to go to page"); //จะขึ้น Modal, Breadcrumb
					//	$(location).attr('href', 'post.php?PostID='+'<?php echo $PostID; ?>');
                    }
});

}





$(function(){
  $('.hot').carousel({
	speed: 800,
	autoRotate: 4000,
    visible: 4,
    itemMinWidth: 270,
    itemEqualHeight: 370,
    itemMargin: 10,
  });
  $('.res').carousel({
    visible: 9,
    itemMinWidth: 120,
    itemEqualHeight: 370,
    itemMargin: 10,
  });
	
  	$('.hot').on("initCarousel", function(event, defaults, obj){
		// Hide controls
		$('#'+defaults.navigation).find('.previous, .next').css({ opacity: 0 });
		// Show controls on gallery hover
		// #gallery-07 wraps .crsl-items and .crls-nav
		// .stop() prevent queue
		$('#w').hover( function(){
			$(this).find('.previous').css({ left: '-5px' }).stop(true, true).animate({ left: '0px', opacity: 1 })
			$(this).find('.next').css({ right: '-10px' }).stop(true, true).animate({ right: '-5px', opacity: 1 });
		}, function(){
			$(this).find('.previous').animate({ left: '-5px', opacity: 0 });
			$(this).find('.next').animate({ right: '-10px', opacity: 0 });
		});
		$('#ww').hover( function(){
			$(this).find('.previous').css({ left: '-5px' }).stop(true, true).animate({ left: '0px', opacity: 1 })
			$(this).find('.next').css({ right: '-10px' }).stop(true, true).animate({ right: '-5px', opacity: 1 });
		}, function(){
			$(this).find('.previous').animate({ left: '-5px', opacity: 0 });
			$(this).find('.next').animate({ right: '-10px', opacity: 0 });
		});
	});
});


function PopcreatePost(){  // โชว Create Post
    
	if(<?php echo islogged();?>){ // Check islog in in php
	$('#CreatePostBox').removeClass( " hide " ).addClass( " show " );
	$('#backdrop').removeClass( " hide " ).addClass( " show " );
	}else{PopRegisterPost();}// go to login instead
}
function hideAll(){ // โชว Create Post
	$('#CreatePostBox').removeClass( " show " ).addClass( " hide " );
	$('#RegisterBox').removeClass( " show " ).addClass( " hide " );
	$('#backdrop').removeClass( " show " ).addClass( " hide " );
    $('#SearchBox').removeClass( " show " ).addClass( " hide " );
    removeBlurAll();
}
function blurAll(){
    
    $('#main').addClass('blurTransition');
    $('#wrapper').addClass('blurTransition');
}
function removeBlurAll(){
    $('#main').removeClass('blurTransition');
    $('#wrapper').removeClass('blurTransition');
    
}
function PopRegisterPost(){  // โชว Resgist  Post
    blurAll();
	$('#RegisterBox').removeClass( " hide " ).addClass( " show " );
	$('#backdrop').removeClass( " hide " ).addClass( " show " );
	
}
function PopSearch(){  // โชว Resgist  Post
    blurAll();	 
	$('#SearchBox').removeClass( " hide " ).addClass( " show " );
	$('#backdrop').removeClass( " hide " ).addClass( " show " );
	
}
timer = setInterval(updateDiv,100);
function updateDiv(){
    var editorText = CKEDITOR.instances.PostContent.getData();
    $('#PostContent').html(editorText);
}


// FUNCTION POSTforumn
function submitPost(){
//check validate here 



let xPostTitle = document.getElementById('PostTitle').value;
let xPostSubtitle = document.getElementById('PostSubtitle').value; //!@#$%^ คืออะไร
let xPostContent = document.getElementById('PostContent').value;
let xPostTag = document.getElementById('PostTag').value;
let xUser_ID = <?php echo getUserID(); ?>;//$_SESSION['curUser_ID'];
 

$.post("resources/PHP/createPost.php",
{ 
	PostTitle: xPostTitle,
	PostSubtitle  : xPostSubtitle,
 	PostContent :xPostContent,
	 PostTag  : xPostTag,
	 User_ID  : xUser_ID
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
// END  FUNCTION POSTforumn


// FUNCTION REGISTER / LOGIN 

let G_User_ID, G_name,  G_AvatarURL;
//Validate 
function validate(classNa){
    let check = document.getElementsByClassName(classNa);
     let len = check.length;
     let valid = true;
     for(var i=0;i<len;i++) {
       if (check[i].value.trim() ==='')
       {    

           let obj = check[i].id;
 
           $("#"+obj).addClass(" required");  // กล่องแดง
            $("#"+obj).addClass(" error");    // สั่น
            $("#"+obj+"_error").removeClass("hideErrorMessage");
              setTimeout(function() {
              $("#"+obj).removeClass("error");
            }, 300);
            valid= false;
            
          //alert('required Field '+check[i].name); //เดวเราทำ js เพิ่ม เราไม่ควรใช้  alert

           
       }
       else{
        let obj = check[i].id;
        $("#"+obj).removeClass(" required");  // กล่องแดง
        $("#"+obj+"_error").addClass(" hideErrorMessage");

       }
 ;
      
     }
    
    return valid;

}
// REGISTER


   
  function register(){
    // validate
    if(!validate('require')){return;}
    // password check 
    pw1 = document.getElementById('Password2').value;
    pw2 = document.getElementById('Password').value;
    if(pw1!=pw2){
        //pass word is not the same / alert something
        alert('Password is not match');
        return;
    }

    // All clear  เขียนลง DB
    
        let name = document.getElementById('Name').value;
        let avatarURL = document.getElementById('avatarPath').value; // เดี๋ยวทำ
        let Username = document.getElementById('username').value;
        let password = md5(document.getElementById('Password').value);
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let response =parseInt(this.responseText);
                    if(response==200){
                        alert("success"); //จะขึ้น Modal, Breadcrumb
					 
                        //fade out
                        $('#regisOption').removeClass(" fadepopIN"); 
                        $('#regisOption').addClass(" fadepopOut"); 
						location.reload(); // reload
                    }else if(response==406){
                        alert("Response : This Username "+ Username +" Already taken please try again"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                }
            };
             
            xmlhttp.open("GET","resources/PHP/register.php?name="+name+"&avatarURL="+avatarURL+"&Username="+Username+"&password="+password,true);
            xmlhttp.send();
  }


//REGISTER BUTTON 


// Login 

function Loginpage(){
 
   if(!validate('reqLog')){return;}
   
    let Username = document.getElementById('Login_ID').value;
    let password = md5(document.getElementById('Login_Pass').value);

    
    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let response =parseInt(this.responseText);
                    if(response==200){



                        //ส่งค่า SESSION บางส่วนลง JS 
                        <?php if(isset($_SESSION['user_info'])){ ?>
                        <?php echo 'G_User_ID = '.json_encode($_SESSION['user_info']['User_ID']).';';?>
                        <?php echo 'G_name = '.json_encode($_SESSION['user_info']['name']).';';?>
                        <?php echo 'G_AvatarURL = '.json_encode($_SESSION['user_info']['AvatarURL']).';';?>
                        <?php  } ?> 
                        
                        alert("Login success : "+G_name); //จะขึ้น Modal, Breadcrumb

                            //fade out
                        $('#regisOption').removeClass(" fadepopIN"); 
						$('#regisOption').addClass(" fadepopOut");
						location.reload(); 
                    }else if(response==406){
                        alert("Response : Username or password are incorrect"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                }
            };
             
            xmlhttp.open("GET","resources/PHP/login.php?Username="+Username+"&password="+password,true);
            xmlhttp.send();


}
console.log("USER_ID: <?php echo getUserID();?>  NAME:  <?php echo getcname();?> ");

function logout(){



$.post("resources/PHP/logout.php",
{ },
function(data,status){
					if(status!='success'){  
                        alert("ERROR");  
                       }
                    else{
                        alert("Logingout"); //จะขึ้น Modal, Breadcrumb
						location.reload(); 
                    }
});


}
//END FUNCTION REGISTER / LOGIN 


	 // XU
	 var tagged = [];
            function showHint(str) 
			{
				console.log(tagged);
                if (str.length == 0) 
				{
                    document.getElementById("tagHint").innerHTML = "";
                    return;
                } 
                else 
				{
                    var xmlhttp = new XMLHttpRequest();
					
                    xmlhttp.onreadystatechange = function() 
					{
                        if (this.readyState == 4 && this.status == 200) 
						{
                            document.getElementById("tagHint").innerHTML = "";
                            var a = this.responseText.split(" ");
							console.log(a);
							var i,j;
							for (i = 0; i < a.length; ++i) 	
							{
								for (j = 0; j < tagged.length; ++j)
								{
									if ((a[i] + " ") == tagged[j])
									{
										a[i] = "";
									}
								}									
							}
							
							for (i = 0; i < a.length; ++i) 
							{
                                var data = a[i];
                                // string ว่างไม่ควรโชว
								link = document.createElement('span');
								link.id = "hintdisp";
								link.className= "mdl-chip__text";
                                link.href =  '#';
                                link.addEventListener("click", function (e) 
								{ 
									frag = fragmentFromString("<span id='hint' class=''><span id='hinttext'>" + e.target.innerHTML + "</span><span><button type='button' class='mdl-chip__action'><i class='material-icons close '>cancel</i></button></span></span> ");
									tagged.push(e.target.innerHTML);
                                    document.getElementById("tagDisplay").appendChild(frag); 
									document.getElementById("textin").value = "";
									e.target.parentElement.removeChild(e.target);
									makecloseable();
                                }
								, false);
                                link.innerHTML = data + " ";
								 
                                document.getElementById("tagHint").appendChild(link);
                                //document.getElementById("tagHint").appendChild(document.createElement('br'));
                            }
                        }
                    };
					
                    xmlhttp.open("GET", "resources/php/taglist.php?query=" + str, true);
                    xmlhttp.send();
                }
            }
			function fragmentFromString(strHTML) {
				var temp = document.createElement('template');
				temp.innerHTML = strHTML;
				return temp.content;
			}
			function makecloseable() {
				var elements = document.getElementsByClassName('close');
				for (i = 0; i < elements.length; ++i){
					elements[i].addEventListener("click", function (e){
						var frag = fragmentFromString(this.parentNode.parentNode.parentNode.innerHTML);
						var list = frag.getElementById("hinttext").innerHTML;
						console.log(list);
						for (j = 0; j < tagged.length; ++j)
						{
							if (list == tagged[j])
							{
								tagged.splice(j, 1);
							}
						}
						this.parentNode.parentNode.parentNode
						.removeChild(this.parentNode.parentNode);
						return false;
					}, false);
				}	
			};
     // XU
     
     function goToLink(URL) {
                    // div Transition need to add css /*     -webkit-filter: blur(5px) filter: blur(5px);
                    
                    blurAll();
                    $('#main').addClass('blurTransition');
                     
                    setTimeout(function () { location.href= URL ; }, 1000);
            };

</script>


<?php

// PHP ============================
function htmlStar($rate){
    $html = "";
      $star = ceil($rate/2);
// เดี๋ยว ทำ  : Hover
    for($i=1;$i<$star;$i++){
        $html .='<span class="fa fa-star" onClick="submitRate('.$i.');" ></span>';  // full star
    }
    for($i;$i<=5;$i++){
        $html .='<span class="fa fa-star-o"  onClick="submitRate('.$i.');" ></span>';  // empty star
    }
    return $html ;
}


// PHP pass data to js
function islogged(){
   if(isset($_SESSION['user_info']['User_ID'])){return  'true';}else return 'false';
}
function getUserID(){ if(isset( $_SESSION['user_info']['User_ID'])){return $_SESSION['user_info']['User_ID']; }else return 'false'; }
function getcname(){ if(isset( $_SESSION['user_info']['name'])){return $_SESSION['user_info']['name']; }else return 'false'; }
function getAvatarURL(){ if(isset( $_SESSION['user_info']['AvatarURL'])){return $_SESSION['user_info']['AvatarURL']; }else return 'false'; }
 
?>
 


