<?php
session_start();

if (!isset($_SESSION['customer_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        select, input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Appointment</h2>
    <form action="../control/submitAppointment.php" method="POST">
        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date" >

        <label for="type">Appointment Type:</label>
        <select id="type" name="type" >
            <option value="...">...</option>
            <option value="Monitor repairing">Monitor repairing</option>
            <option value="Keyboard and Mouse">Keyboard and Mouse</option>
            <option value="Casing and CPU">Casing and CPU</option>
            <option value="Bluetooth and Speaker">Bluetooth and Speaker</option>
            <option value="Battery Replacement">Battery Replacement</option>
            <option value="Cable Repair and  Replacement">Cable Repair and  Replacement</option>
            <option value="Others">Others</option>
        </select>

        <label for="details">Details:</label>
        <textarea id="details" name="details" rows="4" placeholder="Describe your issue..." ></textarea>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
