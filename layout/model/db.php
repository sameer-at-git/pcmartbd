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
    function getTechnicianIdByEmail($email, $connectionObject)
    {
        $sql = "SELECT technician_id FROM technician WHERE email = '$email'";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['technician_id'];
        }
        return null;
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

    function insertMessage($email, $subject, $message, $connectionObject)
    {
        $sql = "SELECT user_type FROM user WHERE email = '$email'";
        $result = $connectionObject->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $senderType = $row['user_type'];
            $insertSql = "INSERT INTO messages (email, subject, message, sent_date,user_type) 
                      VALUES ('$email', '$subject', '$message',  NOW(),'$senderType')";
            return $connectionObject->query($insertSql);
        } else {
            $insertSql = "INSERT INTO messages (email, subject, message, sent_date,user_type) 
                      VALUES ('$email', '$subject', '$message',  NOW(),'Guest')";
            return $connectionObject->query($insertSql);
        }
    }

    function getTechnicianIdByEmail($email, $connectionObject)
    {
        $sql = "SELECT technician_id FROM technician WHERE email = '$email'";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['technician_id'];
        }
        return null;
    }
}
