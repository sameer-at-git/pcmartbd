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

    function insertData($fname, $lname, $fatherName, $gender, $dob, $phone, $address, $experience, $workArea, $workHour, $nidPath, $photoPath, $cvPath, $email, $pass, $table, $connectionobject)
    {
        $sql_technician = "INSERT INTO technician (
            first_name, last_name, father_name, gender, dob, phone, address, experience, work_area, work_hour, nidpic, photo, cv, email, password)
             VALUES ('$fname', '$lname', '$fatherName', '$gender', '$dob', '$phone', '$address', '$experience', '$workArea', '$workHour', '$nidPath', '$photoPath', '$cvPath', '$email', '$pass')";
        $technician_result = $connectionobject->query($sql_technician);
        $sql_user = "INSERT INTO user (email, password, user_type) 
                    VALUES ('$email', '$pass', 'Technician')";
        $user_result = $connectionobject->query($sql_user);

        return ($technician_result && $user_result);
    }

    function showUser($table, $conobj)
    {
        $sql = "SELECT * FROM $table";
        $results = $conobj->query($sql);
        return $results;
    }

// db.php
function viewAppointments($technician_id, $connectionobject, $search = null, $filterColumn = null, $filterValue = null)
{
    // Base query
    $sql = "SELECT a.appointment_id, a.appointment_date, a.status, c.name AS customer_name, c.phone AS customer_phone 
            FROM Appointment a
            JOIN Customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id = $technician_id";

    // Add search feature
    if ($search) {
        $sql .= " AND a.appointment_id LIKE '%$search%'";
    }

    // Add filtering by column and value
    if ($filterColumn && $filterValue) {
        // Map filterColumn to actual database column
        if ($filterColumn === 'customer_name') {
            $filterColumn = 'c.first_name'; // Map alias to actual column
        }
        $sql .= " AND $filterColumn = '$filterValue'";
    }

    // Add LIMIT for pagination
    $sql .= " LIMIT 10";

    // Execute the query
    $result = $connectionobject->query($sql);

    // Fetch results as an associative array
    $appointments = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $appointments[] = $row;
        }
    }

    // Return the appointment list
    return $appointments;
}




    function getUserByID($table, $connectionObject, $id)
    {
        $sql = 'SELECT * FROM $table WHERE id=$id';
    }
    function closecon($connectionObject)
    {
        $connectionObject->close();
    }
}
