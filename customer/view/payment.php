<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payemrnt Form</title>
    <link rel="stylesheet" href="../css/payment.css">
</head>
<body>
    <div class="container">
    <form action="../control/payment_validation.php" method="POST" onsubmit="validatePaymentForm(event)">
        <h1 class="main_heading">Payment Form</h1>
        <hr>
        <h2>Contact Information</h2>
        <p>Name: *<input type="text" id="name" name="name"    placeholder="Enter Your Name">  </p>
        <div class="error-message" id="nameError"></div>
        <p>Address: <textarea name="address" id="address" cols="100" rows="8" placeholder="Enter Your Address"></textarea></p>
        <div class="error-message" id="addressError"></div>
        <p>Email: *<input type="email" name="email" id="email"    placeholder="abcd@gmail.com"> </p>
        <div class="error-message" id="emailError"></div>
        <h2>Payment Information</h2>
        <p>Card Type: * 
            <select name="card_type" id="card_type"   >
                <option value="...">--Select a Card Type--</option>
                <option value="bkash">Bkash</option>
                <option value="nagad">Nagad</option>
                <option value="mastercard">Master Card</option>
            </select>
        </p>
        <div class="error-message" id="cardTypeError"></div>
        <input type="submit" value="Pay Now">
    </form>
    <script src="../js/payment.js"></script>
</div>
</body>
</html>