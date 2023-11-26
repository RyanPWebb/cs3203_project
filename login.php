

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  action = "login.php" method = "post">
        <h2> Login </h2>
        <p>Please enter your email and password to access your account.</p>
        email:<br>
        <input type = "text" name = "email"><br>
        password:<br>
        <input type = "password" name = "password"><br>
        <br>
        <input type = "submit" name = "submit" value = "LOG IN">

    </form>
    <br>
<a href = "create_account.php">
        <button> CREATE ACCOUNT </button>
        <br>
        <br>
</a>
</body>
</html>

<?php

    $db_server = "localhost";
    $db_user = "project";
    $db_password = "Password123";
    $db_name = "engineering_project"; //CHANGE THIS VARIABLE TO YOUR DATABASE'S NAME

    $connect = "";

    //sql database connection test
    try
    {
        $connect = mysqli_connect($db_server, $db_user, $db_password, $db_name);
        //echo "database connected";
    }
    catch(mysqli_sql_exception)
    {
        echo "could not connect to database";
    }

    if(isset($_POST["email"]) && isset($_POST["password"]))
    {

        $username = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = '$username'";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            //check if value at pass of the user is equal to the given password
            $row = mysqli_fetch_assoc($result);
            if($password == $row["pass"])
            {
                echo "<br> login successfull";
                $_SESSION["userID"] = $row["u_id"];
                $_SESSION["firstName"] = $row["name_first"];
                //add redirect to calender management page
                header("Location: CalendarPage.php");
            }
        } 
        else
        {
            echo "User not found, please re-enter your information.";
        }
    }
    mysqli_close($connect);
?>
