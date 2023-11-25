<?php
    session_start();

    $uid = $_SESSION['userID'];

    $db_server = "localhost";
    $db_user = "project";
    $db_password = "Password123";
    $db_name = "engineering_project";

    $connection = "";

    try {
        $connection = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    } catch (mysqli_sql_exception $ex) {
        echo "Couldn't connect to database";
    }

    if (isset($_POST['title']) && isset($_POST['Day']) && isset($_POST['Description']) && isset($_POST['Time'])){
        $title = $_POST["title"];
        $day = $_POST["Day"];
        $desc = $_POST["Description"];
        $time = $_POST["Time"];
        

        $sql = "INSERT INTO Events (u_id, title, e_date, e_time, description) VALUES ('$uid', '$title', '$day', '$time', '$desc')";
        
        try {
            mysqli_query($connection, $sql);
            echo "<br> Task Created! <br>";

        } catch (mysqli_sql_exception $ex) {
            echo "<br> Unable to create event: '$ex'<br>";
        }

    }
    else{
        echo ' <br> Invalid Input <br>';
    }

    mysqli_close($connection);

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
        <input type = "time" name = "Time" min = "00:00" max = "23:59"> <br>
        <label> Day of event: </label> <br>
        <input type = "text" name = "Day"> <br>
        <label> Description: </label> <br>
        <input type = "text" name = "Description"><br>
        <input type =  "submit" value = "Add Event">

    </form>    

</body>
</html>

