
<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}
    
       $Content = ($_POST['PostContent']);
       $Post_ID = ($_POST['Post_ID']);
       $User_ID = ($_POST['User_ID']);
 

  
       $conn  = initDB();
        
       // เช็คว่ามี USER นี้ยัง
       if( comment($Post_ID,$Content,$User_ID)){ //!@#$%^ ไม่มี $imurl
            echo "200"; // pass OK
       }else{
            echo "406";  //   ERROR
       }

?>