<?php
require_once('config/db_config.php');


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['logout']))
{
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
}

 
function  isUserCreated($ID) //username  นี้มีในฐานข้อมูลยัง  (True: มีแล้ว False: ยัง)
{
    $conn = initDB();
    $sql =  "SELECT ID  FROM ForumResponsive.TBUser WHERE ID = '$ID'";
    $fetch = $conn->query($sql);
        if (mysqli_num_rows($fetch) > 0){return true;}// มีแล้ว
        else { return false;}//  ยัง 
}
function CreateUser($ID,$NAME,$PW,$Avartar){  // PW ตอนเรียกต้องใส่ MD5 
    $conn = initDB();
    if(isUserCreated($ID)){return;} //ถ้ามีIDนี้ จะยกเลิก
    if($Avartar=""){$Avartar="/resources/images/avatar/default_Avatar.jpg";} //ใส่ default image ถ้าไม่มี
   
    $sql =  "INSERT INTO ForumResponsive.TBUser (`User_ID`, `Name`, `ID`, `PW`, `Created_date`, `AvartarURL`)"
    ."VALUES (NULL,'$NAME','$ID','$PW',CURRENT_TIMESTAMP, '$Avartar')";
    // query insert
    $conn->query($sql);
    return true ;
}

function UpdateUser($ID,$NAME,$PW,$Avartar){
  $conn = initDB();
  if ((!isUserCreated($ID))or((trim($NAME)=="")&&(trim($PW)=="")&&(trim($Avartar)==""))){return;} //ถ้าไม่มีIDนี้ หรือไม่มีค่าทุก field จะยกเลิก

  $sql = "UPDATE ForumResponsive.TBUser SET ".(!trim($NAME)==""? " `Name` ='$NAME' " :"")
                                            ."".(!trim($PW)==""? " `PW`   ='$PW'    ":"")
                                            ."".(!trim($Avartar)==""? "`AvartarURL`= '$Avartar' ":"")
    ."WHERE `ID` = '$ID' ";
    // query insert
    $conn->query($sql);
    return true ;

}
function SearchPost(){} // return array?
function getPost(){}  // return array?
function showPost(){}




























//    PRIVATE FUNCTION (Backend)
    function fetch2Array($TBNAME,$WHERE){
        
            $ar  = array();
            $conn = initDB();
            $sql = "SELECT *  FROM ".$TBNAME;
        
              if(isset($WHERE)) {
                $sql = $sql." WHERE ". $WHERE;
              }
              $fetch = $conn->query($sql);
                if (!$fetch) {
                  return null;
                   // NO USER
                   //throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
                }
        
              $row  = $fetch->fetch_assoc();
                if (is_array($row) || is_object($row))
                  {
                    foreach($row as $key => $value) {
                       $ar[]  = $value;
                 }
               }else return null ;
        
              return   $ar;
        }
        

?>