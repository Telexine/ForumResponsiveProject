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
            echo "Error, This User Name ' ".$Username." ' is in use"; // ถ้ามีอะ alert 
       }else{
            CreateUser($name,$Username,$password,$avatarURL);
            echo "Succesful!! Welcome ".$name;
            login($Username,$password);
       }

?>