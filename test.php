<html>
<?php
require_once('resources/PHP/func.php');


?>
<head>
 
</head>

<body>

<?php



/* // Test  UpdateUser
 echo UpdateUser('test','c'," ","d");
*/



 /* // Test login
 login('test','123232323');
 print_r( $_SESSION['user_info']);
 echo $_SESSION['user_info']['User_ID']
 */



 /*// Test getPost()
 
 
 */
//print_r(getPost('OP1503326319?9'));
 $array = array("cake" );
 $test = searchPost($array);
 echo(implode(" ", $test));
?>
</body>
<html>

