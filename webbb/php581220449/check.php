<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$usernamelg = mysql_real_escape_string($_GET['Username']);
$passwordlg = md5($_GET['Password']);

include("conflic.php");
$strsql="SELECT * FROM member where Username = '$usernamelg' and Password = '$passwordlg';";
    
$objQuery=mysql_query($strsql) or die(mysql_error());

if($objQuery && mysql_num_rows($objQuery)==1){
	$_SESSION['user']=$usernamelg;
	echo "WELCOME".$usernamelg;
	echo "<meta http-equiv='refresh' content='1; URL=phpsasikorn.php'/>";
	}
else{
	echo "TRY AGAIN";
	echo "<meta http-equiv='refresh' content='2; URL=loginphp.php'/>";
	}

?>
</body>
</html>