
<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}
 
       $PostTitle = ($_GET['PostTitle']);
       $PostSubtitle = ($_GET['PostSubtitle']); //!@#$%^ คืออะไร
       $PostContent = ($_GET['PostContent']);
       $PostTag = ($_GET['PostTag']);
       $User_ID = ($_GET['User_ID']);

 
       $conn  = initDB();
        
       // เช็คว่ามี USER นี้ยัง
       if( $id = createPost($PostTitle,$PostContent,$User_ID,'',true,$PostTag)){ //!@#$%^ ไม่มี $imurl
            echo $id; // username pass OK
       }else{
            echo "406";  // not ERROR
       }

?>