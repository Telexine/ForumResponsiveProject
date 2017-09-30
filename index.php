
<?php
require_once('resources/PHP/func.php');



?>

<head>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" type="text/css" href="resources/css/Webcss.css">

<link rel="stylesheet" href="resources/css/font-awesome.css">

<style>
.demo-card-square.mdl-card {
  width: 320px;
  height: 320px;
  margin:20px
}
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
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
</style>
</head>


<body>
		 
<div  align="center" class="Logo"><img src="resources/images/logo.png"  width="112" height="112"></div>
	<header>
		<input type="checkbox" id="btn-menu">
		<label for="btn-menu"><img src="resources/images/list.png" width="30" height="30" alt=""/></label>
		<nav class="Menu" style=" z-index:14">
			<ul>
				<li><a href="#"><span class="fa fa-home icon-menu">  Home</a></li>
				<li><a href="#"><span class="fa fa-search">  Search</a></li>
				<li><a href="#"><span class="fa fa-magic">  Create</a></li>
				<li><a href="#"><span class="fa fa-user-circle">  Login</a></li>
				<li><a href="#"><span class="fa fa-smile-o">  About</a></li>
			</ul>
		</nav>	
	</header>



    <!-- Your content goes here -->
    <header class="mdl-layout__header " style="background-color:#E0E0E0;padding-top:10px;">

  <!-- Xureality Tag-->
		<div>
		<form>
           <div id="tagbox"><span id="tagDisplay"></span><input id="textin" class="taginput" type="text" onkeyup="showHint(this.value)"></div>
        </form>
        
        <p>
           <span id="tagHint"></span>
        </p></div>

  <!-- Xureality Tag-->
	
        <h5>      HOT  POST</h1>
        </header>
    <div id="hotpost" style="width:87%;margin:auto">
    
    <div class="demo-card-square mdl-card mdl-shadow--2dp floatLeft">
			<div class="mdl-card__title mdl-card--expand">
				<h2 class="mdl-card__title-text">ประกาศจ้าา    <p> tae</p> </h2> 
			</div>

		<div class="mdl-card__supporting-text">
			งานทำยังไมเสร็จ
		</div>
		<div class="mdl-card__actions mdl-card--border">
			<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
				Go to Post
			</a>
			<div class="rate"></div>
		</div>
</div>











 



</div>






</body>
<!-- TAE  -->
<script>



	/*
	
	SELECT  a.Post_ID, COUNT(a.Post_ID) count, b.DATE
FROM ForumResponsive.TBPost as a ,ForumResponsive.TBmeta as b 
WHERE a.Post_ID = b.Post_ID  
GROUP BY a.Post_ID
ORDER BY b.DATE DESC LIMIT 3;
	
	*/




	 // Add a message to the messages element.
	 function appendPost(PostID,imageURL,Title,Nickname,content) {
		 imageURL = "";
		  Title="title";Nickname="nickname";content="content";
	   //GET WHERE to append post
	   const cardElement = document.querySelector('#hotpost');

		//create element 
	   const cardDivElement = document.createElement('div');
	   const titleElement = document.createElement('div');
		 const title_text = document.createElement('h2');
	   const contentElement = document.createElement('div');
	   const buttonBox = document.createElement('div');
		 
	   const buttonElement =document.createElement('div');
		 const rateElement = document.createElement('div');

	   // add class 

	   cardDivElement.className = " demo-card-square mdl-card mdl-shadow--2dp floatLeft";
		 titleElement.className = "mdl-card__title mdl-card--expand";
		 title_text.className = "mdl-card__title-text";
		 contentElement.className = "mdl-card__supporting-text";
		 buttonBox.className = "mdl-card__actions mdl-card--border";
		 rateElement.className="rate";
		 buttonElement.className = "mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect";

	   //int metadata 
		 title_text.textContent = Title+" "+Nickname+" ";
		 title_text.style.background = "url('"+imageURL+"') center / cover";
		 contentElement.textContent = content;
		 buttonElement.innerHTML= "GO TO POST";
  
	   //append Messgage

	   cardDivElement.appendChild(titleElement);
	   titleElement.appendChild(title_text);
		 cardDivElement.appendChild(contentElement);
	
	   
	   buttonBox.appendChild(buttonElement);
	   buttonBox.appendChild(rateElement);

		 cardDivElement.appendChild(buttonBox);

	   cardElement.appendChild(cardDivElement);
	 }
</script>

<style>
.floatLeft{
	float: left;

}


</style>
