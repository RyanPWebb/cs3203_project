<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "DeleteTask.php" method = "post"> 
        <!--Saving the section below for possible future use -->
        <!--<label> Day of Event to Delete: (yyyy-mm-dd) </label> <br>
        <input type = "text" name = "dayDel"><br> -->
        <label> Name of Event to Delete: </label> <br>
        <input type = "text" name = "delEvent"><br>
        <br>
        <input type =  "submit" value = "Delete Event">
    </form>  
    <br>  
    <button onclick="window.location.href='http://localhost/WeeklyCalendar/CalendarPage.php';"> Return to Calendar Page </button>
</body>
</html>

<?php
    session_start();
    $uid = $_SESSION["userID"];

    //Creates a new connection with the server
    $server = "localhost";
    $user = "project";
    $password = "Password123";
    $dbName = "engineering_project";
    //Change the above variable to your database name
    $connect = "";

    try
    {
        $connect = mysqli_connect($server, $user, $password, $dbName);
        //echo "Database connection successful<br>";
    }
    catch(mysqli_sql_exception)
    {
        echo "<br> Database connection failed<br>";
    }

    if(isset($_POST["delEvent"]))
    {
        $EventName = $_POST["delEvent"];
       // (saving this variable for possible future use) $Day = $_POST["dayDel"];

        //Selects the row with the title, day, User ID
        $sql1 = "SELECT * FROM EVENTS WHERE title = '$EventName' AND u_id = '$uid' ";
        $result = mysqli_query($connect, $sql1);
        //Double Checking that the row exists and adds parameter before deletion for good measure.
        if(mysqli_num_rows($result) > 0)
        {
            echo "<br> <br>The event has been found and deleted. <br>";
            $title = $EventName;
            //(saving this variable for possible future use) $day = $Day;
            $row = mysqli_fetch_assoc($result);
            $desc = $row["description"];
            //Query to Delete the row from the table 
            $sql2 = "DELETE FROM events WHERE title = '$title' AND u_id LIKE '$uid' AND description LIKE '$desc'";
            try
            {
                mysqli_query($connect, $sql2);

                //Could add auto redirection to the main page again.

            }
            catch (mysqli_sql_exception $ex)
            {
                echo "<br> <br>Unable to Delete $EventName: <br> '$ex'<br>";
            }
        }
        else
        {
            echo "<br> <br>Could not find an event with name '".$EventName."'.";
        }
    }
    mysqli_close($connect);
?>