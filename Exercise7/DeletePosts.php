<?php

//https://people.eecs.ku.edu/~e775s696/Lab05/Exercise5/ViewUsers.php

$postsToDelete = $_POST['postSelection'];  //number of user-defined item 1

if(empty($postsToDelete)) 
{
  echo("You didn't select any posts.");
} 
else 
{
  $N = count($postsToDelete);

  echo("You selected $N post(s) to be deleted:");
  for($i=0; $i < $N; $i++)
  {
    echo("<br>" . $postsToDelete[$i]);
  }


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
//loop through array of post ID's passed in from HTML
for($j=0; $j < $N; $j++)
{
  //sql query to delete
  $sql = "DELETE FROM Posts WHERE post_ID='$postsToDelete[$j]'";

  if ($conn->query($sql) === TRUE) {
    echo "<br>Post ID: " . $postsToDelete[$j] . " deleted successfully";
    } else {
    echo "Error: Post ID: " . $postsToDelete[$j] . " not deleted. Reason: " . mysqli_error($con);
  }
}//end of loop to delete selected posts


$conn->close();
}//end of initial if-else statement checking for empty boxes

?>
