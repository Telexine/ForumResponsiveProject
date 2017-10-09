
<?php
require_once('resources/PHP/func.php');

// ตัวอย่างLink ตอนเข้าหน้านี้ http://localhost/forumresponsiveProject/post.php?PostID=OP1503326319?9
$PostID=$_GET['PostID'];

// ดึงข้อมูลหัวกระทู้
$op=getPost($PostID);
// ดึง  comment  ทั้งหมด ลง array เก้บ ใน comment
 $getComment=getPostComment($PostID);


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
<script>
document.onreadystatechange = function () {
  var state = document.readyState;
  if (state == 'interactive') {
    blurAll();
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         $("#loadbg").fadeOut();
         $("#borderload").fadeOut();
         $("#pgload").fadeOut();

         setTimeout(function(){
 
            removeBlurAll();
      },1000);
      },500);
  }
}

	
	</script>
</head>

<body>
<!-- Load -->
<div id="loadbg">
			<div id="borderload" >
			<div id="pgload"></div>
            </div></div>
   <!-- Load -->         

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

<!-- snack bar -->

<div class="mdl-js-snackbar mdl-snackbar" id="demo-toast-example">
<div class="mdl-snackbar__text">
</div>
<button class="mdl-snackbar__action" type="button"></button>
</div>
 
  
<!-- snack bar -->

<!-- CreatePostBox -->
<div id='backdrop' class="modal  hide" onClick="hideAll();"></div>
<div id="CreatePostBox"class="modal hide">

 


<div style="margin-bottom: 50px; color: aliceblue; text-align: center;" class="col-l-12">
            <div align="center"  class=" col-l-12 col-m-12" style="border-radius:10px;background-color:#dbe4ea;">
             
            <button type="button" class="closebtnModal"onClick="hideAll();" data-dismiss="modal"><span style="font-size: 3em;" aria-hidden="true">×</span></button> <!-- Close Btn -->

<table align="center" class="Font2 fa-2x" style="padding:30px; ">
<tr><td colspan="1">Title: </td>
<td><input type="text" name="title" class="fa" id="PostTitle" style="width:100%; border-radius:5px;"></td></tr>
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
         <input id="Login_Pass" name="password" class="reqLog Regisinput" type="password"> <!-- TAE  -->
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
<ul id="searchTagPostView" class="demo-list-three mdl-list">

<li class="mdl-list__item mdl-list__item--three-line">
<span class="mdl-list__item-primary-content">

  <span>Type To search Tag</span>

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
				<div class="" aling="center" style="margin:auto;box-sizing:content-box; border-radius:10px; background-color:#263c4b; height:120px; width:120px;object-fit: contain;background: url('<?php echo $op[0]["AvatarURL"] ?>');    background-size:     cover;                   
	background-repeat:   no-repeat;
	background-position: center center; ">
		 
		

				
				</div>
<!--avartar -->
		
				<div class="col-l-12 col-m-12 col-s-12"><p class="Font2"><?php echo getName( $op[0]["User_ID"]);?></p></div>

			</div>

			<div class="col-l-10 col-m-9 col-s-12" style="box-sizing:border-box; padding-left:25px;">
				
				<div class="col-m-12"  style="height: 100%;box-sizing:content-box; border-radius:10px; background-color:#263c4b;padding-top:10px;padding-bottom:10px; width:100%; ">
						<div class="col-m-12 textcom"style="text-align:left">	<?PHP echo $op[0]["content"]; ?>  </div> <!---  Post content -->
				</div>

				<div class="col-l-12" style="box-sizing:content-box; border-radius:10px; background-color:#263c4b; height:400px; width:auto; ">

				</div>
				
				<div class="col-l-12 col-m-12 col-s-12" style="padding-top:10px;">
					<h1 class="Font2" style="font-size:24px;float:left">Rating : 
						<?php
						echo htmlStarsubmit(getPostRate($op[0]['Post_ID']));
						?>
					</h1>
	 
				</div>

			</div>



		</div>
		
        <!-- Comment -->
        
        </div> 
        <div class=" col-l-12 col-m-12 col-s-12" style="box-sizing:border-box; border-radius:5px; background-color:#dbe4ea;padding-top:5px;padding-left:5px;">
			<p class="Font2" style="margin:0px;"><h1 style="color:#263c4b;text-align:left;padding-left:20px"> <?php echo count($getComment); ?> Comments</h1></p>
			
			<div id='CommentSection'>
     
