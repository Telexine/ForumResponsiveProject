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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
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
					
					
				filebrowserBrowseUrl : './ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : './ckfinder/ckfinder.html?Type=Images',
				filebrowserFlashBrowseUrl : './ckfinder/ckfinder.html?Type=Flash',
				filebrowserUploadUrl : './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				
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
		</main>
		
		
		<footer class=" col-m-12 col-s-hidden col-l-12" style=" position:relative; margin-top:60px;">
				<div class="footer  col-m-12 col-s-hidden col-l-12" style="padding-top: 25px;">เว็บไซต์นี้เป็นส่วนหนึ่งของวิชา <strong>MTE-435</strong>(ฝากแก้ไขข้อความด้วย ไม่รู้จะพิมพ์อะไร)</div>	
		</footer>

		</nav>
</div> <!-- wrapper -->

</body>
</html>