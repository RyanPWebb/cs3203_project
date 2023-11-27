<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class dbTests extends TestCase
{
    public function testConnection() : void {
        $connection = mysqli_connect('localhost', 'project','Password123', 'engineering_project');
        $this->assertIsObject($connection);
        mysqli_close($connection);
    }

    public function testCreateUser() : void {
        $fName = 'John';
        $lName = 'Doe';
        $email = 'JDoe@email.com';
        $password = 'thisPass';

        $connection = mysqli_connect('localhost', 'project', 'Password123', 'engineering_project');
        $query = "INSERT INTO Users (name_first, name_last, email, pass) VALUES ('$fName', '$lName', '$email', '$password')";
        mysqli_query($connection, $query);

        $newQuery = "SELECT * FROM Users WHERE name_first = '$fName'";
        $reslt = mysqli_query($connection, $newQuery);
        $users = mysqli_fetch_all($reslt, MYSQLI_ASSOC);

        $this->assertSame($users[0]['name_first'], $fName);
        $this->assertSame($users[0]['name_last'], $lName);
        $this->assertSame($users[0]['email'], $email);
        $this->assertSame($users[0]['pass'], $password);

        mysqli_close($connection);
        
    }
}