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
        <input type = "text" name = "Time"> <br>
        <label> Day of event: </label> <br>
        <input type = "text" name = "Day"> <br>
        <label> Description: </label> <br>
        <input type = "text" name = "Description"><br>
        <input type =  "submit" value = "Add Event">

    </form>    

    <button onclick="window.location.href='http://localhost/project/';"> Return to Calendar Page </button>
</body>
</html>

<?php
    session_start();
    $uid = $_SESSION['userID'];

    //Creates a new connection with the server
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbName = "Project";
    //Change the above variable to your database name
    
    $connect = "";

    //Tries to make connection and checks for failure
    
    try
    {
        $connect = mysqli_connect($server, $user, $password, $dbName, '3306');
        //echo "Database connection successful<br>";
    }
    catch(mysqli_sql_exception)
    {
        echo "<br>Database connection faild<br>";
    }
    if(isset($_POST["title"]) && isset($_POST["Day"]) && isset($_POST["Description"]) && isset($_POST["Time"]))
    {
        $title = $_POST["title"];
        $day = $_POST["Day"];
        $desc = $_POST["Description"];
        $time = $_POST["Time"];

        $sql = "INSERT INTO Events (u_id, title, e_date, e_time, description) VALUES (1, '$title', '$day', '$time', '$desc')";

        try
        {
            mysqli_query($connect, $sql);
            echo "<br> The event named $title has been added. <br>";
        }
        catch (mysqli_sql_exception $ex)
        {
            echo "<br> Unable to create event: '$ex'<br>";
        }
    }
    else
    {
        echo "<br>You must fill out all blanks<br>";
    }
    
?>
