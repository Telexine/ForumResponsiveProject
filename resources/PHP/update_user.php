<?php

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
       // เช็คว่ามี USER นี้ยัง ก่อนจะ แก้ไข
       if(UpdateUser($Username, $name, $password, $avatarURL)){
        // สำเร็จ
        echo "200";
       }else{
        // ไม่มี Username นี้ในระบบ , Field  ไม่ complete
        echo "406";
       }

?>