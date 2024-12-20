<?php

class myDB
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

    function insertData($uname, $email, $pass, $access, $number, $gender, $bio, $dob, $doj, $preadd, $peradd, $nidPath, $picPath, $table, $connectionobject)
    {
        $sql = "INSERT INTO admin (
            name, email, password, access, number, gender, bio, dob, doj, presentaddress, permanentaddress, 
            nidpic, propic)
             VALUES ('$uname', '$email', '$pass', $access, '$number', '$gender', '$bio', '$dob', '$doj', '$preadd', '$peradd', 
             '$nidPath', '$picPath')";
        return $connectionobject->query($sql);
    }

    function showUser($table, $conobj)
    {
        $sql = 'SELECT * FROM $table';
        $results = $conobj->query($sql);
        return $results;
    }

    function closecon($connectionObject)
    {
        $connectionObject->close();
    }
}
