
<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}
 
       $PostTitle = ($_POST['PostTitle']);
 
       $PostContent = ($_POST['PostContent']);
       $PostTag = ($_POST['PostTag']);
       $User_ID = ($_POST['User_ID']);
 
 
       $conn  = initDB();
        
       // เช็คว่ามี USER นี้ยัง
       if( $id = createPost($PostTitle,$PostContent,$User_ID,'',true,$PostTag)){ 
            echo $id; // username pass OK
       }else{
            echo "406";  // not ERROR
       }

?>