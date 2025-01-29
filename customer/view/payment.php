<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payemrnt Form</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <div class="container">
    <form action="">
        <h1 class="main_heading">Payment Form</h1>
        <hr>
        <p>Required Fileds are followed by *</p>
        <h2>Contact Information</h2>
        <p>Name: *<input type="text" name="name" required placeholder="Enter Your Name">  </p>
        <fieldset>
            <legend>Gender * </legend>
            <p>
                <label for="101">
                <input type="radio" name="gender" id="101" required> Male
                </label>
                <label for="102">
                <input type="radio" name="gender" id="102" required> Female
                </label>
            </p>
        </fieldset>
        <p>Address: <textarea name="address" id="address" cols="100" rows="8" placeholder="Enter Your Address"></textarea></p>
        <p>Email: *<input type="email" name="email" id="email" required placeholder="abcd@gmail.com"> </p>
        <p>Pincode: *<input type="number" name="pincode" id="pincode" required placeholder="12345678"></p>
        <h2>Payment Information</h2>
        <p>Card Type: * 
            <select name="card_type" id="card_type" required>
                <option value="">--Select a Card Type--</option>
                <option value="visa">Visa</option>
                <option value="rupay">Rupay</option>
                <option value="mastercard">Master Card</option>
            </select>
        </p>
        <p>
            Card Number *<input type="number" name="card_number" id="card_number" required placeholder="12345678"> 
        </p>
        <p>
            Expiration Date: *<input type="date" name="exp_date" id="exp_date" required> 
        </p>
        <p>CVV *<input type="password" name="CVV" id="CVV" required placeholder="12345678"> </p>
        <input type="submit" value="Pay Now">
    </form>
</div>
</body>
</html>