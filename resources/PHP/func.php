<?php

require_once('db_config.php');



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


function isUserIDexist($User_ID) //username  นี้มีในฐานข้อมูลยัง  (True: มีแล้ว False: ยัง)
{
    $conn  = initDB();
    $sql   = "SELECT User_ID  FROM ForumResponsive.TBUser WHERE User_ID = '$User_ID'";
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
    login($UserName, $PW);
    return true;
}

function UpdateUser($UserName, $NAME, $PW, $avatar)
{
    $conn = initDB();
    if ((!isUserCreated($UserName)) or ((trim($NAME) == "") && (trim($PW) == "") && (trim($avatar) == ""))) {
        return false;
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
 
//searchPost(array('alpha','ddd'));

// XU
function searchPost($searchTerms){
    $conn = initDB();
    mysqli_select_db($conn, "ForumResponsive");
  
  $searchTStore = "";
  foreach ($searchTerms as $thing){
 
    $searchTStore .= "'".$thing."',";
  }
  $searchTStore= rtrim($searchTStore,",");
   $sql = "SELECT DISTINCT Post_ID FROM TBTag WHERE Tag IN (". $searchTStore . ") GROUP BY Post_ID";
 
  $hPost = array();
    if ($result = mysqli_query($conn, $sql)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $hPost[] = $row["Post_ID"];
    }
  return $hPost;
  }
}
}// XU


function logout(){
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
}
function createPost($Title,$Content,$UserID,$imageURL,$IsOP,$Tags)
{ //$Isop = true คือ หัวโพส
    // ก่อนเรียก ฟังชั่นนี้ ต้องเช็คก่อนว่า มี field ครบไหม
 
 

    $conn = initDB();

    //generate Uniq PostID // op = หัวโพส  Co = comment
    $PostID = ($IsOP?"OP":"CO").strtotime("now").'?'.$UserID;
    $sql = "INSERT INTO ForumResponsive.TBPost (`Post_ID`,`Title`) VALUES ('$PostID','$Title')";
 
    // query insert
    $conn->query($sql);
    //isOP 1 == true
    $sql = "INSERT INTO ForumResponsive.TBmeta (`Post_ID`,`content`,`User_ID`,`imageURL`,`isOP`) VALUES ('$PostID','$Content','$UserID','$imageURL','$IsOP')";
     // query insert
    $conn->query($sql);
    

    // sucess จะreturn POST ID 
     return $PostID;
}

 


function getPostRate($PostID){
    
        $conn = initDB();
        $sql ="SELECT  (SUM(b.Rating) /count(a.Post_ID)) as Rate FROM Forumresponsive.TBPost as a , Forumresponsive.TBrate as b WHERE a.Post_ID = b.Post_ID AND a.Post_ID = '$PostID' ";
        $fetch = $conn->query($sql); 
        $row = $fetch->fetch_assoc();
    
        return $row['Rate'];
    }

    
function getPost($PostID)
{
    $conn = initDB();
    
    $sql = "SELECT a.`Post_ID`,a.`Title`,b.`content`,b.`User_ID`,b.`imageURL`,b.`isOP`,c.AvatarURL  FROM ForumResponsive.TBPost as a ,  ForumResponsive.TBmeta as b , ForumResponsive.TBUser as C WHERE b.User_ID=c.User_ID AND a.Post_ID = b.Post_ID and a.Post_ID =  '$PostID' AND b.isOP = '1'  ";
 
    // query insert
    $fetch = $conn->query($sql); 
 
    if (mysqli_num_rows($fetch)) {


        // ADD TAG,RATE LATER

        // fetch all to arr 
       while(($Post_OP[] = mysqli_fetch_assoc($fetch)) || array_pop($Post_OP)); 
       return $Post_OP;
    }else{
        return false;// ไม่พบโพส
    }

    
}

function getAllTag(){
    $conn = initDB();
    $sql ="SELECT DISTINCT Tag FROM ForumResponsive.TBTag";
    $fetch = $conn->query($sql); 
    while(($Tags[] = mysqli_fetch_assoc($fetch)) || array_pop($Tags)); 
    return $Tags;

}


function getPostComment($PostID){

    $conn = initDB();
    
    $sql = "SELECT a.*,b.AvatarURL FROM ForumResponsive.TBmeta  as a , ForumResponsive.TBUser as b WHERE a.User_ID=b.User_ID AND a.Post_ID =  '$PostID' AND a.isOP = '0' ";
    // query 
    $fetch = $conn->query($sql); 
    // fetch all to arr 
   while(($Post_Comment[] = mysqli_fetch_assoc($fetch)) || array_pop($Post_Comment)); 
   return $Post_Comment;
}

function showPost()
{
}

function getAllPostNum(){


    $conn = initDB();
    $sql ="SELECT COUNT(Post_ID) num
        FROM ForumResponsive.TBPost  ";
      

      $fetch = $conn->query($sql); 
      $row = $fetch->fetch_assoc();
  
      return $row['num'];
}


function getHotPost($lim/*limit default 3*/){


    $conn = initDB();
    $sql ="SELECT a.Post_ID, a.title,COUNT(a.Post_ID) count, b.DATE ,(SUM(c.Rating) /count(a.Post_ID)) as popular , b.imageURL,b.content,u.name FROM ForumResponsive.TBPost as a , ForumResponsive.TBUser as u , ForumResponsive.TBmeta as b LEFT JOIN ForumResponsive.TBrate c ON b.Post_ID = c.Post_ID WHERE a.Post_ID = b.Post_ID and b.user_id = u.user_id GROUP BY a.Post_ID ORDER BY `popular` DESC LIMIT $lim";
 
    // query 
    $fetch = $conn->query($sql); 
    // fetch all to arr 
    while(($hPost[] = mysqli_fetch_assoc($fetch)) || array_pop($hPost)); 
    return $hPost;
}

 



function UpdateRate($star/* 0-10 */,$User_ID,$Post_ID){

    $conn = initDB();
    
    $sql   = "SELECT Post_ID  FROM ForumResponsive.TBrate WHERE Post_ID = '$Post_ID' AND User_ID = '$User_ID'";
    $fetch = $conn->query($sql); 
 
    if (mysqli_num_rows($fetch) > 0) {  // กรณี่เคย rateแล้ว
        

     // update
        $sql = "UPDATE  TBrate SET  Rating = '$star' WHERE  Post_ID = '$Post_ID' AND User_ID = '$User_ID'";

       $conn->query($sql);
 





    } // มีแล้ว
    else { // ไม่เคย
        
       $sql = "INSERT INTO `TBrate` (`Post_ID`, `User_ID`, `Rating`) VALUES ('$Post_ID', '$User_ID', '$star');";
        // query insert
        $conn->query($sql);
 
    } //  ยัง 


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
