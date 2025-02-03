<?php
class myDB2
{
    function openCon() {
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
    function insertAppointment($customer_id,$date,$type,$details,$Conobj){
        $sql="INSERT INTO appointment (customer_id,appointment_date,type,details,status) VALUES ($customer_id,'$date','$type','$details','Pending')";
        $result = $Conobj->query($sql);
        return $result;
    }
    function insertPayment($customer_id,$name,$email,$cardType,$Conobj){
        $sql="INSERT INTO payment (customer_id,name,email,card_type) VALUES ($customer_id,'$name','$email','$cardType')";
        $result = $Conobj->query($sql);
        return $result;
    }
    function profileUpdateInfo($con,$name,$email,$phone,$address,$password,$customer_id,$userId){
        $update_query = "UPDATE customer SET name='$name', email='$email', phone='$phone', address='$address', password='$password' WHERE customer_id=$customer_id";
        $update_query1 = "UPDATE user SET password='$password' WHERE user_id=$userId";
        $result1 = $con->query($update_query);
        $result2 = $con->query($update_query1);
        if($result1 && $result2) return true;
        else return false;
    }
    function signupInfo($con,$name,$email,$phone,$address,$pass, $cus){
        $sql1 ="INSERT INTO customer (name, email, phone, address, password) VALUES ('$name','$email', '$phone', '$address', '$pass')";
        $sql2 ="INSERT INTO user (email,password,user_type) VALUES ('$email','$pass','$cus')";
         $result1=$con->query($sql1);
         $result2=$con->query($sql2);
         if($result1 && $result2) return true;
         return false;
    }
    function getCustomerInfo($con,$customer_id){
        $sql="SELECT * From customer WHERE customer_id=$customer_id";
        $result = $con->query($sql);
        return $result;
    }
    function fetch_products_with_pagination($conn, $products_per_page, $offset) {
        $query = "SELECT pid, type, brand, photo, price, about FROM product LIMIT $products_per_page OFFSET $offset";
        $result = $conn->query($query);

        $products = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }

    function closeCon($connectionObject) {
        $connectionObject->close();
    }
}

// Get products (20 per page)
function getProducts($conn) {
    $products_per_page = 20;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $products_per_page;
    $search = isset($_GET['search']) ? trim($_GET['search']) : "";

    $query = "SELECT pid, type, brand, quantity, status, photo, about, price FROM product WHERE 1=1";

    if (!empty($search)) {
        $query .= " AND (brand LIKE '%$search%' OR type LIKE '%$search%' OR about LIKE '%$search%')";
    }

    $query .= " LIMIT $products_per_page OFFSET $offset";

    $result = $conn->query($query);
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

// Get total pages for pagination
function getTotalPages($conn) {
    $products_per_page = 20;
    $search = isset($_GET['search']) ? trim($_GET['search']) : "";

    $query = "SELECT COUNT(*) AS total FROM product WHERE 1=1";
    if (!empty($search)) {
        $query .= " AND (brand LIKE '%$search%' OR type LIKE '%$search%' OR about LIKE '%$search%')";
    }

    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return ceil($row['total'] / $products_per_page);
}
?>
