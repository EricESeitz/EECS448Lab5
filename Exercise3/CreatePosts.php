<?php
$username = $_POST["username"];  //number of user-defined item 1
$post = $_POST["post"];  //number of user-defined item 1

//include css sheet in backend html
//echo "<link rel='stylesheet' href='style.css' />";

echo "<h1>Thank you for your submission!</h1>";
echo "Username: " . $username . "<br>";
echo "Post: " . $post . "<br>";

?>
