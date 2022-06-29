
<?php
$servername = "localhost";
$username = "suryauser1";
$password = "surya6304413432";
$dbname = "lostnfound";

$userData = json_decode($_POST['userData']);
$oauth_provider = $_POST['oauth_provider'];
$email  = $userData->email;
$name  = $userData->name;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');
$now = date('d-m-y  h:i');

$sql = "INSERT INTO emaild (name,email, dt)
VALUES ('$name', '$email', '$now')";

if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>