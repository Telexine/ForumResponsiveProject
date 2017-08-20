<?php

// พิมพ์ include ไฟลนี้และใช้ function/    initDB();     /   นี่เพื่อต่อกับฐานข้อมูล
function initDB() {
 
   // $pwloc = "cm9vdGVydQ==";
 
            $svn = "localhost";
            $usr = "root";
            //$pw  = base64_decode($pwloc) ;
            $pw  = '' ;
            $conn = mysqli_connect($svn, $usr, $pw);
     
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else {
              echo '<?-- Connected to DB --><br> ';
              mysqli_set_charset($conn,"utf8");
              return $conn;
            }


        }

 ?>
