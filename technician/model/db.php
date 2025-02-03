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
            first_name, last_name, father_name, gender, dob, phone, address, experience, work_area, work_hour, nidpic, photo, cv, email, password, join_date)
             VALUES ('$fname', '$lname', '$fatherName', '$gender', '$dob', '$phone', '$address', '$experience', '$workArea', '$workHour', '$nidPath', '$photoPath', '$cvPath', '$email', '$pass', NOW())";
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

    function updatePassword($connectionObject, $tech_id, $user_id, $newPassword)
    {
        $sql_technician = "UPDATE technician SET password='$newPassword' WHERE technician_id = '$tech_id' ";
        $technician_result = $connectionObject->query($sql_technician);
        $sql_user = "UPDATE user SET password='$newPassword' WHERE user_id = '$user_id' ";
        $user_result = $connectionObject->query($sql_user);
        return ($technician_result && $user_result);
    }

    function updateMessage($conn, $appointment_id, $sender, $message)
    {
        if ($sender == "customer") {
            $sql = "UPDATE appointment SET previous_customer_message = '$message' WHERE appointment_id = $appointment_id";
        } else {
            $sql = "UPDATE appointment SET previous_technician_message = '$message' WHERE appointment_id = $appointment_id";
        }
        return $conn->query($sql);
    }

    public function updateProfile($connectionObject, $tech_id, $user_id, $fname, $lname, $fatherName, $gender, $dob, $phone, $address, $experience, $workArea, $workHour, $photoPath, $email)
    {
        $photoUpdate = $photoPath ? ", photo='$photoPath'" : "";
        $technician_sql = "UPDATE technician SET 
            first_name='$fname', 
            last_name='$lname', 
            father_name='$fatherName', 
            gender='$gender', 
            dob='$dob', 
            phone='$phone', 
            address='$address', 
            experience='$experience', 
            work_area='$workArea', 
            work_hour='$workHour' 
            $photoUpdate , 
            email = '$email'
            WHERE technician_id=$tech_id";

        $technician_update = $connectionObject->query($technician_sql);

        $user_sql = "UPDATE user SET email='$email' WHERE user_id=$user_id";
        $user_update = $connectionObject->query($user_sql);

        return ($technician_update && $user_update);
    }


    public function checkEmailExists($connectionObject, $email, $user_id)
    {
        $sql = "SELECT * FROM user WHERE email='$email' AND user_id != $user_id";
        $result = $connectionObject->query($sql);
        return ($result && $result->num_rows > 0);
    }

    public function updatePhotoPath($connectionObject, $tech_id, $defaultPhotoPath)
    {
        $technician_sql = "UPDATE technician SET photo='$defaultPhotoPath' WHERE technician_id=$tech_id";
        return $connectionObject->query($technician_sql);
    }



    function viewAvailableAppointments($connectionobject)
    {
        $sql = "SELECT a.appointment_id, a.appointment_date, a.status, a.type, a.details, c.name AS customer_name, c.phone AS customer_phone 
            FROM Appointment a
            JOIN Customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id IS NULL AND a.status ='Pending'";

        $result = $connectionobject->query($sql);
        return $result;
    }

    public function markAppointmentInProgress($appointment_id, $tech_id, $connectionObject)
    {
        $sql = "UPDATE appointment SET status = 'In Progress', technician_id = '$tech_id' WHERE appointment_id = $appointment_id";
        return $connectionObject->query($sql);
    }

    public function markAppointmentComplete($appointment_id, $connectionObject)
    {
        $sql = "UPDATE appointment SET status = 'Completed' WHERE appointment_id = $appointment_id";
        return $connectionObject->query($sql);
    }

    public function markAppointmentCancelled($appointment_id, $connectionObject)
    {
        $sql = "UPDATE appointment SET status = 'Cancelled' WHERE appointment_id = $appointment_id";
        return $connectionObject->query($sql);
    }

    public function updateAppointmentStatus($appointment_id, $status, $connectionobject)
    {
        $sql = "UPDATE Appointment SET status = '$status' WHERE appointment_id = $appointment_id";
        return $connectionobject->query($sql);
    }



    function viewActionRequiredAppointments($connectionobject, $technician_id)
    {
        $sql = "SELECT a.appointment_id, a.appointment_date, a.status, c.name AS customer_name, c.phone AS customer_phone 
            FROM Appointment a
            JOIN Customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id = $technician_id AND a.status ='In Progress'";

        $result = $connectionobject->query($sql);
        return $result;
    }

    function viewAllAppointments($connectionobject, $technician_id)
    {
        $sql = "SELECT a.appointment_id, a.appointment_date, a.status, a.type, a.details, a.previous_customer_message, a.previous_technician_message,
        c.name AS customer_name, c.phone AS customer_phone 
            FROM Appointment a
            JOIN Customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id = $technician_id";

        $result = $connectionobject->query($sql);
        return $result;
    }

    function searchAppointments($conn, $searchTerm, $tech_id)
{
    $sql = "SELECT a.appointment_id, a.appointment_date, a.status, a.type, a.details, 
                   a.previous_customer_message, a.previous_technician_message, a.technician_id, 
                   c.name AS customer_name, c.phone AS customer_phone 
            FROM Appointment a
            JOIN Customer c ON a.customer_id = c.customer_id
            WHERE a.technician_id = $tech_id 
              AND (c.name LIKE '%$searchTerm%' 
                   OR c.phone LIKE '%$searchTerm%' 
                   OR a.status LIKE '%$searchTerm%')";

    $result = $conn->query($sql);
    return $result;
}



    function filterFeedback($conn, $rating, $tech_id)
    {
        $sql = "SELECT a.customer_id, c.name, c.email, c.phone, a.status AS appointment_status, a.customer_rating, a.customer_comment, a.appointment_id
            FROM appointment a
            JOIN customer c ON a.customer_id = c.customer_id
            WHERE a.customer_rating = '$rating' AND a.technician_id = '$tech_id' AND a.status = 'Completed';";

        $result = $conn->query($sql);
        return $result;
    }



    public function getCustomersByTechnician($connectionObject, $tech_id)
    {
        $sql = "SELECT a.customer_id, c.name, c.email, c.phone, a.status AS appointment_status, a.technician_rating, a.technician_comment, a.appointment_id,
        a.appointment_date, a.status FROM appointment a JOIN customer c ON a.customer_id = c.customer_id WHERE a.technician_id = '$tech_id' AND a.status = 'Completed' ";

        $result = $connectionObject->query($sql);

        return $result;
    }





    public function updateCustomerRating($connectionObject, $appointment_id, $rating, $comment)
    {

        $sql = "UPDATE appointment SET technician_rating = '$rating', technician_comment = '$comment'
        WHERE appointment_id = '$appointment_id'";

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
        return $result;
    }

    function totalAppointmentByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS total_appointments FROM appointment WHERE technician_id = $tech_id GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total_appointments'];
        } else {
            return 0;
        }
    }

    function inProgressAppointmentsByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS inprogress_appointments FROM appointment WHERE technician_id = $tech_id AND status = 'In Progress' GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['inprogress_appointments'];
        } else {
            return 0;
        }
    }

    function cancelledAppointmentsByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS cancelled_appointments FROM appointment WHERE technician_id = $tech_id AND status = 'Cancelled' GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['cancelled_appointments'];
        } else {
            return 0;
        }
    }

    function completedAppointmentByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS completed_appointments FROM appointment WHERE technician_id = $tech_id AND status = 'Completed' GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['completed_appointments'];
        } else {
            return 0;
        }
    }

    function totalReviewsByTechnicianID($connectionObject, $tech_id)
    {
        $sql = "SELECT technician_id, COUNT(*) AS total_reviews FROM appointment WHERE technician_id = $tech_id AND customer_rating != 0 GROUP BY technician_id;";
        $result = $connectionObject->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total_reviews'];
        } else {
            return 0;
        }
    }

    function allTechnicianReports($connectionObject, $tech_id)
    {
        $sql = "SELECT * FROM reports WHERE technician_id = $tech_id";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function insertContactAdminMessage($email, $subject, $message, $connectionObject)
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
