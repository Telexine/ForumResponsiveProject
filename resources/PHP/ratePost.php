




<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}
     
       $star = ($_POST['Rate']);
       $User_ID = ($_POST['User_ID']); //!@#$%^ คืออะไร
       $Post_ID = ($_POST['Post_ID']);

        
       // เช็คว่ามี USER นี้ยัง
       if( UpdateRate($star/* 0-10 */,$User_ID,$Post_ID)){ //!@#$%^ ไม่มี $imurl
            echo "200"; //   pass OK
       }else{
            echo "406";  //   ERROR
       }

?>