<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>Enter the title and date of the event</h1>
</head>
<body>
    <form action = "AddNewTask.php" method = "post"> 
        <label>Title:</label> <br>
        <input type = "text" name = "title"> <br>
        <br>
        <label for="Day">Day:</label>
        <input type="date" id="Day" name="Day"> 
        <br>
        <label for="Time"><br>Time (optional):</label>
        <input type="time" id="Time" name="Time"> 
        <br>
        <label> <br>Description (optional): </label> <br>
        <input type = "text" name = "Description"><br>
        <br>
        <input type =  "submit" value = "Add Event">

    </form>    
    <br>
    <button onclick="window.location.href='CalendarPage.php'"> Return to Calendar Page <br></button>
</body>
</html>

<?php
    session_start();
    $uid = $_SESSION['userID'];

    //Creates a new connection with the server
    $server = "localhost";
    $user = "project";
    $password = "Password123";
    $dbName = "engineering_project";
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
    $blank = "";
    if(isset($_POST["title"]) && isset($_POST["Day"]) && isset($_POST["Description"]) && isset($_POST["Time"]))
    {
        if ($_POST["title"]==$blank || $_POST["Day"]==$blank)
        {
            echo "<br> <br> A REQUIRED FIELD HAS NOT BEEN ENTERED.";
        }
        else
        {
            $title = $_POST["title"];
            $day = $_POST["Day"];
            $desc = $_POST["Description"];
            $time = $_POST["Time"];

            $sql = "INSERT INTO Events (u_id, title, e_date, e_time, description) VALUES ($uid, '$title', '$day', '$time', '$desc')";

            try
            {
                mysqli_query($connect, $sql);
                echo "<br> <br> The event named $title has been added on $day. <br>";
            }
            catch (mysqli_sql_exception $ex)
            {
                echo "<br> Unable to create event: '$ex'<br>";
            }
        }
    }
    else
    {
        echo "<br><br>";
    }
    
?>
