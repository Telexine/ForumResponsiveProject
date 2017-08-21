
<?

require_once('db_config.php');
require_once('func.php'); 

if (!isset($_SESSION)) {
    session_start();
}

       $name = ($_GET['name']);
       $avatarURL = ($_GET['avatarURL']);
       $Username = ($_GET['Username']);
       $password = ($_GET['password']);
 
       $conn  = initDB();

       // เช็คว่ามี USER นี้ยัง
       if(isUserCreated($Username)){
            echo "406";
       }else{
            CreateUser($name,$Username,$password,$avatarURL);
            echo "200";
             
       }

?>