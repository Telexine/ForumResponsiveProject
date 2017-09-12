<?php
require_once('resources/PHP/func.php');

// ตัวอย่างLink ตอนเข้าหน้านี้ http://localhost/forumresponsiveProject/post.php?PostID=OP1503326319?9
$PostID=$_GET['PostID'];

// ดึงข้อมูลหัวกระทู้
$op=getPost($PostID);
// ดึง  comment  ทั้งหมด ลง array เก้บ ใน comment
$Comment=getPostComment($PostID);





var_dump($op);
echo "<br><br>";

var_dump($Comment);

// Expect output
/*

array(1) { [0]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Title"]=> string(4) "TEST" ["content"]=> string(7) "Content" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(2) "dd" ["isOP"]=> string(1) "1" ["AvatarURL"]=> string(11) "AVARTar URL" } } 

array(2) { [0]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Date"]=> string(19) "2017-09-12 00:00:00" ["content"]=> string(6) "sdsdsd" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(13) "dddddsfsfsfaf" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(11) "AVARTar URL" } [1]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Date"]=> string(19) "2017-09-12 23:29:44" ["content"]=> string(11) "Contentdddd" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(5) "ddddd" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(11) "AVARTar URL" } }

*/
?>