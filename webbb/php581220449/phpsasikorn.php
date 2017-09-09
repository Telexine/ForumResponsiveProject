<?php session_start();
if($_SESSION['user']==''){ echo "<meta http-equiv='refresh' content='0; URL=loginphp.php'/>";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

include("conflic.php");

/*if($conn){
	echo "hello";
	}
	else{
		echo "fail";
		}*/
		$sql="SELECT * FROM member";
		$result=mysql_query($sql) or die (mysql_error());
?>

<table width="600">
<th colspan="4" align="left">MEMBER<td align="right"><a href="logout.php"><input type="button" value="LOG OUT"></a></td></th>

<tr><th width="91"><div align="center">StudentID</div></th>
	<th width="98"><div align="center">Name</div></th>
	<th width="198"><div align="center">Lastname</div></th>
	<th width="97"><div align="center">E-mail</div></th>
	<th width="94"><div align="center">Tel.</div></th></tr>
<?php			
			while($row=mysql_fetch_assoc($result)){
				?>
                <tr><td><div align="center">
                <?php echo $row["studentID"];?></div></td>
				<td><div align="center"> <?php echo $row["Name"];?></div></td>
                <td><div align="center"> <?php echo $row["Surname"];?></div></td>
				<td><div align="center"> <?php echo $row["Email"];?></div></td>
				<td><div align="center"> <?php echo $row["Tel.number"];?></div></td></tr>
				 <?php }?>
</table>
 <?php 
 mysql_close($objConnect);
 ?>
</body>
</html>

