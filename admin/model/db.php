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



    
    function insertData($uname, $email, $pass, $access, $number, $gender, $bio, $dob, $doj, $preadd, $peradd, $nidPath, $picPath, $connectionobject)
    {
        $sql = "INSERT INTO admin (name, email, password, access, number, gender, bio, dob, doj, presentaddress, permanentaddress, nidpic, propic) VALUES ('$uname', '$email', '$pass', '$access', '$number', '$gender', '$bio', '$dob', '$doj', '$preadd', '$peradd', '$nidPath', '$picPath')";
        $admin_result = $connectionobject->query($sql);

        $sql = "INSERT INTO user (email, password, user_type,subtype) VALUES ( '$email', '$pass', 'Admin','$access')";
        $user_result = $connectionobject->query($sql);

        return ($admin_result && $user_result);
    }

    function getUserInfo($connectionObject, $id)
    {
        $sql = "SELECT * FROM admin WHERE admin_id=$id";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }


    function getUsersByTypeOrEmail($connectionObject, $query)
    {
        $sql = "SELECT user_id, email, user_type FROM user WHERE 1 AND email LIKE '%" . $query . "%'";
        $result = $connectionObject->query($sql);
        if ($result->num_rows > 0) {
            return $result; 
        } else {
            return []; 
        }
    }
    
    function insertContactUser($connectionObject, $admin_id, $user_id, $subject, $message)
    {
    $sql = "INSERT INTO contactuser (admin_id, user_id, subject, message) 
            VALUES ($admin_id, $user_id, '$subject', '$message')";

    $result = $connectionObject->query($sql);

    if ($result) {
        return "Message inserted successfully!";
    } else {
            return "Error: " . $connectionObject->error;
        }
    }


    function getAdminByEmail($connectionObject, $email)
    {
        $sql = "SELECT * FROM admin WHERE email='$email' ";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }

    function updateProfile($id, $uname, $number,$bio,$preadd, $peradd, $pass,$access , $email, $connectionObject)
    {
        $sql = "UPDATE admin SET name='$uname',  password='$pass',  number='$number',  bio='$bio',  presentaddress='$preadd', permanentaddress='$peradd' WHERE admin_id=$id";
        $admin_update = $connectionObject->query($sql);

        $sql = "UPDATE user SET password='$pass', user_type='$access' WHERE email='$email' ";
        $user_update = $connectionObject->query($sql);

        return ($admin_update && $user_update);
    }

    function getAllTechnicians($connectionObject)
    {
        $sql = "SELECT * FROM technician";
        return $connectionObject->query($sql);
    }
    function getTechnicianByID($connectionObject, $tid)
    {
        $sql = "SELECT CONCAT(first_name,' ',last_name) AS technician_name FROM technician WHERE technician_id=$tid";
        $result = $connectionObject->query($sql);
        return $result;
    }
    function getCustomerByID($connectionObject, $cid)
    {
        $sql = "SELECT name FROM customer WHERE customer_id=$cid";
        $result = $connectionObject->query($sql);
        return $result;
    }
    function getAllAppointments($connectionObject)
    {
        $sql = "SELECT * FROM appointment";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function getAllAdmins($connectionObject)
    {
        $sql = "SELECT * FROM admin";
        return $connectionObject->query($sql);
    }

    

    function deleteAdmin($connectionObject, $email)
    {
        $user_sql = "DELETE FROM user WHERE email = '$email' ";
        $user_delete = $connectionObject->query($user_sql);
        $sql = "DELETE FROM admin WHERE email = '$email' ";
        $admin_delete = $connectionObject->query($sql);
        return ($admin_delete && $user_delete);
    }

    public function getAllCustomers($conn)
    {
        $sql = "SELECT * FROM customer ORDER BY customer_id";
        return $conn->query($sql);
    }


    public function getProducts($conn)
    {
        $sql = "SELECT * FROM product ";
        $result = $conn->query($sql);
        return $result;
    }

   
    function getAllEmployees($conn)
    {
        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);
        return $result;
    }

    function insertEmployee($f_name, $l_name, $phone, $dob, $pre_add, $per_add, $gender, $marital_status, $nid, $pic, $joining_date, $employment, $email, $password,  $conObj)
    {
        $sql = "INSERT INTO employee (f_name, l_name, phone, dob, pre_add, per_add, gender, marital_status, nid, pic, joining_date, employment,  email, password) VALUES ('$f_name', '$l_name', '$phone', '$dob', '$pre_add', '$per_add', '$gender', '$marital_status', '$nid', '$pic', '$joining_date', '$employment',  '$email', '$password')";
        $emp_result = $conObj->query($sql);
        $sql = "INSERT INTO user ( email, password, user_type,subtype) VALUES ( '$email', '$password', 'Employee','$employment')";
        $user_result = $conObj->query($sql);
        return ($emp_result && $user_result);
    }
    function updateEmployee($conn, $f_name, $l_name, $phone, $email, $dob, $pre_add, $gender, $employment)
    {
        $sql = "UPDATE employee SET 
                f_name = '$f_name',
                l_name = '$l_name',
                phone = '$phone',
                dob = '$dob',
                pre_add = '$pre_add',
                gender = '$gender',
                employment = '$employment'
                WHERE  email = '$email' ";

        $emp_update = $conn->query($sql);

        $user_sql = "UPDATE user SET subtype = '$employment' WHERE email = '$email'";
        $user_update = $conn->query($user_sql);
        return ($emp_update && $user_update);
    }

    function deleteEmployee($conn, $email)
    {
        $user_sql = "DELETE FROM user WHERE email = '$email' ";
        $user_delete = $conn->query($user_sql);
        $sql = "DELETE FROM employee WHERE email ='$email' ";
        $emp_delete = $conn->query($sql);
        return ($emp_delete && $user_delete);
    }

    function getAllMessages($connectionObject, $type = null) {
        if ($type === null) {
            $sql = "SELECT * FROM messages ORDER BY sent_date DESC";
        } else {
            $type = $connectionObject->$type;
            $sql = "SELECT * FROM messages WHERE user_type = '$type' ORDER BY sent_date DESC";
        }
        return $connectionObject->query($sql);
    }

    function insertMessage($email, $subject, $message, $conn) {
        $sql = "INSERT INTO messages (email,subject,message,sent_date,user_type  ) 
              VALUES ('$email', '$subject','$message', NOW(), 'Admin' )";
        $result = $conn->query($sql);
    
        return $result;
    }
    
    function getTechnicianReviews($connectionObject) {
        $sql = "SELECT appointment_id, customer_id, technician_id, 
                       technician_rating AS rating, 
                       technician_comment AS review
                FROM appointment
                WHERE technician_rating > 0";
    
        $result = $connectionObject->query($sql);
        return $result;
    }
    
    
    
    
    function getCustomerReviews($connectionObject) {
        $sql = "SELECT appointment_id, customer_id, technician_id, 
                       customer_rating AS rating, 
                       customer_comment AS review
                FROM appointment
                WHERE customer_rating > 0";
    
        $result = $connectionObject->query($sql);
        return $result;
    }
    
    function getProductReviews($connectionObject) {
        $sql = "SELECT o.order_id, 
                       c.email AS customer_email, 
                       p.type AS product_name, 
                       o.customer_rating AS rating, 
                       o.customer_review AS review, 
                       o.order_date
                FROM orders o
                JOIN user c ON o.customer_id = c.user_id
                JOIN product p ON o.product_id = p.pid
                WHERE o.customer_rating IS NOT NULL";
    
        $result = $connectionObject->query($sql);
        return $result;
    }
    


    function closecon($connectionObject)
    {
        $connectionObject->close();
    }

    
    function searchProducts($conn, $searchTerm) {
        $sql = "SELECT pid, type, brand, quantity, status, photo, about, price  FROM product  WHERE type LIKE '%$searchTerm%'  OR brand LIKE '%$searchTerm%'  ;";
        
        $result = $conn->query($sql);
        return $result;
    }

        
 }   
    
