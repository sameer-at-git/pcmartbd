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
