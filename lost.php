<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="items.css">
    <link rel="stylesheet" href="google.css">
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
$query = "SELECT * FROM myitem where type='Lost' AND (task<>'completed' OR task is NULL)";



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


        echo "<div class='fullcard'>";
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
                echo "<div class='cardg'>";
                    echo "<div class='editbtn'>";
                        echo "Send Request";
                    echo "</div>";
                echo "</div>"; 
            echo "</div>";
        echo "</div>";
        echo "<div class='editform'>";
            echo "<form action='mailto:$field6name?subject=From the Lost and Found Team' method='post' enctype='text/plain'>";
             
               echo "<input type='hidden' name='Text' value='Hello $field8name This mail is regarding the #$field1name $field5name $field2name on $field7name at $field3name.'>";
                
               echo "<div class='row'>";
               echo "<div class='col-25'>";
               echo "<label for='given_id'>Your Message</label>";
               echo "</div>";
               echo "<div class='col2-75'>";
               echo "<input type='text' name='My message' id='given_id'>";
               echo "</div>";
               echo "</div>";
             
               echo "<input type='submit'  id='submit'>";
               
            echo "</form>";
            
        echo "</div>";
        echo "</div>";
              
              
    }
    $result->free();
} 
?>
<script>
    $(document).ready(function(){
        $('.editbtn').click(function() {
        $('.editform').toggle(300);
        });
        });
</script>
</body>
</html>