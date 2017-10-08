
<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}
 
       //$tag = ($_POST['tag']);
       $tag = array('cake');
 /*
 return => array(3) { [0]=> string(14) "OP1503326319?9" [1]=> string(15) "OP1507304608?22" [2]=> string(15) "OP1507381677?23" }
  */
       $conn  = initDB();
        $postResult=array();
       // เช็คว่ามี USER นี้ยัง
       $PostList = searchPost($tag);

       $i = 0;
       foreach ($PostList as $list ){
         // 
// Expect output
/*

array(1) { [0]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Title"]=> string(4) "TEST" ["content"]=> string(7) "Content" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(2) "dd" ["isOP"]=> string(1) "1" ["AvatarURL"]=> string(11) "AVARTar URL" } } 

array(2) { [0]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Date"]=> string(19) "2017-09-12 00:00:00" ["content"]=> string(6) "sdsdsd" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(13) "dddddsfsfsfaf" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(11) "AVARTar URL" } [1]=> array(7) { ["Post_ID"]=> string(14) "OP1503326319?9" ["Date"]=> string(19) "2017-09-12 23:29:44" ["content"]=> string(11) "Contentdddd" ["User_ID"]=> string(1) "9" ["imageURL"]=> string(5) "ddddd" ["isOP"]=> string(1) "0" ["AvatarURL"]=> string(11) "AVARTar URL" } }

*/
            $r  =  getPost($list);
         
            $postResult[$i++]= $r;
           print_r($postResult);echo "<br>";
         }
      //var_dump(implode(" ", $postResult[0][0]));

        
       

?>
