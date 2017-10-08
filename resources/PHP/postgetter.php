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
		echo '  
				<li class="mdl-list__item mdl-list__item--three-line">
					<span class="mdl-list__item-primary-content">
						<i class="material-icons mdl-list__item-avatar">person</i>
						<span style="text-align:left"><a href="post.php?PostID='.$Post[0]['pid'].'">'.$Post[0]['uname'].'</a></span>
						<span class="mdl-list__item-text-body" style="text-align:left">
							<a href="post.php?PostID='.$Post[0]['pid'].'">'.$Post[0]['title'].'</a>
						</span>
					</span>  
				</li>
				';
	}
?>