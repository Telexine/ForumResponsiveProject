
<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}
  
       $Content = ($_POST['PostContent']);
       $PostID = ($_POST['PostID']);
       $User_ID = ($_POST['User_ID']);

 
       $conn  = initDB();
        
       // เช็คว่ามี USER นี้ยัง
       if( comment($PostID,$Content,$UserID)){ //!@#$%^ ไม่มี $imurl
            echo "200"; // pass OK
       }else{
            echo "406";  //   ERROR
       }

?>