<?php 
	require_once('func.php');
	$data = file_get_contents("php://input");
	$data = json_decode($data);
	$listofpost = searchPost($data);
	if (empty($listofpost)){return;}
	foreach ($listofpost as $PostID){
		 $Post = getTagPost($PostID);
		//echo $PostID;
		//echo $Post;
		//echo implode(", ", $Post[0]);
		if (empty($Post)){return;}
		echo '  
				<li class="mdl-list__item mdl-list__item--three-line"style="margin-bottom:20px;background-color:#263c4b;border-radius: 10px;padding: 80px;">
					<span class="mdl-list__item-primary-content" style="margin-bottom:20px;">
						<i class="material-icons mdl-list__item-avatar"style="">person</i>
						<span class ="mdl-list__item-text-body"style="text-align:left"> <a  style="font-size:1.7em;text-align:left;float: left;" href="post.php?PostID='.$Post[0]['pid'].'"> <span style="text-decoration:none;color: white;">User :  </span> '.$Post[0]['uname'].'</a></span>
						<span class="mdl-list__item-text-body" style="font-size:1.7em;text-align:left"<br>
							<a  class="ttext" href="post.php?PostID='.$Post[0]['pid'].'"> <span style="text-decoration:none;color: white;line-height: 1;" >Title :  </span>' .$Post[0]['title'].'</a><br>
						</span>
					</span>  
				</li>
				';
	}
?>