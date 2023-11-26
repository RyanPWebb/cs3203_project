<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "DeleteTask.php" method = "post"> 

        <label> Day of Event to Delete: </label> <br>
        <input type = "text" name = "dayDel"><br>
        <label> Name of Event to Delete: </label> <br>
        <input type = "text" name = "delEvent"><br>
        <input type =  "submit" value = "Delete Event">
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

    try
    {
        $connect = mysqli_connect($server, $user, $password, $dbName);
        //echo "Database connection successful<br>";
    }
    catch(mysqli_sql_exception)
    {
        echo "<br> Database connection faild<br>";
    }

    if(isset($_POST["dayDel"]) && isset($_POST["delEvent"]))
    {
        $EventName = $_POST["delEvent"];
        $Day = $_POST["dayDel"];

        //Selects the row with the title, day, User ID
        $sql1 = "SELECT * FROM EVENTS WHERE title = '$EventName' AND e_date LIKE '$Day' AND u_id LIKE 1";
        $result = mysqli_query($connect, $sql1);
        //Double Checking that the row exists and adds parameter before deletion for good measure.
        if(mysqli_num_rows($result) > 0)
        {
            echo "<br> Found the event, and has been deleted. <br>";
            $title = $EventName;
            $day = $Day;
            $row = mysqli_fetch_assoc($result);
            $desc = $row["description"];
        }
        else
        {
            echo "<br> Could not find an event with name $EventName and day $Day";
        }

        //Query to Delete the row from the table 
        $sql2 = "DELETE FROM Events WHERE title = '$title' AND e_date LIKE '$day' AND description LIKE '$desc'";
        try
        {
            mysqli_query($connect, $sql2);

            //Could add auto redirection to the main page again.

        }
        catch (mysqli_sql_exception $ex)
        {
            echo "<br> Unable to Delete $EventName: <br> '$ex'<br>";
        }
    }
    else
    {
        echo "<br><br>You must fill out all blanks<br>";
    }


    mysqli_close($connection);

?>