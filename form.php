<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="items.css">
</head>
<style>
    .yourup
    {
        background-color:rgb(30, 169, 194);
        color:white;
        padding:10px;
        margin:auto;
        width:20%;
        text-align:center;
        margin-bottom:10px;
        border-radius:10px;
    }
</style>
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
		$conn = mysqli_connect("localhost", "suryauser1", "surya6304413432", "lostnfound");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
                
		}
        
           
        
		// Taking all 5 values from the form data(input)
		$first_name = $_REQUEST['item'];
		$last_name = $_REQUEST['place'];
		$gender = $_REQUEST['type'];
		$address = $_REQUEST['email'];
		$email = $_REQUEST['dt'];
		$name = $_REQUEST['name'];
      
        	
		
		if(isset($_POST['submit']) && isset($_FILES['image']))
		{
		
			$img_name = $_FILES['image']['name'];
	        $img_size = $_FILES['image']['size'];
	        $tmp_name = $_FILES['image']['tmp_name'];
	        $error = $_FILES['image']['error'];

	        if ($error === 0) 
			{
	     	    if ($img_size > 4025000) 
			    {
			        echo "<div class='yourup'>";
                        echo "Image should be less than 4MB!";
                        echo "Your Uploads";
                        echo "</div>";
	     	    }
				else 
			    {
			        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			        $img_ex_lc = strtolower($img_ex);

			        $allowed_exs = array("jpg", "jpeg", "png"); 

			        if (in_array($img_ex_lc, $allowed_exs)) 
				    {
				        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				        $img_upload_path = 'uploads/'.$new_img_name;
				        move_uploaded_file($tmp_name, $img_upload_path);
						$sql = "INSERT INTO myitem (item,place,image,type,email,dt,name) VALUES ('$first_name',
						'$last_name','$name2','$gender','$address','$email','$name')";
			         	mysqli_query($conn, $sql);
                        echo "<div class='yourup'>";
                        echo "Uploaded Succesfully !";
                        echo "Your Uploads";
                        echo "</div>";
		          	}
				    else 
				    {
				        echo "<div class='yourup'>";
                        echo "Only JPG,JPEG,PNG files are allowed!";
                        echo "Your Uploads";
                        echo "</div>";
                        $sql = "INSERT INTO myitem (item,place,type,email,dt,name) VALUES ('$first_name',
                        '$last_name','$gender','$address','$email','$name')";
                        
			        }
		        }
	        }
			else 
			{
		        echo "<div class='yourup'>";
                        echo "Uploaded Succesfully !";
                        echo "Your Uploads";
                        echo "</div>";
                $sql = "INSERT INTO myitem (item,place,type,email,dt,name,image) VALUES ('$first_name',
               '$last_name','$gender','$address','$email','$name','Suy')";
                mysqli_query($conn, $sql);
		    }
		}
		else
		{
			echo "<div class='yourup'>";
                        echo "Failed to upload !";
                        echo "Your Uploads";
                        echo "</div>";
		}
		
		// Close connection
		mysqli_close($conn);
		?>
		<?php 
$username = "suryauser1"; 
$password = "surya6304413432"; 
$database = "lostnfound"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM myitem WHERE email='$address'";



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
