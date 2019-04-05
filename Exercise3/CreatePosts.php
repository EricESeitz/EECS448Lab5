<?php
$username = $_POST["username"];  //number of user-defined item 1
$post = $_POST["post"];  //number of user-defined item 1

echo "<h1>Thank you for your post!</h1>";
echo "Username: " . $username . "<br>";
echo "Post: " . $post . "<br><br>";

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

//Escape string post to keep from breaking things
$sanitizedPost = $conn->real_escape_string($post);
//Escape string username to keep from breaking things
$sanitizedUsername = $conn->real_escape_string($username);

//check if username present
//Query if username present in Users table
$usernameResult = $conn->query("SELECT user_ID FROM Users WHERE user_ID='$sanitizedUsername'");
//Stores the number of rows returned in $usernameResult
$usernameNumofRows = mysqli_num_rows($usernameResult);
//If no rows returned, username not in Users. Quit.
if ($usernameNumofRows < 1) {
    echo "Error: User ID not found!";
    echo "<br><br><button onclick='goBack()'>Go Back</button> 
<script>
function goBack() {
  window.history.back();
}
</script>";
    exit();
}


//Create post_ID from the author name, current number of rows in table, and length of post
//Returns the number of rows
$result = $conn->query("SELECT * FROM Posts");
//Returns the number of rows in $result
$numRows = mysqli_num_rows($result);
//Get length of post
$postLength = strlen($post);
//Combine
$post_ID = $sanitizedUsername . $numRows . $postLength;

//sql to insert into posts
$sql = "INSERT INTO Posts (post_ID, content, author_ID) VALUES ('$post_ID', '$sanitizedPost', '$sanitizedUsername')";
if ($conn->query($sql) === TRUE) {
    echo "New post created successfully. You may go back to make another post.";
}else{
    echo "Error: " . $conn->error;
}

echo "<br><br><button onclick='goBack()'>Go Back</button> 
<script>
function goBack() {
  window.history.back();
}
</script>";

$conn->close();
?>
