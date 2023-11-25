

<?php
    //include(database.php);
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
        First name:<br>
        <input type = "text" name = "firstname"><br>
        Last name:<br>
        <input type = "text" name = "lastname"><br>
        email:<br>
        <input type = "text" name = "email"><br>
        password:<br>
        <input type = "password" name = "password"><br>
        <input type = "submit" name = "submit" value = "create">
        

    </form>
    <a href = "login.php">
        <button> return to login </button>
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

    if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]))
    {

        $fName = $_POST["firstname"];
        $lName = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO user (name_first, name_last, email, pass) VALUES('$fName', '$lName', '$email', '$password')";
        try
        {
            mysqli_query($connect, $sql);
            echo " <br> user is registered <br> ";
        }
        catch(mysqli_sql_exception)
        {
            echo "could not create user";
        }
    }  
    else
    {
        echo "you have left an entry blank";
    } 


    mysqli_close($connect);
?>
