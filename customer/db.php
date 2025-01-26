<?php
class myDB2
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

    function insertPayment($customer_id, $order_id, $appointment_id, $method, $amount, $status, $connectionObject)
    {
        $sql = "INSERT INTO payments (customer_id, order_id, appointment_id, method, amount, status, payment_date) 
                VALUES ('$customer_id', '$order_id', '$appointment_id', '$method', '$amount', '$status', NOW())";
        return $connectionObject->query($sql);
    }

    function updateOrderStatus($order_id, $status, $connectionObject)
    {
        $sql = "UPDATE orders SET status = '$status' WHERE order_id = '$order_id'";
        return $connectionObject->query($sql);
    }

    function updateAppointmentPaymentStatus($appointment_id, $status, $connectionObject)
    {
        $sql = "UPDATE appointments SET payment_status = '$status' WHERE appointment_id = '$appointment_id'";
        return $connectionObject->query($sql);
    }

    function getAppointmentDetails($appointment_id, $connectionObject)
    {
        $sql = "SELECT technician_id, service_fee FROM appointments WHERE appointment_id = '$appointment_id'";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }

    function updateTechnicianWallet($technician_id, $amount, $connectionObject)
    {
        $sql = "UPDATE technician_wallet SET balance = balance + '$amount' WHERE technician_id = '$technician_id'";
        return $connectionObject->query($sql);
    }

    function closeCon($connectionObject)
    {
        $connectionObject->close();
    }
}
