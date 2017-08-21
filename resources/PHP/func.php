<?php

require_once('db_config.php');

if (!isset($_SESSION)) {
    session_start();
}

//  PHP DATABASE FUNCTION ----------------------------------------------------------- 


function isUserCreated($UserName) //username  นี้มีในฐานข้อมูลยัง  (True: มีแล้ว False: ยัง)
{
    $conn  = initDB();
    $sql   = "SELECT UserName  FROM ForumResponsive.TBUser WHERE UserName = '$UserName'";
    $fetch = $conn->query($sql); 
    if (mysqli_num_rows($fetch) > 0) {
        return true;
    } // มีแล้ว
    else {
        return false;
    } //  ยัง 
}
function CreateUser( $NAME, $UserName,$PW, $avatar) // PW ตอนเรียกต้องใส่ MD5 
{
    $conn = initDB();
    if (isUserCreated($UserName)) {
        return;
    } //ถ้ามีIDนี้ จะยกเลิก
    if ($avatar == "") {
        $avatar = "/resources/images/avatar/default_Avatar.jpg";
    } //ใส่ default image ถ้าไม่มี
    
    $sql = "INSERT INTO ForumResponsive.TBUser (`User_ID`, `Name`, `UserName`, `PW`, `Created_date`, `avatarURL`)" . "VALUES (NULL,'$NAME','$UserName','$PW',CURRENT_TIMESTAMP, '$avatar')";
    // query insert
    $conn->query($sql);
    return true;
}

function UpdateUser($UserName, $NAME, $PW, $avatar)
{
    $conn = initDB();
    if ((!isUserCreated($UserName)) or ((trim($NAME) == "") && (trim($PW) == "") && (trim($avatar) == ""))) {
        return;
    } //ถ้าไม่มีIDนี้ หรือไม่มีค่าทุก field จะยกเลิก
    
    $sql = "UPDATE ForumResponsive.TBUser SET " . (!trim($NAME) == "" ? " `Name` ='$NAME' " : "") . "" . (!trim($PW) == "" ? " `PW`   ='$PW'    " : "") . "" . (!trim($avatar) == "" ? "`avatarURL`= '$avatar' " : "") . "WHERE `UserName` = '$UserName' ";
    // query insert
    $conn->query($sql);
    return true;
    
}

function login($UserName, $Password) // PW ตอนเรียกต้องใส่ MD5 
{
    $conn  = initDB();
    $sql   = "SELECT `User_ID`,`Name`,`AvatarURL` FROM ForumResponsive.TBUser WHERE UserName = '$UserName' AND PW = '$Password' ";
    $fetch = $conn->query($sql);
    if (mysqli_num_rows($fetch) > 0) {
        $row                   = $fetch->fetch_assoc();
        $usr_info              = array(
            "User_ID" => $row["User_ID"],
            "name" => $row['Name'],
            "AvatarURL" => $row['AvatarURL']
        );
        $_SESSION['user_info'] = $usr_info; // fetch current user data to array session 
        return true; // login
        //  TAE : EXAMPLE  echo $_SESSION['user_info']['User_ID']. $_SESSION['user_info']['name'];
    } else {
        //call function breadcrump ajax
        return false;
    } //  not login
}



function logout(){
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
}
function createPost($Title,$Content,$User_ID,$imageURL,$IsOP)
{
    // ก่อนเรียก ฟังชั่นนี้ ต้องเช็คก่อนว่า มี field ครบไหม
    if($Title==""||$Content==""||!isUserCreated($UserName)){return;}

    $conn = initDB();
    
    $sql = "INSERT INTO `ForumResponsive.TBPost` (`Title`) VALUES ($Title)";
    // query insert
    $conn->query($sql);
}

function SearchPost()
{
} // return array?
function getPost()
{
} // return array?
function showPost()
{
}





//  jQuery/AJAX UI  FUNCTION ----------------------------------------------------------- 
 


/*
function checkVal(){

    var chk = $("#chk");
    
        if (chk.val()) {
        
        }    

}


init : function(){
     document.getElementById('submit').onclick = obj.validate;
  },

  validate : function(){
     var check = document.getElementsByTagName('input');
     var len = check.length;
     for(var i=0;i<len;i++) {
       if (check[i].value ==='')
       {
          alert('required');
          return false;
       }; 
     };
  }

*/

















//----------    PRIVATE FUNCTION (Backend)   ---------------//

function fetch2Array($TBNAME, $WHERE)
{
    
    $ar   = array();
    $conn = initDB();
    $sql  = "SELECT *  FROM " . $TBNAME;
    
    if (isset($WHERE)) {
        $sql = $sql . " WHERE " . $WHERE;
    }
    $fetch = $conn->query($sql);
    if (!$fetch) {
        return null;
        // NO USER
        //throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    }
    
    $row = $fetch->fetch_assoc();
    if (is_array($row) || is_object($row)) {
        foreach ($row as $key => $value) {
            $ar[] = $value;
        }
    } else
        return null;
    
    return $ar;
}


?>