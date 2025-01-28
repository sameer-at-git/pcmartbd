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
        $sql_admin = "INSERT INTO admin (
            name, email, password, access, number, gender, bio, dob, doj, presentaddress, permanentaddress, 
            nidpic, propic)
            VALUES ('$uname', '$email', '$pass', '$access', '$number', '$gender', '$bio', '$dob', '$doj', '$preadd', '$peradd', 
            '$nidPath', '$picPath')";
        $admin_result = $connectionobject->query($sql_admin);
        $sql_user = "INSERT INTO user (email, password, user_type, subtype) 
                    VALUES ('$email', '$pass', 'Admin', '$access')";
        $user_result = $connectionobject->query($sql_user);

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
        $sql = "SELECT * FROM admin WHERE 'email'=$email";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }

    function updateUserInfo($connectionObject, $aid, $name, $number, $bio, $dob, $preadd, $peradd, $password,$uid)
    {
        $sql = "UPDATE admin SET 
                name='$name', 
                number='$number',
                bio='$bio',
                dob='$dob',
                presentaddress='$preadd',
                permanentaddress='$peradd',
                password='$password'
                WHERE admin_id=$aid";
        $admin_update = $connectionObject->query($sql);
        $user_sql = "UPDATE user SET
                     password = '$password'
                     WHERE user_id = $uid";
        $user_update = $connectionObject->query($user_sql);
        
        return ($admin_update && $user_update);
    }

    function closecon($connectionObject)
    {
        $connectionObject->close();
    }

    function getAllTechnicians($connectionObject) {
        $sql = "SELECT * FROM technician";
        return $connectionObject->query($sql);
    }

    function updateTechnician($connectionObject, $technician_id, $first_name, $last_name, $phone, $email, $experience, $work_area, $work_hour) {
        $sql = "UPDATE technician SET 
                first_name = '$first_name',
                last_name = '$last_name',
                phone = '$phone',
                experience = '$experience',
                work_area = '$work_area',
                work_hour = '$work_hour',
                email = '$email'
                WHERE technician_id = $technician_id";

        $tech_update = $connectionObject->query($sql);
        return $tech_update;
    }

    function deleteTechnician($connectionObject, $technician_id,$uid    ) {
        $user_sql = "DELETE FROM user WHERE user_id = $uid";
        $user_delete = $connectionObject->query($user_sql);
        $sql = "DELETE FROM technician WHERE technician_id = $technician_id";
        $tech_delete = $connectionObject->query($sql);
        
        return ($tech_delete && $user_delete);
    }

    function getAllAdmins($connectionObject) {
        $sql = "SELECT * FROM admin";
        return $connectionObject->query($sql);
    }

    function updateAdmin($connectionObject, $admin_id, $name, $access, $number, $bio, $presentaddress, $permanentaddress,$uid) {
        $sql = "UPDATE admin SET 
                name = '$name', 
                access = '$access', 
                number = '$number', 
                bio = '$bio',
                presentaddress = '$presentaddress',  
                permanentaddress = '$permanentaddress'
                WHERE admin_id = $admin_id";
        $admin_update = $connectionObject->query($sql);
        $user_sql = "UPDATE user SET 
                subtype = '$access'
                WHERE user_id = $uid";
        $user_update = $connectionObject->query($user_sql);
        
        return ($admin_update && $user_update);
    }

    function deleteAdmin($connectionObject, $admin_id, $uid) {
        $user_sql = "DELETE FROM user WHERE user_id = $uid";
        $user_delete = $connectionObject->query($user_sql);
        $sql = "DELETE FROM admin WHERE admin_id = $admin_id";
        $admin_delete = $connectionObject->query($sql);
        return ($admin_delete && $user_delete);
    }

    public function getAllCustomers($conn) {
        $sql = "SELECT * FROM customer ORDER BY customer_id";
        return $conn->query($sql);
    }

    public function updateCustomer($conn, $customer_id, $name, $email, $password, $address, $phone) {
        $sql = "UPDATE customer 
                SET name='$name', 
                    email='$email', 
                    password='$password', 
                    address='$address', 
                    phone='$phone' 
                WHERE customer_id=$customer_id";
        $customer_update = $conn->query($sql);
        
        $user_sql = "UPDATE user SET password = '$password' WHERE email = '$email'";
        $user_update = $conn->query($user_sql);
        
        return ($customer_update && $user_update);
    }

    public function deleteCustomer($conn, $customer_id,$uid) {
        $user_sql = "DELETE FROM user WHERE user_id = $uid";
        $user_delete = $conn->query($user_sql);
        $sql = "DELETE FROM customer WHERE customer_id = $customer_id";
        $customer_delete = $conn->query($sql);
        
        return ($customer_delete && $user_delete);
    }

    public function getProducts($conn) {
        $sql = "SELECT * FROM product ORDER BY pid";
        $result = $conn->query($sql);
        return $result;
    }

    public function addProduct($conn, $type, $brand, $quantity, $price, $about, $photo, $added_by) {
        $sql = "INSERT INTO product (type, brand, quantity, price, about, photo, added_by, status) 
                VALUES ('$type', '$brand', $quantity, $price, '$about', '$photo', $added_by, 1)";
        $result = $conn->query($sql);
        return $result;
    }

    public function updateProduct($conn, $pid, $type, $brand, $quantity, $price, $about, $photo, $status) {
        $sql = "UPDATE product SET 
                type = '$type',
                brand = '$brand',
                quantity = $quantity,
                price = $price,
                about = '$about',
                photo = '$photo',
                status = $status
                WHERE pid = $pid";
        return $conn->query($sql);
    }

    public function deleteProduct($conn, $pid) {
        $sql = "DELETE FROM product WHERE pid = $pid";
        return $conn->query($sql);
    }

    public function getAllEmployees($conn) {
        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);
        return $result;
    }

    public function updateEmployee($conn, $emp_id, $f_name, $l_name, $phone, $email, $dob, $pre_add, $per_add, $gender, $marital_status, $employment, $uid) {
        $sql = "UPDATE employee SET 
                f_name = '$f_name',
                l_name = '$l_name',
                phone = '$phone',
                email = '$email',
                dob = '$dob',
                pre_add = '$pre_add',
                per_add = '$per_add',
                gender = '$gender',
                marital_status = '$marital_status',
                employment = '$employment'
                WHERE emp_id = $emp_id";
        
        $emp_update = $conn->query($sql);
        
        $user_sql = "UPDATE user SET subtype = '$employment' WHERE user_id = '$uid'";
        $user_update = $conn->query($user_sql);
        return ($emp_update && $user_update);
    }

    public function deleteEmployee($conn, $emp_id, $uid) {
        $user_sql = "DELETE FROM user WHERE user_id = $uid";
        $user_delete = $conn->query($user_sql);
        $sql = "DELETE FROM employee WHERE emp_id = $emp_id";
        $emp_delete = $conn->query($sql);
        return ($emp_delete && $user_delete);
    }

    public function getAllMessages($connectionObject, $filter){

        $sql = "SELECT * from messages where '$filter'= sentby ";
        return $connectionObject->query($sql);
        }

    // Customer Overview Functions
    function getTotalCustomers($conn) {
        $sql = "SELECT COUNT(*) as total FROM customer";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

    function getActiveSubscriptions($conn) {
        /*$sql = "SELECT COUNT(*) as total FROM customer WHERE status = 'active'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    function getCustomerSatisfactionRating($conn) {
        /*$sql = "SELECT AVG(rating) as avg_rating FROM review WHERE review_type = 'customer'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_rating'] ?? 0, 1);*/
    }

    // Employee Performance Functions
    function getTotalEmployees($conn) {
        $sql = "SELECT COUNT(*) as total FROM employee";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

    function getAverageEmployeePerformance($conn) {
        /*$sql = "SELECT AVG(performance_rating) as avg_performance FROM employee";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_performance'] ?? 0, 1)     ;  */
    }

    function getTopPerformersCount($conn) {
        /*$sql = "SELECT COUNT(*) as total FROM employee WHERE performance_rating >= 8";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    // Technician Performance Functions
    function getTotalTechnicians($conn) {
        $sql = "SELECT COUNT(*) as total FROM technician";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

    function getTechnicianAverageRating($conn) {
        /*$sql = "SELECT AVG(rating) as avg_rating FROM review WHERE review_type = 'technician'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_rating'] ?? 0, 1);*/
    }

    function getTotalCompletedJobs($conn) {
       /* $sql = "SELECT COUNT(*) as total FROM orders WHERE status = 'completed' AND service_type = 'repair'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    // Overall Revenue Functions
    function getTotalRevenue($conn) {
        /*$sql = "SELECT SUM(amount) as total FROM payment";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['total'] ?? 0, 2);*/
    }

    function getMonthlyGrowthRate($conn) {
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

    function getAverageOrderValue($conn) {
       /* $sql = "SELECT AVG(amount) as avg_amount FROM payment";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_amount'] ?? 0, 2);*/
    }

    // Product Performance Functions
    function getTotalProducts($conn) {
        $sql = "SELECT COUNT(*) as total FROM product";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];
    }

    function getTopSellingProductCount($conn) {
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

    function getLowStockProductCount($conn) {
       /*$sql = "SELECT COUNT(*) as total FROM product WHERE stock < 10";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    // Ratings & Reviews Functions
    function getTotalReviews($conn) {
        /*$sql = "SELECT COUNT(*) as total FROM review";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }

    function getAverageProductRating($conn) {
        /*$sql = "SELECT AVG(rating) as avg_rating FROM review WHERE review_type = 'product'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return number_format($data['avg_rating'] ?? 0, 1);*/
    }

    function getRecentReviewsCount($conn) {
        /*$sql = "SELECT COUNT(*) as total FROM review 
                WHERE review_date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'];*/
    }
}
