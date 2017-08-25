
<?php
require_once('resources/PHP/func.php');



?>

<head>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>


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

</style>
</head>


<body>
    
<!-- Uses a header that scrolls with the text, rather than staying
  locked at the top -->
  <div class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Title</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Title</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    <!-- Your content goes here -->
    <header class="mdl-layout__header " style="background-color:#E0E0E0;padding-top:10px;">
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
</div>
  </main>



</div>






</body>
<!-- TAE  -->
<script>

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
