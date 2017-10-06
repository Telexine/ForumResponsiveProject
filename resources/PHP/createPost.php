
<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}
 
       $PostTitle = ($_POST['PostTitle']);
       $PostSubtitle = ($_POST['PostSubtitle']); //!@#$%^ คืออะไร
       $PostContent = ($_POST['PostContent']);
       $PostTag = ($_POST['PostTag']);
       $User_ID = ($_POST['User_ID']);

 
       $conn  = initDB();
        
       // เช็คว่ามี USER นี้ยัง
       if( $id = createPost($PostTitle,$PostContent,$User_ID,'',true,$PostTag)){ //!@#$%^ ไม่มี $imurl
            echo $id; // username pass OK
       }else{
            echo "406";  // not ERROR
       }

?>