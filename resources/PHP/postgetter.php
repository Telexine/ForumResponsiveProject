<?php 
	require_once('func.php');
	$data = file_get_contents("php://input");
	$data = json_decode($data);
	$listofpost = searchPost($data);
	foreach ($listofpost as $PostID){
		$Post = getTagPost($PostID);
		//echo $PostID;
		//echo $Post;
		//echo implode(", ", $Post[0]);
		echo '  
				<div class="crsl-item">    
				<div class="demo-card-square mdl-card mdl-shadow--2dp floatLeft">
				<div class="rateStar"id="rate?'.$Post[0]['Post_ID'].'">
				'.		  htmlStar(getPostRate($Post[0]['Post_ID'])).
				'</div> 
				<div class="mdl-card__title mdl-card--expand postedImage "  alt="alternative text"   style="object-fit: contain;background: url('.getImageFromContent($Post[0]['content']).');    background-size:     cover;                   
                background-repeat:   no-repeat;
                background-position: center center; ">
				<h2 class="mdl-card__title-text" style="text-shadow: 2px 2px 4px #000000">'.$Post[0]['title'].'</h2> 
				</div>
				
				<div class="mdl-card__supporting-text"> by :  
				'.$Post[0]['name'].'
					</div>
				<div class="mdl-card__actions mdl-card--border">
				<a href="post.php?PostID='.$Post[0]['Post_ID'].'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
				Go to Post
				</a>
				</div>
				</div>
	  			</div>
				';
	}
	
function htmlStar($rate){
    $html = "";
      $star = ceil($rate/2);

    for($i=1;$i<$star;$i++){
        $html .='<span class="fa fa-star"></span>';  // full star
    }
    for($i;$i<=5;$i++){
        $html .='<span class="fa fa-star-o"></span>';  // empty star
    }
    return $html ;
}
?>