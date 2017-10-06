
<?php
/*

 $usr_info   = array(
            "User_ID" => $row["User_ID"],
            "name" => $row['Name'],
            "AvatarURL" => $row['AvatarURL']
        );



*/
require_once('resources/PHP/func.php');
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
  <script type="text/javascript" src="resources/JS/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="resources/JS/responsiveCarousel.min.js"></script>
  <script type="text/javascript" src="resources/JS/MD5.js"></script>
  <script type="text/javascript" src="resources/ckeditor/ckeditor.js"></script> 
<style>
	.content-grid {
  		max-width: 100%;
	}
		
	.TAGbot{
		font-size: 30px;
		width: 100px;
		height: 80px;
		margin: 0px;
		margin-right: 1px;
		width: 100%;
	}
.demo-card-square.mdl-card {
  width: 320px;
  height: 320px;
  margin:0px;
  width:100%; 
}
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
}
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


	.rateStar{
	height:30px;
	width:100%;
	position:absolute;
	float: right;
	right: 0;
	
}
.star{
	background: url('resources/images/Star.png') ;
	background-size: contain;
	height:30px;
	width:30px;
	float:right;
	right:10px
	
}
.postBorder{
    position: relative;
    float: left;
    overflow: hidden;
    width: 467px;
    margin-right: 10px;
    height: 340px;

}

/* Xureality tag*/
.taginput {
            border: none;
            background: transparent;
            width: 100%
        }
		.tagbox {
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            white-space: nowrap;
        }
/*end  Xureality  tag*/

/*TAE UI*/

.Modal{
 
 box-sizing:border-box;position: fixed; z-index: 999;width:100%;margin:10px auto 10px auto;
 transition: opacity 0.3s, visibility 0.3s;
}
#backdrop{
	width: 100%;
    height: 200%;
    position: fixed;
    top: -50%;
    z-index: 500;
	background-color:rgba(0,0,0,0.6)    
}
 
.closebtnModal{

	-webkit-appearance: none;
					padding: 0;
					cursor: pointer;
					position: fixed;
					background: 0 0;
					border: 0;
					padding-right: 10px;
					right: 10px;
}
.floatLeft{
	float: left;

}


.hide{
	visibility: hidden;
    display: none;
} 
.show{
	visibility: visible;
    display: block;
}
.unfocus{

}
/*

REGISTER , LOGIN CSS

*/


.error {
    position: relative;
    animation: shake 0.5s cubic-bezier(0, 1.8, 0.5, 1.8) 0s 2;
    animation-iteration-count: 3;
}
.required{ 
    border:1px solid red;
}
@keyframes shake {
    0% {
        left: 0px;
      }
      20% {
        left: 8px;
      }
      40% {
        left: -4px;
      }
      60% {
        left: 4px;
      }
      100% {
        left: 0px;
      }
}
.fadepopIN{
   
    animation: Popup .5s ease-out ;
}
.fadepopOut{
     
    animation: PopupOUT .5s ease-out ;
    opacity: 0;
    transition: visibility 0s 2s, opacity 2s linear;
}
@keyframes Popup {
    0% {
        display: none;
        top: -500px;
        opacity:0;
    }
    1% {
        display: block;
        opacity: 0;
    }
      100% {
        display: block;
        top: 0px;
        opacity:1;
      }
}

@keyframes PopupOUT {
    0% {
        display: none;
        top: 0px;
        opacity:1;
    }
    1% {
        display: block;
        opacity: 1;
    }
      100% {
        display: none;
        top: -500px;
        opacity:0;
      }
}

.hideErrorMessage{
    opacity: 0;
}

.errmsg
{
    color:red;
}
 /*

END REGISTER , LOGIN CSS

*/

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
				<li><a href="#" class="o"><span  onClick="createPostPop();"class="fa fa-search" style="font-size: 30px;padding-top: 12px;"><p class="Font">  Search</p></a></li>
				<li><div align="center" class="Logo2 col-s-hidden col-m-12 col-l-12">
				<a href="#" class="button"><img src="resources/images/logo.png" style="padding-top: 10px;" width="112" height="112"></a></div></li>
				<li><a href="#" onClick="PopcreatePost();" class="o"><span class="fa fa-magic" style="font-size: 30px;padding-top: 12px;"><p class="Font">  CreatePost</p></a></li>
				<li><a href="#" class="o"><span class="fa fa-smile-o" style="font-size: 30px;padding-top: 12px;"><p class="Font">  About</p></a></li>
			</ul>
		</nav>	
		</header>


<!-- CreatePostBox -->
<div id='backdrop' class="modal hide" onClick="hideAll();"></div>
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

<div id="sighup" style="float:left;width:50%;height: -webkit-fill-available;">
	
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





