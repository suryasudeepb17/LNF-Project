<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="items.css">
    <link rel="stylesheet" href="google.css">
    <title>Hours Portal</title>
    
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
    <div id="google-button">
    </div>
    <div class="email">
    </div>
    <div class="iith" style="color:white">
    </div>
    <div class="container">
        <div class="button1">
            <img src="user.png" width="50" height="50">
            <div class="button3">Click to upload an Lost or Found Item</div>
        </div>
        <div Id="form" >
            <center>
            <form action="form.php" name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >
               
               <div class="row">
               <div class="col-25">
               <label for="item_id">Item:</label>
               </div>
               <div class="col-75">
               <input type="text" name="item" id="item_id" ><br>
               </div>
               </div>
            
               <div class="row">
               <div class="col-25">
               <label for="place_id">Place:</label>
               </div>
               <div class="col-75">
               <input type="text" name="place" id="place_id"><br>
               </div>
               </div>

               <div class="row">
               <div class="col-25">
               <label for="name_id">Name:</label>
               </div>
               <div class="col-75">
               <input type="text" name="name" id="name_id"><br>
               </div>
               </div>
            
               <div class="row">
               <div class="col-25">
               <label for="image_id">Image:</label>
               </div>
               <div class="col-75" style="margin-top:20px;float:left">
               <input type="file" name="image" id="image_id" ><br>
               </div>
               </div>
               
               <div class="row">
               <div class="col-25">
               <label>Type: </label>
               </div>
               <div class="col-75" style="display:inline-block;">
               <div style="float:left">
               <input type="radio" id="lost" name="type" value="Lost">
               <label for="lost">Lost</label><br>
               <input type="radio" id="found" name="type" value="Found">
               <label for="found">Found</label>
               </div>
               </div>
               </div>
               
               <input type="hidden" name="email" id="email_id" value="">

               <input type="hidden" name="dt" id="dt_id" value="<?php echo date("Y-m-d"); ?>"><br>
              
               <div class="row">
               <div class="email">
               </div>
               <div class="status">
               </div>
               <input type="submit" value="Submit" name="submit" id="submit">
            </form>
            </center>
        </div>
        <div class="button2">
            <div class="button5">
            <img src="user.png" width="50" height="50">
            <div class="button4">Your Uploads</div>
            </div>
            <div>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
           <input type="hidden" name="fname" id="myemailid" value="">
           <input type="submit" value="Refresh" id="submit2">
        </form>
        </div>
        </div>
        <script>
            var res=document.getElementById('myemailid').value;

        </script>
           <div Id="uploads">
           <?php 
           $myemail=$_REQUEST['fname'];
           
           $username = "suryauser1"; 
           $password = "surya6304413432"; 
           $database = "lostnfound"; 
           $mysqli = new mysqli("localhost", $username, $password, $database); 
           $query = "SELECT * FROM myitem WHERE email = '".$myemail."'";



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


        
        echo "<div class='fullcard2'>";
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
                    echo " $field8name, $field6name";
                echo "</div>";
                echo "<div class='cardf'>";
                    echo "$field9name $field10name";
                echo "</div>";
                echo "<div class='cardg'>";
                    echo "<div class='editbtn'>";
                        echo "Edit";
                    echo "</div>";
                    echo "<div class='delbtn'>";
                        echo "Delete";
                    echo "</div>";
                echo "</div>"; 
            echo "</div>";
        echo "</div>";
        echo "<div class='editform'>";
            echo "<form action='editform.php' method='post' enctype='multipart/form-data'>";
               echo "<div class='row'>";
               echo "<div class='col-25'>";
               echo "<label>Is the task completed: </label>";
               echo "</div>";
               echo "<div class='col-75' style='display:inline-block;'>";
               echo "<div style='float:left'>";
               echo "<input type='radio' id='lost' name='task' value='completed'>";
               echo "<label for='lost'>Yes</label>";         
               echo "<input type='radio' id='found' name='task' value=''>";
               echo "<label for='found'>No</label>";
               echo "</div>";
               echo "</div>";
               echo "</div>";
               
               echo "<input type='hidden' name='id' value='$field1name'>";

               echo "<input type='hidden' name='email' value='$field6name'>";
                
               echo "<div class='row'>";
               echo "<div class='col-25'>";
               echo "<label for='given_id'>Given/Taken</label>";
               echo "</div>";
               echo "<div class='col2-75'>";
               echo "<input type='email' name='given' id='given_id'>";
               echo "</div>";
               echo "</div>";
             
               echo "<input type='submit' value='Submit' name='submit' id='submit'>";
               
            echo "</form>";
            
        echo "</div>";
        echo "<div class='delform'>";
            echo "<form action='delform.php' method='post' enctype='multipart/form-data'>";
               echo "<div class='row'>";
               echo "<div class='col-25'>";
               echo "<label>Do you want to delete: </label>";
               echo "</div>";
               echo "<div class='col-75' style='display:inline-block;'>";
               echo "<div style='float:left'>";
               echo "<input type='radio' id='lost' name='del' value='Yes'>";
               echo "<label for='lost'>Yes</label>";         
               echo "<input type='radio' id='found' name='del' value=''>";
               echo "<label for='found'>Not</label>";
               echo "</div>";
               echo "</div>";
               echo "</div>";
               
               echo "<input type='hidden' name='id' value='$field1name'>";              
                
               echo "<input type='hidden' name='email' value='$field6name'>";
               
               echo "<input type='submit' value='Submit' name='submit' id='submit'>";

            echo "</form>";
            
        echo "</div>";
        echo "</div>";
    
           
              
    }
    $result->free();
} 
?>
        </div>

    </div>
    

    <script>
        $(document).ready(function(){
        $(window).scroll(function(){
        if($(window).scrollTop() > 100){
            $(".navbar").css({"background-color":"black"}); 
            $(".navbar").css({"padding":"8px"}); 

        }
        else{
            $(".navbar").css({"background-color":""});
            $(".navbar").css({"padding":""}); 
        }
        })
        })
        $(document).ready(function(){
        $('.button1').click(function() {
        $('#form').toggle("slide");
        });
        });

        $(document).ready(function(){
        $('.button2').click(function() {
        $('#uploads').toggle("slide");
        });
        });
        $(document).ready(function(){
        $('.editbtn').click(function() {
        $('.editform').toggle(300);
        });
        });
        $(document).ready(function(){
        $('.delbtn').click(function() {
        $('.delform').toggle(300);
        });
        });
        $(document).ready(function() {
        $(window).keydown(function(event){
        if(event.keyCode == 13) {
        event.preventDefault();
        return false;
    }
  });
});
        
        
        var googleButton = document.getElementById('google-button');
        var email=document.getElementsByClassName('email')[0];
        var cont=document.getElementsByClassName('container')[0];
        var stat=document.getElementsByClassName('status')[0];
        var iit=document.getElementsByClassName('iith')[0];


        function handleCredentialResponse(response) {
            const responsePayload = decodeJwtResponse(response.credential);
            email.innerHTML =responsePayload.email;
            text=email.innerHTML;
            if(text.includes("iith.ac.in")==true)
            {
                googleButton.style.display = 'none';
                cont.style.display='block';
                stat.innerHTML ="uploading by " + responsePayload.email + " on "+" <?php echo date("Y-m-d"); ?>";
                document.getElementById('email_id').value = email.innerHTML;
                document.getElementById('myemailid').value = email.innerHTML;               
            }
            else
            {
                iit.innerHTML = "Login through Your IITH email id";
            }

            saveUserData(responsePayload);
        }
        function saveUserData(userData){
    $.post('maildb.php', { oauth_provider:'google', userData: JSON.stringify(userData) });
}
     

        window.onload = function () {
            google.accounts.id.initialize({
                client_id: "240997103765-j0btkjqmr5filn3dqvqfl0jff7l23eve.apps.googleusercontent.com",
                auto_select: true,
                auto: true
            });
            google.accounts.id.renderButton(
                document.getElementById("google-button"),
                { theme: "outline", size: "medium", width: '200'}  
            );
        
            google.accounts.id.prompt(); 
        }

        function decodeJwtResponse(token) 
        {
            var base64Url = token.split('.')[1];
            var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            var jsonPayload = decodeURIComponent(atob(base64).split('').map(function (c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));
            return JSON.parse(jsonPayload);
        }
        function validateForm() {
       let x = document.forms["myForm"]["type"].value;
       let y = document.forms["myForm"]["item"].value;
       let z = document.forms["myForm"]["place"].value;
       let w = document.forms["myForm"]["name"].value;

       if (x == "" || y=="" ||z==""  ||w=="") {
       alert("All details are mandadatory except the file");
       return false;
  }
}
      </script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</body>

</html>