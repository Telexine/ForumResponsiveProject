
<?php
/*

 $usr_info   = array(
            "User_ID" => $row["User_ID"],
            "name" => $row['Name'],
            "AvatarURL" => $row['AvatarURL']
        );



*/
include('resources/PHP/func.php');
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

<body>

<div  align="center" class="Logo"><a href="#" class="button"><img src="resources/images/logo.png"  width="112" height="112"></a></div> 
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
			
<ul id="SearchList" class="demo-list-three mdl-list">

  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <i class="material-icons mdl-list__item-avatar">person</i>
      <span>Bryan Cranston</span>
      <span class="mdl-list__item-text-body"style="text-align:left">
        Bryan Cranston played the role of Walter in Breaking Bad. He is also known
        for playing Hal in Malcom in the Middle.
      </span>
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

<div id="wrapper">
 

<main  id="main">


    <!-- Your content goes here -->
	<div class="content-grid mdl-grid">
		<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone" style="background-color:#f1f4ff;padding-top:0px;border-radius: 8px; ">
			<h5 class="Font2"><dd> HOT  POST</dd></h5>


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
				<div class="mdl-card__title mdl-card--expand postedImage "  alt="alternative text"   style="object-fit: contain;background: url('.getImageFromContent($Hotpost[$i]['content']).');    background-size:     cover;                   
                background-repeat:   no-repeat;
                background-position: center center; ">
				<h2 class="mdl-card__title-text" style="text-shadow: 2px 2px 4px #000000">'.$Hotpost[$i]['title'].'</h2> 
				</div>
				
				<div class="mdl-card__supporting-text"> by :  
				'.$Hotpost[$i]['name'].'
					</div>
				<div class="mdl-card__actions mdl-card--border">
				<a onClick="goToLink('."'".'post.php?PostID='.$Hotpost[$i]['Post_ID']."')".'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
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
                    style="background-color:'.$TagsColor[$j++].';padding-top:0px;border-radius: 8px;vertical-align:middle;font-size:1.5em; ">
                     <span style="margin: 0;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);">'.$Tags[$i]['Tag'].' </span>
			</div><!-- @end .crsl-items -->';
	  }
	?> 
       </div><!-- @end .crsl-wrap -->
    </div><!-- @end .crsl-items -->
	</div><!-- @end #w -->

		</div><!-- end hotpost -->


</main>

<!-- snack bar -->

<div class="mdl-js-snackbar mdl-snackbar" id="demo-toast-example">
<div class="mdl-snackbar__text">
</div>
<button class="mdl-snackbar__action" type="button"></button>
</div>
 
  
<!-- snack bar -->

<footer>
	<div class="footer" style="padding-top: 25px;">เว็บไซต์นี้เป็นส่วนหนึ่งของวิชา <strong>MTE-435</strong>.</div>	
</footer>

	</div><!-- wrapper -->




</body>
 
 





<script type="text/javascript">



function PopcreatePost(){  // โชว Create Post
    
	if(<?php echo islogged();?>){ // Check islog in in php
	$('#CreatePostBox').removeClass( " hide " ).addClass( " show " );
	$('#backdrop').removeClass( " hide " ).addClass( " show " );
	}else{PopRegisterPost();}// go to login instead
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
 
let xPostContent = document.getElementById('PostContent').value;
let xPostTag = document.getElementById('PostTag').value;
let xUser_ID = <?php echo getUserID(); ?>;//$_SESSION['curUser_ID'];
 

$.post("resources/PHP/createPost.php",
{ 
	PostTitle: xPostTitle,
 
 	PostContent :xPostContent,
	 PostTag  : xPostTag,
	 User_ID  : xUser_ID
},
function(data,status){
					if(status!='success'){  // response == 406
                        notification("ERROR"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
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
          notification('required Field '+check[i].name);
           
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
                        
                        notification("Login success : "+G_name); //จะขึ้น Modal, Breadcrumb
                            
                            //fade out
                        $('#regisOption').removeClass(" fadepopIN"); 
						$('#regisOption').addClass(" fadepopOut");
						location.reload(); 
                    }else if(response==406){
                        notification("Username or password are incorrect"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
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
                                    tagToList();//Refreseh tag list
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
  <script type="text/javascript" src="resources/JS/main.js"></script>
<?php
// PHP ============================


// PHP pass data to js
function islogged(){
   if(isset($_SESSION['user_info']['User_ID'])){return  'true';}else return 'false';
}

?>
 