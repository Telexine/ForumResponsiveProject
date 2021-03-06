<?php
 require_once('db_config.php');
// Array with tags
$a = array();
$conn  = initDB();
// get the q parameter from URL
$q = $_GET["query"];

$hint = "";

$sql = "SELECT DISTINCT Tag FROM ForumResponsive.TBtag";
 
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $a[] = $row["Tag"];
    }
}

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= " $name";
            }
        }
    }
}

// Output empty if no hint was found or output correct values
echo $hint === "" ? "" : $hint;
?> 