
<?php
require_once('resources/PHP/func.php');

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
				<li><a href="#" class="o"><span class="fa fa-magic" style="font-size: 30px;padding-top: 12px;"><p class="Font">  CreatePost</p></a></li>
				<li><a href="#" class="o"><span class="fa fa-smile-o" style="font-size: 30px;padding-top: 12px;"><p class="Font">  About</p></a></li>
			</ul>
		</nav>	
		</header>



<div id='backdrop' class="modal hide" onClick="hideAll();"></div>
<div id="CreatePostBox"class="modal hide"><!-- CreatePostBox -->


<div style="margin-bottom: 50px; color: aliceblue; text-align: center;" class="col-l-12">
                    <div align="center"  class=" col-l-12 col-m-12" style="border-radius:10px; 
	background-color:#dbe4ea;">
                    	<form action="insert-p.php" method="get">
	<table align="center" class="Font2 fa-2x" style="padding:30px; ">
    	<tr><td colspan="1">Title: </td>
        <td><input type="text" name="title" class="fa" style="width:100%; border-radius:5px;"></td></tr>
        <tr><td>Subtitle: </td><td><input type="text" name="subtitle" style="width:100%;border-radius:5px;" class="fa"></td></tr>
        <tr><td>Content: </td><td><textarea name="address" id="address" ></textarea>
           	<script type="text/javascript">
			//<![CDATA[
				CKEDITOR.replace( 'address',{
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
        <tr><td>TAG: </td><td><input type="text" name="tag" class="fa" style="width:100%; border-radius:5px;"></td></tr>
        <tr><td colspan="2" align="right"><input type="submit" value="Submit" class="Font2 fa" style="border-radius:5px; 
        background-color:#263c4b; color:aliceblue; padding:10px; padding-top:15px;"></td></tr>
    </table>
                    </div>
                </div>



</div> <!-- CreatePostBox -->

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


  
    

             
 <!-- post   -->
 
		 <?php 
		 
		 //$Hotpostnum = count($Hotpost);  // number of fetch hot post 

		 /*
		 
		 Array ( [0] => Array ( [Post_ID] => OP1503326319?9 [title] => TEST [count] => 6 
		 [DATE] => 2017-08-21 21:38:44 [popular] => 8.5000 [imageURL] => dd [content] => Content [name] => เต้ ) ) 
		 
		 */
		//print_r($Hotpost);
	//	echo $Hotpost[0]['Post_ID'];
		  for($i = 0;$i<count($Hotpost);$i++){
	
				echo '  
				<div class="crsl-item">    
				<div class="demo-card-square mdl-card mdl-shadow--2dp floatLeft">
				<div class="rateStar"id="rate?'.$Hotpost[$i]['Post_ID'].'">
				'.		  htmlStar(getPostRate($Hotpost[$i]['Post_ID'])).
				'</div> 
				<div class="mdl-card__title mdl-card--expand">
				<h2 class="mdl-card__title-text">'.$Hotpost[$i]['title'].' <p> '.$Hotpost[$i]['name'].' </p> </h2> 
				</div>
				
				<div class="mdl-card__supporting-text">
				'.$Hotpost[$i]['content'].'
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
        
        <div class="crsl-item">        
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
 			style="background-color:#A4C8F0;padding-top:0px;border-radius: 8px; "> 1 </button>
 		</div><!-- @end .crsl-items -->
 		
 		<div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#88BBDD;padding-top:0px;border-radius: 8px; "> 2 </button>
		</div><!-- @end .crsl-items -->
     
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#6699AA;padding-top:0px;border-radius: 8px; "> 3 </button>
		</div><!-- @end .crsl-items -->
    
    <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#A3E7D8;padding-top:0px;border-radius: 8px; "> 4 </button>
		</div><!-- @end .crsl-items -->
    
    <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#88DDBB;padding-top:0px;border-radius: 8px; "> 5 </button>
		</div><!-- @end .crsl-items -->
   
    <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#88BBAA;padding-top:0px;border-radius: 8px; "> 6 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#B9E3AE;padding-top:0px;border-radius: 8px; "> 7 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#BACAB3;padding-top:0px;border-radius: 8px; "> 8 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#FFFF88;padding-top:0px;border-radius: 8px; "> 9 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#E1FD8E;padding-top:0px;border-radius: 8px; "> 10 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#F2ED8C;padding-top:0px;border-radius: 8px; "> 11 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#F4EFAF;padding-top:0px;border-radius: 8px; "> 12 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#CBAB8D;padding-top:0px;border-radius: 8px; "> 13 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#FFDDDD;padding-top:0px;border-radius: 8px; "> 14 </button>
		</div><!-- @end .crsl-items -->
    
     <div class="crsl-item">   
			<button class="TAGbot mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect floatLeft" 
			style="background-color:#FDB4BF;padding-top:0px;border-radius: 8px; "> 15 </button>
		</div><!-- @end .crsl-items -->
    
    
     
      
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

<!-- TAE  -->
<script>



	/*
	
	SELECT  a.Post_ID, COUNT(a.Post_ID) count, b.DATE
FROM ForumResponsive.TBPost as a ,ForumResponsive.TBmeta as b 
WHERE a.Post_ID = b.Post_ID  
GROUP BY a.Post_ID
ORDER BY b.DATE DESC LIMIT 3;
	

 <!-- post #1 -->
 


	*/
	 // Add a message to the messages element.
	 function appendPost(PostID,imageURL,Title,Nickname,content) {
		 imageURL = "";
		  Title="title";Nickname="nickname";content="content";
	   //GET WHERE to append post
	   const cardElement = document.querySelector('#crsl');

		//create element 

		const crslItem = document.createElement('div');
		
		const cardDivElement = document.createElement('div');

		const rateElement = document.createElement('div');

		const titleElement = document.createElement('div');

		const title_text = document.createElement('h2');

		const contentElement = document.createElement('div');

		const buttonBox = document.createElement('div');

		const buttonElement =document.createElement('div');
   

	   // add class 
	   crslItem.className = "crsl-item  crsl-active " ;
	   cardDivElement.className = " demo-card-square mdl-card mdl-shadow--2dp floatLeft";
	   rateElement.className = "rateStar"; // add ID 

		 titleElement.className = "mdl-card__title mdl-card--expand";
		 title_text.className = "mdl-card__title-text";
		 contentElement.className = "mdl-card__supporting-text";
		 buttonBox.className = "mdl-card__actions mdl-card--border";
		 buttonElement.className = "mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect";

		// Add ID and Attrbute

 
		buttonElement.setAttribute("href", "/post.php?PostID="+PostID);

	   //int metadata 

	   crslItem.style =" position: relative; float: left; overflow: hidden; width: 351px; margin-right: 10px; height: 340px;";
		 title_text.textContent = Title+" "+Nickname+" ";
		 title_text.style.background = "url('"+imageURL+"') center / cover";

		 contentElement.textContent = content;
		 buttonElement.innerHTML= "GO TO POST";
  
	   //append Messgage
	   crslItem.appendChild(cardDivElement);
	   cardDivElement.appendChild(titleElement);
	   titleElement.appendChild(title_text);
	   cardDivElement.appendChild(contentElement);
	
	   
	   buttonBox.appendChild(buttonElement);
 

	   cardDivElement.appendChild(rateElement);
		 cardDivElement.appendChild(buttonBox);

	   cardElement.appendChild(crslItem);
	 }
</script>



<style>
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

</style>

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


function createPostPop(){
	 
	$('#CreatePostBox').removeClass( " hide " ).addClass( " show " );
	$('#backdrop').removeClass( " hide " ).addClass( " show " );
	
}
function hideAll(){
	$('#CreatePostBox').removeClass( " show " ).addClass( " hide " );
	$('#backdrop').removeClass( " show " ).addClass( " hide " );
}
</script>

<?php

function htmlStar($rate){
	$html = "";
	  $star = ceil($rate/2);

	for($i=1;$i<$star;$i++){
		$html .='<div class="Star"></div>';
		
	}

	return $html ;
}
?>