<?php 
/*

array(2) { [0]=> array(7) { ["Post_ID"]=> string(15) "OP1507304724?22" ["Date"]=> string(19) "2017-10-08 19:23:44" ["content"]=> string(29) "
asdsafadgadshsjfydjht

" ["User_ID"]=> string(2) "23" ["imageURL"]=> string(0) "" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(42) "resources/images/avatar/default_Avatar.jpg" } [1]=> array(7) { ["Post_ID"]=> string(15) "OP1507304724?22" ["Date"]=> string(19) "2017-10-08 19:26:37" ["content"]=> string(12) "
Data

" ["User_ID"]=> string(2) "23" ["imageURL"]=> string(0) "" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(42) "resources/images/avatar/default_Avatar.jpg" } }
 
 */
 
        foreach ($getComment as $rows){
            
           
		echo ' <div class=" col-l-12 col-m-12 col-s-12" style="box-sizing:border-box; border-radius:10px;   padding-bottom:40px; padding-top:25px; padding-left:25px; padding-right:25px;margin-bottom:20px;">
   
                
                <div class="col-l-2 col-m-3 col-s-12" style="box-sizing:border-box; padding-right:25px;">
            <!-- avartar --> 
                 <div class="" aling="center" style="  margin: auto;box-sizing:content-box; border-radius:10px; background-color:#263c4b; height:120px; width:120px;object-fit: contain;background: url( '."'". trim($rows["AvatarURL"])."'".');    background-size:     cover;                   
                background-repeat:   no-repeat;
                background-position: center center; "> 
    
                </div>
            <!--end avartar -->
    
            <div class="col-l-12 col-m-12 col-s-12"><p class="Font2"> <p class="Font2"style="text-align:center;font-size:2em"> User :'.getName($rows["User_ID"]).'</p></div>
            </div>

        <div class="col-l-10 col-m-9 col-s-12" style="height: 100%;box-sizing:border-box; padding-left:25px;">
            
            <div class="col-m-12  " style="box-sizing:content-box; border-radius:10px;height: 100%;text-align:left; background-color:#263c4b; width:95%;">
                     <div class="col-m-12 textcom " style="padding:20px">   '. $rows['content'].'    </div> <!---  Post content -->
            </div>
            <div style="width: 540px;
            height: 30px;
            background-color: pink;
            border-radius: 20px;
            position: absolute;
            margin-left: 55%;
            margin-top: 20px;"
            >
            <!-- Title --> 
            <span style="color:#263c4b;text-align:left;float: left;padding-left:30px;" >Repiled to : '.$op[0]["Title"].' at '.$rows['Date'].'</span>
            <!-- END title -->
            
            </div>
            
        </div>
            


    </div>' ;


        }
?>

 
		

		<!-- end Commentxxxxxx -->
        </div>
    </div>
 <hr  size=30>
    
        <!--Postiing comment  -->
        
        
<div style="width:100%:margin-top:20px;margin-bottom: 50px; background-color: aliceblue;">
<h2 class="fa">Wanna Post ? </h2>


<!-- Post comment  Avatar       -->
	<div class="col-l-2 col-m-3 col-s-12"style="float:left;padding-top: 30px;">
	<div class="" aling="center" style="box-sizing:content-box;    margin: auto; border-radius:10px; background-color:#263c4b; height:120px; width:120px;object-fit: contain;background: url('<?php echo getAvatarURL();?> ');    background-size:     cover;                   
	background-repeat:   no-repeat;
	background-position: center center; "></div>
	<div  style="padding-top:30px;"><p class="Font2"style="text-align:center;font-size:2em"> User :
    <?php 
    if(getcname()!='false'){
        echo getcname();
         
    }else {
        echo 'Not Login';
    }
          
                
                ?>
                </p>
		</div>
	</div>

		<!--Post comment content   -->

		<div style="col-l-8 col-m-7 col-s-12" style="float:left">
			<table align="center" class="Font2 fa-2x" style="padding:30px;    width: 100%; ">
    	 
        <tr><td>Comment: </td><td><textarea name="Comment" id="Comment" ></textarea>
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
        <tr><td colspan="2" align="right"><input type="submit" onClick="submitcomment();" value="Submit" class="Font2 fa" style="border-radius:5px; 
        background-color:#263c4b; color:aliceblue; padding:10px; padding-top:15px;"></td></tr>
	</table>
	</div>
</div></div>


		</main>
		




		
		<footer class=" col-m-12 col-s-hidden col-l-12" style=" position:relative; margin-top:60px;">


				<div class="footer  col-m-12 col-s-hidden col-l-12" style="padding-top: 25px;">
					
				
				
				
                เว็บไซต์นี้เป็นส่วนหนึ่งของวิชา <strong>MTE-435</strong> 
              
    <?php if(getUserID()!='false'){
        echo "Hello! ".getcname(). "  <button onClick='logout();'> Logout</button>";
    }?> 
    
</div>	
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
                        notification("Can't rate this post"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                    else{
                        notification("Success"); //จะขึ้น Modal, Breadcrumb
                        goToLink('post.php?PostID='+'<?php echo $PostID; ?>');
				      	//	$(location).attr('href', 'post.php?PostID='+'<?php echo $PostID; ?>');
                    }
});

}


