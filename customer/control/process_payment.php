<?php
include 'db.php';
session_start();

$db = new myDB2();
$connectionObject = $db->openCon();

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0.00;
$method = isset($_POST['method']) ? $_POST['method'] : '';

if ($id === 0 || $amount <= 0 || empty($method) || !isset($_SESSION['customer_id'])) {
    die("Invalid payment request.");
}

$customerId = $_SESSION['customer_id'];

if (isset($_POST['is_hardware']) && $_POST['is_hardware'] == 1) {
    $db->updateOrderStatus($id, 'Paid', $connectionObject);
} else {
    $db->updateAppointmentPaymentStatus($id, 'Paid', $connectionObject);

    $appointmentDetails = $db->getAppointmentDetails($id, $connectionObject);
    if ($appointmentDetails) {
        $technicianId = $appointmentDetails['technician_id'];
        $serviceFee = $appointmentDetails['service_fee'];
        $technicianShare = $serviceFee * 0.8;

        $db->updateTechnicianWallet($technicianId, $technicianShare, $connectionObject);
    }
}

$db->insertPayment($customerId, isset($_POST['is_hardware']) && $_POST['is_hardware'] == 1 ? $id : null, 
    !isset($_POST['is_hardware']) || $_POST['is_hardware'] != 1 ? $id : null, $method, $amount, 'Success', $connectionObject);

echo "<p>Payment Successful! Thank you for your purchase/service request.</p>";
echo "<a href='index.php'>Return to Home</a>";

$db->closeCon($connectionObject);
?>
