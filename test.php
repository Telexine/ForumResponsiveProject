<html>
<?php

require_once('func.php');



?>
<head>
 
</head>

<body>

<?php
 // UpdateUser($ID,$NAME,$PW,$Avartar){
 //echo UpdateUser('test','c'," ","d");
 login('test','123232323');
 print_r( $_SESSION['user_info']);

 echo $_SESSION['user_info']['User_ID']
?>
</body>
<html>