function submitcomment(){
//check validate here 
 
let xUser_ID = <?php echo getUserID(); ?>;//$_SESSION['curUser_ID'];
 if(xUser_ID==false){
//  pop login
PopRegisterPost();
	return;
 }

let Content  = document.getElementById('Comment').value;  
 if(Content==""){notification("Please type the comment");return;}
$.post("resources/PHP/comment.php",
{ 
	PostContent: Content,
	User_ID  : xUser_ID,
	Post_ID :  '<?php echo $PostID; ?>'
},

function(data,status){
					if(data=='406'){  // response == 406
                        notification("Can't comment"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                    else{
                        notification("success!"); //จะขึ้น Modal, Breadcrumb
                        goToLink('post.php?PostID='+'<?php echo $PostID; ?>');
                    }
});

}






function PopcreatePost(){  // โชว Create Post
    
	if(<?php echo islogged();?>){ // Check islog in in php
	$('#CreatePostBox').removeClass( " hide " ).addClass( " show " );
    $('#backdrop').removeClass( " hide " ).addClass( " show " );
    blurAll();
	}else{PopRegisterPost();blurAll();}// go to login instead
}
timer = setInterval(updateDiv,100);
function updateDiv(){
    var editorText = CKEDITOR.instances.PostContent.getData();
    $('#PostContent').html(editorText);
    var editorComment = CKEDITOR.instances.Comment.getData();
    $('#Comment').html(editorComment);
}
 
// FUNCTION POSTforumn
function submitPost(){
//check validate here 



let xPostTitle = document.getElementById('PostTitle').value;
let xPostContent = document.getElementById('PostContent').value;
let xPostTag = document.getElementById('PostTag').value;
let xUser_ID = <?php echo getUserID(); ?>;//$_SESSION['curUser_ID'];
 
if(xPostContent==""||xPostTitle==""){
    notification('Please Fill the Post');
    return false;
}

$.post("resources/PHP/createPost.php",
{ 
	PostTitle: xPostTitle,
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
                        
                        notification("Login success  for : "+G_name); //จะขึ้น Modal, Breadcrumb

                            //fade out
                        $('#regisOption').removeClass(" fadepopIN"); 
						$('#regisOption').addClass(" fadepopOut");
						location.reload(); 
                    }else if(response==406){
                        notification("Username or password are incorrect");// ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                }
            };
             
            xmlhttp.open("GET","resources/PHP/login.php?Username="+Username+"&password="+password,true);
            xmlhttp.send();


}
console.log("USER_ID: <?php echo getUserID();?>  NAME:  <?php echo getcname();?> ");
 
//END FUNCTION REGISTER / LOGIN 



     // XU
     
	 var tagged = [];
     //showHint takes a string and does tons of stuff and i can't be bothered to write the manual for this
     function showHint(str) {
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
                         link.className= "mdl-chip__text ";
                         link.style= ""
                         link.href =  '#';
                         link.addEventListener("click", function (e) 
                         { 
                             frag = fragmentFromString("<span id='hint' style ='padding:5px;border-radius:10px;color:white;margin-left:5px;background-color:#263c4b;'class=''><span id='hinttext'>" + e.target.innerHTML + "</span><span><button type='button' class='mdl-chip__action close'><i class='material-icons '>cancel</i></button></span></span> ");
                             tagged.push(e.target.innerHTML);
                             document.getElementById("tagDisplay").appendChild(frag); 
                             document.getElementById("textin").value = "";
                             e.target.parentElement.removeChild(e.target);
                             makecloseable();
                             tagToList();//Refreseh tag list
                             showPostSearch(tagged);
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
     //showPost takes an array of whatever tags and updates recommendedTagPostView with posts from postgetter.php
     function showPost(arr) {
         console.log(arr);
         var xmlhttp = new XMLHttpRequest();
             
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("recommendedTagPostView").innerHTML = this.responseText;
             }	
         };	
         xmlhttp.open("POST", "resources/PHP/postgetter.php");
         xmlhttp.setRequestHeader( "Content-Type", "application/json" );
         console.log(JSON.stringify(arr));
         xmlhttp.send(JSON.stringify(arr));
     }
     //same, but for search
     function showPostSearch(arr) {
         console.log(arr);
         var xmlhttp = new XMLHttpRequest();
             
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("searchTagPostView").innerHTML = this.responseText;
             }	
         };	
         xmlhttp.open("POST", "resources/PHP/postgetter.php");
         xmlhttp.setRequestHeader( "Content-Type", "application/json" );
         console.log(JSON.stringify(arr));
         xmlhttp.send(JSON.stringify(arr));
     }
     function fragmentFromString(strHTML) {
         var temp = document.createElement('template');
         temp.innerHTML = strHTML;
         return temp.content;
     }
     function makecloseable() {
         var elements = document.getElementsByClassName('close');
         console.log(elements.length);
         for (var i = 0; i < elements.length; i++){
             console.log(elements[i]);
             elements[i].addEventListener("click", function(){
                 var frag = fragmentFromString(this.parentNode.parentNode.parentNode.innerHTML);
                 console.log(frag);
                 var list = frag.getElementById("hinttext").innerHTML;
                 console.log(list);
                 for (j = 0; j < tagged.length; ++j)
                 {
                     if (list == tagged[j])
                     {
                         tagged.splice(j, 1);
                     }
                 }
                 this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
                 showPostSearch(tagged);
                 return false;
             });
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
<script type="text/javascript" src="resources/JS/main.js"></script>

<?php

// PHP ============================
 
function htmlStarsubmit($rate){
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
 
?>
 


