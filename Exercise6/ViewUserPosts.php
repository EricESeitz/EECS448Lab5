<?php

//https://people.eecs.ku.edu/~e775s696/Lab05/Exercise5/ViewUsers.php

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
// echo "Connected successfully";

//Return all rows in Users table
$result = $conn->query("SELECT * FROM Users");
//Create table
echo "<h1> All Users </h1>";
echo "<table border='1px solid black'>";
echo "<td>User ID:</td>"; 	//create initial header row

//from https://www.w3schools.com/php/php_mysql_select.asp
//while loop of users
while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["User_ID"] . "</td></tr>"; 	//create initial header row
    //echo "User_ID: " . $row["User_ID"] . "<br>";
}
echo "</table>";		//end of table

echo "<br><br><button onclick='goBack()'>Go Back</button> 
<script>
function goBack() {
  window.history.back();
}
</script>";

$conn->close();
?>
