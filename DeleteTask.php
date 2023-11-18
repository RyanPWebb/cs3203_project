<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "DeleteTask.php" method = "post"> 

        <label> What Day to delete event: </label> <br>
        <input type = "text" name = "dayDel"><br>
        <label> Delete Event Description: </label> <br>
        <input type = "text" name = "delEvent"><br>
        <input type =  "submit" value = "Delete Event">
    </form>    

</body>
</html>

<?php

     $dayDel;
    echo $delDesc;

?>