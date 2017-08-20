<?php
require_once('../../config/db_config.php');


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
}


function isUserCreated($ID) //username  นี้มีในฐานข้อมูลยัง  (True: มีแล้ว False: ยัง)
{
    $conn  = initDB();
    $sql   = "SELECT ID  FROM ForumResponsive.TBUser WHERE ID = '$ID'";
    $fetch = $conn->query($sql);
    if (mysqli_num_rows($fetch) > 0) {
        return true;
    } // มีแล้ว
    else {
        return false;
    } //  ยัง 
}
function CreateUser($ID, $NAME, $PW, $avatar) // PW ตอนเรียกต้องใส่ MD5 
{
    $conn = initDB();
    if (isUserCreated($ID)) {
        return;
    } //ถ้ามีIDนี้ จะยกเลิก
    if ($avatar = "") {
        $avatar = "/resources/images/avatar/default_Avatar.jpg";
    } //ใส่ default image ถ้าไม่มี
    
    $sql = "INSERT INTO ForumResponsive.TBUser (`User_ID`, `Name`, `ID`, `PW`, `Created_date`, `avatarURL`)" . "VALUES (NULL,'$NAME','$ID','$PW',CURRENT_TIMESTAMP, '$avatar')";
    // query insert
    $conn->query($sql);
    return true;
}

function UpdateUser($ID, $NAME, $PW, $avatar)
{
    $conn = initDB();
    if ((!isUserCreated($ID)) or ((trim($NAME) == "") && (trim($PW) == "") && (trim($avatar) == ""))) {
        return;
    } //ถ้าไม่มีIDนี้ หรือไม่มีค่าทุก field จะยกเลิก
    
    $sql = "UPDATE ForumResponsive.TBUser SET " . (!trim($NAME) == "" ? " `Name` ='$NAME' " : "") . "" . (!trim($PW) == "" ? " `PW`   ='$PW'    " : "") . "" . (!trim($avatar) == "" ? "`avatarURL`= '$avatar' " : "") . "WHERE `ID` = '$ID' ";
    // query insert
    $conn->query($sql);
    return true;
    
}

function login($ID, $Password) // PW ตอนเรียกต้องใส่ MD5 
{
    $conn  = initDB();
    $sql   = "SELECT `User_ID`,`Name`,`AvatarURL` FROM ForumResponsive.TBUser WHERE ID = '$ID' AND PW = '$Password' ";
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
        return false;
    } //  not login
}

function createPost()
{
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