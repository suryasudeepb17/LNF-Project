<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="items.css">
</head>
<body>
    <div class="navbar" >
        <div class="logotitle">
            <a href="index.php" class="site-title">
                Lost N Found
            </a>
        </div>
        <ul>
            <li>
              <div class="dropdown">
                <a  class="dropbtn">Lost</a>
                  <div class="dropcontent">
                    <a style="font-size:20px" href="lost.php">Lost Items</a>
                    <a style="font-size:20px" href="lost_c.php">Lost and Taken</a>
                    <a style="font-size:20px" href="lost_order.php">Newest first</a>
                  </div>
              </div>
            </li>
            <li>
              <div class="dropdown">
                <a  class="dropbtn">Found</a>
                <div class="dropcontent">
                  <a style="font-size:20px" href="found.php">Found Items</a>
                  <a style="font-size:20px" href="found_c.php">Found and Given</a>
                  <a style="font-size:20px" href="found_order.php">Newest first</a>
                </div>
              </div>
            </li>
            <li>
                <a href="google.php">Your Profile</a>
            </li>
            <li>
                <a href="team.php">Team</a>
            </li>   
        </ul>
    </div>   
<?php 
$username = "suryauser1"; 
$password = "surya6304413432"; 
$database = "lostnfound"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM myitem where type='Found' AND (task<>'completed' OR task is NULL) ORDER BY dt DESC";



if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        
        $field1name = $row["id"];
        $field2name = $row["item"];
        $field3name = $row["place"];
        $field5name = $row["type"]; 
        $field6name = $row["email"]; 
        $field7name = $row["dt"]; 
        $field8name = $row["name"]; 
        $field9name = $row["task"]; 
        $field10name = $row["given"]; 


        
        echo "<div class='card'>";
            echo "<div class='carda'>";
               echo "#$field1name  $field2name";
               echo "<img class='itemimage' src='uploads/".$row['image']."'>";
            echo "</div>";
            echo "<div class='cardb'>";
                echo "<div class='cardc'>";
                    echo " $field5name on $field7name";
                echo "</div>";
                echo "<div class='cardd'>";
                    echo " $field3name";
                echo "</div>";
                echo "<div class='carde'>";
                    echo " $field8name, $field6name ";
                echo "</div>";  
                echo "<div class='cardf'>";
                    echo "$field9name $field10name";
                echo "</div>";
            echo "</div>";
        echo "</div>";
              
              
    }
    $result->free();
} 
?>
</body>
</html>