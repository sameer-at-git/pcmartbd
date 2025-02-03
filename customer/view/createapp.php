<?php
session_start();
if (!isset($_SESSION['customer_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}
?>
<html>
<html lang="en">
<head>
    <title>Create Appointment</title>
    <link rel="stylesheet" href="../css/createapp.css">
</head>
<body>

<div class="container">
    <h2>Create Appointment</h2>
    <form action="../control/submitAppointment.php" method="POST" onsubmit="validateAppointmentForm(event)">
        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date">
        <div class="error-message" id="dateError"></div>

        <label for="type">Appointment Type:</label>
        <select id="type" name="type">
            <option value="...">...</option>
            <option value="Monitor repairing">Monitor repairing</option>
            <option value="Keyboard and Mouse">Keyboard and Mouse</option>
            <option value="Casing and CPU">Casing and CPU</option>
            <option value="Bluetooth and Speaker">Bluetooth and Speaker</option>
            <option value="Battery Replacement">Battery Replacement</option>
            <option value="Cable Repair and  Replacement">Cable Repair and  Replacement</option>
            <option value="Others">Others</option>
        </select>
        <div class="error-message" id="typeError"></div>

        <label for="details">Details:</label>
        <textarea id="details" name="details" rows="4" placeholder="Describe your issue..."></textarea>
        <div class="error-message" id="detailsError"></div>

        <button type="submit">Submit</button>
    </form>
    <script src="../js/createapp.js"></script>
</div>

</body>
</html>
