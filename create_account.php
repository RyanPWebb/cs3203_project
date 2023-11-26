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
    <form  action = "create_account.php" method = "post">
        <h2> Create Account </h2>
        <p>Please enter the information below to create an account </p>
        <br>
        First name:<br>
        <input type = "text" name = "firstname"><br>
        Last name:<br>
        <input type = "text" name = "lastname"><br>
        email:<br>
        <input type = "text" name = "email"><br>
        password:<br>
        <input type = "password" name = "password"><br>
        <br>
        <input type = "submit" name = "submit" value = "CREATE">    
    </form>
    <br>
    <a href = "login.php">
        <button> RETURN TO LOGIN </button>
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
    $blank = "";
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]))
    {
        if ($_POST["firstname"]==$blank || $_POST["lastname"]==$blank || $_POST["email"]==$blank || $_POST["password"]==$blank)
        {
            echo "You have left an entry blank. Please enter information in all fields to create an account";
        }
        else 
        {
            $fName = $_POST["firstname"];
            $lName = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "INSERT INTO users (name_first, name_last, email, pass) VALUES('$fName', '$lName', '$email', '$password')";
            try
            {
                mysqli_query($connect, $sql);
                echo "New user account has been registered. <br> ";
                $newUserQuery = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($connect, $newUserQuery);
                $newUserInfo = mysqli_fetch_assoc($result);
                $_SESSION["userID"] = $newUserInfo["u_id"];
                $_SESSION["firstName"] = $newUserInfo["name_first"];
                //add redirect to calender management page
                header("Location: CalendarPage.php");
            }
            catch(mysqli_sql_exception)
            {
                echo "could not create user";
            }
        }
    }  
    mysqli_close($connect);
?>