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

    function insertData($uname,$email,$pass,$access,$number,$gender,$bio,$dob,$doj,$preadd,$peradd,$nidFile,$picFile,$table,$connectionobject)
    {
        $sql = "INSERT INTO admin (
            name, email, password, accesstype, number, gender, bio, dob, doj, presentaddress, permanentaddress, nidpic, propic
        ) VALUES (
            '$uname', '$email', '$pass', $access, '$number', '$gender', '$bio', '$dob', '$doj', '$preadd', '$peradd', '$nidFile', '$picFile'
        )";
        $connectionobject->query($sql);
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
