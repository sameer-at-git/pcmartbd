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

    function getAdminByEmail($connectionObject, $email)
    {
        $sql = "SELECT * FROM admin WHERE email=$email";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }

    function updateProfile($id, $uname, $number,$bio,$dob,$preadd, $peradd, $pass,$access , $email, $connectionObject)
    {
        $sql = "UPDATE admin SET name='$uname',  password='$pass',  number='$number',  bio='$bio', dob='$dob',  presentaddress='$preadd', permanentaddress='$peradd' WHERE admin_id=$id";
        $admin_update = $connectionObject->query($sql);

        $sql = "UPDATE user SET name='$uname',  password='$pass', user_type='$access' WHERE email='$email' ";
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

    function updateTechnician($connectionObject, $first_name, $last_name, $phone, $email, $experience, $work_area, $work_hour)
    {
        $sql = "UPDATE technician SET 
                first_name = '$first_name',
                last_name = '$last_name',
                phone = '$phone',
                experience = '$experience',
                work_area = '$work_area',
                work_hour = '$work_hour'
                WHERE email = '$email' ";

        $tech_update = $connectionObject->query($sql);
        return $tech_update;
    }

    function deleteTechnician($connectionObject, $email)
    {
        $user_sql = "DELETE FROM user WHERE email = '$email' ";
        $user_delete = $connectionObject->query($user_sql);
        $sql = "DELETE FROM technician WHERE email = '$email' ";
        $tech_delete = $connectionObject->query($sql);

        return ($tech_delete && $user_delete);
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

    public function updateCustomer($conn,  $name, $email, $password, $address, $phone)
    {
        $sql = "UPDATE customer 
                SET name='$name',  
                    password='$password', 
                    address='$address', 
                    phone='$phone' 
                WHERE email='$email' ";
        $customer_update = $conn->query($sql);

        $user_sql = "UPDATE user SET password = '$password' WHERE email = '$email'";
        $user_update = $conn->query($user_sql);

        return ($customer_update && $user_update);
    }

    public function deleteCustomer($conn, $email)
    {
        $user_sql = "DELETE FROM user WHERE email='$email' ";
        $user_delete = $conn->query($user_sql);
        $sql = "DELETE FROM customer WHERE email='$email' ";
        $customer_delete = $conn->query($sql);

        return ($customer_delete && $user_delete);
    }

    public function getProducts($conn)
    {
        $sql = "SELECT * FROM product ";
        $result = $conn->query($sql);
        return $result;
    }

    public function addProduct($conn, $type, $brand, $quantity, $status,$price, $about, $photo)
    {
        $sql = "INSERT INTO product (type, brand, quantity, status,price, about, photo  ) 
                VALUES ('$type', '$brand', $quantity, $status,$price, '$about', '$photo' )";
        $result = $conn->query($sql);
    
        return $result;
    }

    public function updateProduct($conn, $pid, $type, $brand, $quantity, $price,  $photo, $status)
    {
        $sql = "UPDATE product SET 
                type = '$type',
                brand = '$brand',
                quantity = $quantity,
                price = $price,
                photo = '$photo',
                status = $status
                WHERE pid = $pid";
        return $conn->query($sql);
    }

    function deleteProduct($conn, $pid)
    {
        $sql = "DELETE FROM product WHERE pid = $pid";
        return $conn->query($sql);
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

    // Customer Overview Functions
    function getTotalCustomers($conn)
    {
        $sql = "SELECT COUNT(*) as total FROM customer";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

    function getActiveSubscriptions($conn)
    {
        /*$sql = "SELECT COUNT(*) as total FROM customer WHERE status = 'active'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    function getCustomerSatisfactionRating($conn)
    {
        /*$sql = "SELECT AVG(rating) as avg_rating FROM review WHERE review_type = 'customer'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_rating'] ?? 0, 1);*/
    }

    // Employee Performance Functions
    function getTotalEmployees($conn)
    {
        $sql = "SELECT COUNT(*) as total FROM employee";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

    function getAverageEmployeePerformance($conn)
    {
        /*$sql = "SELECT AVG(performance_rating) as avg_performance FROM employee";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_performance'] ?? 0, 1)     ;  */
    }

    function getTopPerformersCount($conn)
    {
        /*$sql = "SELECT COUNT(*) as total FROM employee WHERE performance_rating >= 8";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    // Technician Performance Functions
    function getTotalTechnicians($conn)
    {
        $sql = "SELECT COUNT(*) as total FROM technician";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

    function getTechnicianAverageRating($conn)
    {
        /*$sql = "SELECT AVG(rating) as avg_rating FROM review WHERE review_type = 'technician'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_rating'] ?? 0, 1);*/
    }

    function getTotalCompletedJobs($conn)
    {
        /* $sql = "SELECT COUNT(*) as total FROM orders WHERE status = 'completed' AND service_type = 'repair'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    // Overall Revenue Functions
    function getTotalRevenue($conn)
    {
        /*$sql = "SELECT SUM(amount) as total FROM payment";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['total'] ?? 0, 2);*/
    }

    function getMonthlyGrowthRate($conn)
    {
        /* $sql = "SELECT 
                    (SELECT SUM(amount) FROM payment 
                     WHERE MONTH(payment_date) = MONTH(CURRENT_DATE)) as current_month,
                    (SELECT SUM(amount) FROM payment 
                     WHERE MONTH(payment_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)) as last_month";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        
        if ($data['last_month'] > 0) {
            $growth = (($data['current_month'] - $data['last_month']) / $data['last_month']) * 100;
            return number_format($growth, 1);
        }
        return 0;*/
    }

    function getAverageOrderValue($conn)
    {
        /* $sql = "SELECT AVG(amount) as avg_amount FROM payment";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_amount'] ?? 0, 2);*/
    }

    // Product Performance Functions
    function getTotalProducts($conn)
    {
        $sql = "SELECT COUNT(*) as total FROM product";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

    function getTopSellingProductCount($conn)
    {
        /* $sql = "SELECT COUNT(DISTINCT product_id) as total 
                FROM orders 
                WHERE product_id IN (
                    SELECT product_id 
                    FROM orders 
                    GROUP BY product_id 
                    HAVING COUNT(*) >= 5
                )";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    function getLowStockProductCount($conn)
    {
        /*$sql = "SELECT COUNT(*) as total FROM product WHERE stock < 10";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    // Ratings & Reviews Functions
    function getTotalReviews($conn)
    {
        /*$sql = "SELECT COUNT(*) as total FROM review";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    function getAverageProductRating($conn)
    {
        /*$sql = "SELECT AVG(rating) as avg_rating FROM review WHERE review_type = 'product'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_rating'] ?? 0, 1);*/
    }

    function getRecentReviewsCount($conn)
    {
        /*$sql = "SELECT COUNT(*) as total FROM review 
                WHERE review_date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }
    
    function closecon($connectionObject)
    {
        $connectionObject->close();
    }
}