<main id="main">


    <!-- Your content goes here -->
	<div class="content-grid mdl-grid">
		<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone" style="background-color:#f1f4ff;padding-top:0px;border-radius: 8px; ">
			<h5 class="Font2"><dd> HOT  POST</dd></h5>

			 <!-- Xureality Tag 
		<div>
		<form>
           <div id="tagbox"><span id="tagDisplay"></span><input id="textin" class="taginput" type="text" onkeyup="showHint(this.value)"></div>
        </form>
        
        <p>
           <span id="tagHint"></span>
        </p></div>

    Xureality Tag-->
   		 </div>
	</div>
        
    <div id="hotpost" style="width:87%;margin:auto">
    
    <div id="w">   
    <nav class="slidernav">
      <div id="navbtns" class="clearfix">
        <a href="#" class="previous" style="opacity: 0; left: 0px;"></a>
      	<a href="#" class="next" style="opacity: 0; right: 3px;"></a>
      </div>
    </nav>

	

<!-- ITEMS -->	


    <div class="hot crsl-items" data-navigation="navbtns">
      <div class="crsl-wrap" id ="crsl">


  
    

             
 <!--  Generate Hot posts   -->
 
		 <?php 
		 
		  for($i = 0;$i<count($Hotpost);$i++){
	
				echo '  
				<div class="crsl-item">    
				<div class="demo-card-square mdl-card mdl-shadow--2dp floatLeft">
				<div class="rateStar"id="rate?'.$Hotpost[$i]['Post_ID'].'">
				'.		  htmlStar(getPostRate($Hotpost[$i]['Post_ID'])).
				'</div> 
				<div class="mdl-card__title mdl-card--expand">
				<h2 class="mdl-card__title-text">'.$Hotpost[$i]['title'].'</h2> 
				</div>
				
				<div class="mdl-card__supporting-text"> by :  
				'.$Hotpost[$i]['name'].'
					</div>
				<div class="mdl-card__actions mdl-card--border">
				<a href="post.php?PostID='.$Hotpost[$i]['Post_ID'].'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
				Go to Post
				</a>
				</div>
				</div>
	  			</div>
				';
		  }
  
		 
		 ?>
	
	
	
	</div><!-- @end .crsl-wrap -->
    </div><!-- @end .crsl-items -->
	</div><!-- @end #w -->
	
	</div><!-- hotpost -->


<!-- Image card -->
<div class="content-grid mdl-grid">
	<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone" style="background-color:#f1f4ff;padding-top:0px;border-radius: 8px; ">
			<h5 class="Font2"><dd>Recommend TAG</dd></h5>
    </div>
</div>     
        
          <div id="hotpost" style="width:87%;margin:auto">
                
    <div id="ww">   
    <nav class="slidernavTAG">
      <div id="navbtnsTAG" class="clearfixTAG">
        <a href="#" class="previous" style="opacity: 0; left: 0px;"></a>
      	<a href="#" class="next" style="opacity: 0; right: 3px;"></a>
      </div>
    </nav>
    
    <div class="res crsl-items" data-navigation="navbtnsTAG">
      <div class="crsl-wrap">
		
	<?php 
	  
	  $Tags = getAllTag();
 
	  $TagsColor =array('#A4C8F0','#88BBDD','#6699AA','#A3E7D8','#88DDBB','#88BBAA','#B9E3AE','#BACAB3','#FFFF88','#E1FD8E','#F2ED8C','#F4EFAF','#CBAB8D','#FFDDDD','#FDB4BF'); //15 color
	  $j=0; // for loop TagsColors
	  for($i = 0;$i<count($Tags);$i++){

		if($j==14){$j=0;}//reset color pallet

		echo '<div class="crsl-item">        
					<span class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
					style="background-color:'.$TagsColor[$j++].';padding-top:0px;border-radius: 8px;vertical-align:middle;font-size:1.5em; "> '.$Tags[$i]['Tag'].' </span>
			</div><!-- @end .crsl-items -->';
	  }
	?>
  
       </div><!-- @end .crsl-wrap -->
    </div><!-- @end .crsl-items -->
	</div><!-- @end #w -->

		</div><!-- hotpost -->


</main>

<footer>
	<div class="footer" style="padding-top: 25px;">เว็บไซต์นี้เป็นส่วนหนึ่งของวิชา <strong>MTE-435</strong>.</div>	
</footer>

	</div><!-- wrapper -->




</body>
 
 





<script type="text/javascript">
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
}

function PopRegisterPost(){  // โชว Resgist  Post
	 
	$('#RegisterBox').removeClass( " hide " ).addClass( " show " );
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
	PostTitle  : xPostSubtitle,
 	PostSubtitle : xPostSubtitle, 
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
console.log("USER_ID: <?php echo getUserID();?>  NAME:  <?php echo getname();?> ");

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
</script>

<?php
// PHP ============================
function htmlStar($rate){
	$html = "";
	  $star = ceil($rate/2);

	for($i=1;$i<$star;$i++){
		$html .='<div class="Star"></div>';
		
	}

	return $html ;
}

// PHP pass data to js
function islogged(){
   if(isset($_SESSION['user_info']['User_ID'])){return  'true';}else return 'false';
}
function getUserID(){ if(isset( $_SESSION['user_info']['User_ID'])){return $_SESSION['user_info']['User_ID']; }else return 'false'; }
function getname(){ if(isset( $_SESSION['user_info']['name'])){return $_SESSION['user_info']['name']; }else return 'false'; }
function getAvatarURL(){ if(isset( $_SESSION['user_info']['AvatarURL'])){return $_SESSION['user_info']['AvatarURL']; }else return 'false'; }
 
?>
 