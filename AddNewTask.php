<?php
    $title = "{$_POST["title"]}<br>";
    $day = "{$_POST["Day"]} <br>";
    $desc = "{$_POST["Description"]} <br>";
    $time = "{$_POST["Time"]} <br>";
    //Creates a new connection with the server

    $con = new mysqli('localhost', 'John Doe', 'password', 'Project');
    
    //Checks to make sure the connection is valid
    if($con->connect_error)
    {
        echo "Connection failed: " . $con->conect_error;
        exit();
    }
    $sql = "INSERT INTO Events (u_id,title,e_date,e_time,description) VALUES (1,$title,$day,$time, $desc)"; 

    $result =$con->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "AddNewTask.php" method = "post"> 

        <label> Title of event:  </label> <br>
        <input type = "text" name = "title"> <br>
        <label> Time of event:  </label> <br>
        <input type = "text" name = "title"> <br>
        <label> Day of event: </label> <br>
        <input type = "text" name = "Day"> <br>
        <label> Description: </label> <br>
        <input type = "text" name = "Description"><br>
        <input type =  "submit" value = "Add Event">

    </form>    

</body>
</html>

