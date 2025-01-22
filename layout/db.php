<?php
class UserDB
{
    function openCon()
    {
        $DBHost = "localhost:3306";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "pcmartbd";
        $connectionObject = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }
        return $connectionObject;
    }

    function getUserByEmail($email, $connectionObject)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    function checkPassword($inputPassword, $storedPassword)
    {
        return $inputPassword === $storedPassword;
    }

    function closeCon($connectionObject)
    {
        $connectionObject->close();
    }

    function getAdminIdByEmail($email, $connectionObject)
    {
        $sql = "SELECT admin_id FROM admin WHERE email = '$email'";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['admin_id'];
        }
        return null;
    }
}
?>
