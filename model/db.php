<?php

class myDB
{

    function openCon()
    {
        $DBHost = "localhost:3306";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "secj";
        $connectionObject = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);
        return $connectionObject;
    }

    function insertData($uname,
    $email,
    $pass,
    $access,
    $number,
    $gender,
    $bio,
    $dob,
    $doj,
    $preadd,
    $peradd,
    $nidFile,
    $picFile, $table, $connectionObject)
    {
        $sql = "INSERT INTO users(name,email,password) 
        VALUES('$name','$email','$password')";
        if ($connectionObject->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }


    function closecon($connectionObject)
    {
        $connectionObject->close();
    }
}
