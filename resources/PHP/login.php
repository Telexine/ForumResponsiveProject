
<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}

      
       $Username = ($_GET['Username']);
       $password = ($_GET['password']);
 
       $conn  = initDB();

       // เช็คว่ามี USER นี้ยัง
       if(login($Username,$password)){
            echo "200"; // username pass OK
       }else{
            echo "406";  // not found
       }

?>