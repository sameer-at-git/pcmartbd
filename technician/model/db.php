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

    function getUserInfo($connectionObject, $tech_id)
    {
        $sql = "SELECT * FROM technician WHERE technician_id=$tech_id";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }

    function updatePassword($connectionObject, $tech_id, $user_id, $newPassword) {
        $sql_technician = "UPDATE technician SET password='$newPassword' WHERE technician_id = '$tech_id' ";
        $technician_result = $connectionObject->query($sql_technician);
        $sql_user = "UPDATE user SET password='$newPassword' WHERE user_id = '$user_id' ";
        $user_result = $connectionObject->query($sql_user);
        return ($technician_result && $user_result);
    }

    function viewUpcomingAppointments($technician_id, $connectionobject)
    {
        $sql = "SELECT a.appointment_id, a.appointment_date, a.status, c.name AS customer_name, c.phone AS customer_phone 
            FROM Appointment a
            JOIN Customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id = $technician_id AND a.status ='Pending'";

        $result = $connectionobject->query($sql);

        if ($result && $result->num_rows > 0) {
            $appointments = [];
            while ($row = $result->fetch_assoc()) {
                $appointments[] = $row;
            }
            return $appointments;
        }

        return [];
    }

    function viewAppointmentHistory($technician_id, $connectionobject)
    {
        $sql = "SELECT a.appointment_id, a.appointment_date, a.status, c.name AS customer_name, c.phone AS customer_phone 
            FROM Appointment a
            JOIN Customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id = $technician_id AND a.status ='Completed'";

        $result = $connectionobject->query($sql);

        if ($result && $result->num_rows > 0) {
            $appointments = [];
            while ($row = $result->fetch_assoc()) {
                $appointments[] = $row;
            }
            return $appointments;
        }

        return [];
    }

    function viewAllAppointments($technician_id, $connectionobject)
    {
        $sql = "SELECT a.appointment_id, a.appointment_date, a.status, c.name AS customer_name, c.phone AS customer_phone 
            FROM Appointment a
            JOIN Customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id = $technician_id";

        $result = $connectionobject->query($sql);

        if ($result && $result->num_rows > 0) {
            $appointments = [];
            while ($row = $result->fetch_assoc()) {
                $appointments[] = $row;
            }
            return $appointments;
        }

        return [];
    }

    public function getCustomersByTechnician($connectionObject, $tech_id)
    {
        $sql = "
        SELECT 
        a.customer_id, 
        c.name, 
        c.email, 
        c.phone, 
        a.status AS appointment_status, 
        a.technician_rating, 
        a.technician_comment,
        a.appointment_id
        FROM 
        appointment a
        JOIN 
        customer c ON a.customer_id = c.customer_id
        WHERE 
        a.technician_id = '$tech_id' AND a.status = 'Completed'
    ";

        $result = $connectionObject->query($sql);

        // Check if query succeeded and rows exist
        if ($result && $result->num_rows > 0) {
            $customers = [];
            // Fetch all rows
            while ($row = $result->fetch_assoc()) {
                $customers[] = $row;
            }
            return $customers; // Return an array of customers
        }

        return []; // Return an empty array if no rows are found
    }





    public function updateCustomerRating($connectionObject, $appointment_id, $rating, $comment)
    {

        $sql = "
        UPDATE appointment 
        SET technician_rating = '$rating', technician_comment = '$comment'
        WHERE appointment_id = '$appointment_id'
    ";

        if ($connectionObject->query($sql)) {
            return true;
        } else {
            return false;
        }
    }


    public function getCustomerFeedback($connectionObject, $tech_id)
    {
        $sql = "SELECT a.customer_id, c.name, c.email, c.phone, a.status AS appointment_status, a.customer_rating, a.customer_comment, a.appointment_id
            FROM appointment a
            JOIN customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id = '$tech_id' AND a.status = 'Completed';";


        $result = $connectionObject->query($sql);

        if ($result && $result->num_rows > 0) {
            $feedback = [];
            while ($row = $result->fetch_assoc()) {
                $feedback[] = $row;
            }
            return $feedback;
        }
        return [];
    }

    function totalAppointmentByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS total_appointments FROM appointment WHERE technician_id = $tech_id GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function pendingAppointmentByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS pending_appointments FROM appointment WHERE technician_id = $tech_id AND status = 'Pending' GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function completedAppointmentByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS completed_appointments FROM appointment WHERE technician_id = $tech_id AND status = 'Completed' GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function totalReviewsByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS total_reviews FROM appointment WHERE technician_id = $tech_id AND customer_rating != 0 GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        return $result;
    }


    function getUserByID($table, $connectionObject, $id)
    {
        $sql = 'SELECT * FROM $table WHERE id=$id';
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


    function insertReport($technician_id, $subject, $priority, $message, $connectionObject)
    {

        $insertSql = "INSERT INTO reports (technician_id, subject, priority, message , sent_date) 
                      VALUES ('$technician_id', '$subject', '$priority',  '$message',NOW())";
        return $connectionObject->query($insertSql);
    }



    function closecon($connectionObject)
    {
        $connectionObject->close();
    }
}
