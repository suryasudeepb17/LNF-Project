<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="index.css">
</head>
<style>
 
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
</body>
</html>