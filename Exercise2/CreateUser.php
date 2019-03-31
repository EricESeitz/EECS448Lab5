<?php
$servername = "mysql.eecs.ku.edu";
$username = "e775s696";
$password = "ricueH9e";
$dbname = "e775s696";

$Newusername = $_POST["username"];  //number of user-defined item 1
$Newpassword = $_POST["password"];  //number of user-defined item 1

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//below needs editing
$sql = "INSERT INTO Users (user_ID) VALUES ('$Newusername')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: username '" . $Newusername . "' taken.<br>Please go back and choose a new username.";
}

echo "<br><br><button onclick='goBack()'>Go Back</button> 
<script>
function goBack() {
  window.history.back();
}
</script>";

$conn->close();
?> 
