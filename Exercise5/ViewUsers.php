<?php

//from EX2
$servername = "mysql.eecs.ku.edu";
$dbusername = "e775s696";
$password = "ricueH9e";
$dbname = "e775s696";

// Create connection
$conn = new mysqli($servername, $dbusername, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//Return all rows in Users table
$result = $conn->query("SELECT * FROM Users");

//from https://www.w3schools.com/php/php_mysql_select.asp

while($row = $result->fetch_assoc()) {
    echo "id: " . $row["user_ID"] . "<br>";
}


echo "<br><br><button onclick='goBack()'>Go Back</button> 
<script>
function goBack() {
  window.history.back();
}
</script>";

$conn->close();
?>
