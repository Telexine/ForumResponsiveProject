<?php
session_start();
session_destroy();

echo "success";
	echo "<meta http-equiv='refresh' content='2; URL=loginphp.php'/>";
?>