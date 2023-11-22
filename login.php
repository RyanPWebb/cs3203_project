

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
        email:<br>
        <input type = "text" name = "email"><br>
        password:<br>
        <input type = "password" name = "password"><br>
        <input type = "submit" name = "submit" value = "login">
    </form>
<a href = "create_account.php">
        <button> create account </button>
</a>
</body>
</html>


<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "calender_db"; //CHANGE THIS VARIABLE TO YOUR DATABASE'S NAME

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
                //add redirect to calender management page
            }
        } 
        else
        {
            echo "user not found";
        }
    }
    else
    {
        echo "please enter values for email and password";
    }



    //close db connection
    mysqli_close($connect);
?>
