<?php

//https://people.eecs.ku.edu/~e775s696/Lab05/Exercise5/ViewUsers.php

$username = $_POST['userList'];  //number of user-defined item 1

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

//Return all rows in Users table
$result = $conn->query("SELECT * FROM Posts WHERE author_id = '$username'");
//Create table
echo "<h1> All Posts for user: " . $username . "</h1>";
echo "<table border='1px solid black'>";
echo "<td>Post ID:</td><td>Content:</td>"; 	//create initial header row

//from https://www.w3schools.com/php/php_mysql_select.asp
//while loop of users
while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["post_ID"] . "</td><td>" . $row["content"] . "</td></tr>"; 	//create initial header row
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
