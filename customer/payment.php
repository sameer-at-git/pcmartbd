<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Payment Method</title>
    <link rel="stylesheet" href="paymentstyle.css">
</head>
<body>
    <div class="payment-container">
        <h3>Select Payment Method</h3>
        <p>Total Amount: <strong><?php echo number_format($amount, 2); ?> BDT</strong></p>
        <form action="process_payment.php" method="POST">
            <input type="hidden" name="type" value="<?php echo htmlspecialchars($type); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="hidden" name="amount" value="<?php echo htmlspecialchars($amount); ?>">
            
            <h4>Mobile Banking</h4>
            <label>
                <input type="radio" name="method" value="bKash" required>
                <img src="payment_methods/bkash_logo.png" alt="bKash" class="payment-logo"> bKash
            </label>
            <label>
                <input type="radio" name="method" value="Nagad">
                <img src="payment_methods/nagad_logo.jpg" alt="Nagad" class="payment-logo"> Nagad
            </label>
            <label>
                <input type="radio" name="method" value="Rocket">
                <img src="payment_methods/rocket_logo.png" alt="Rocket" class="payment-logo"> Rocket
            </label>
            
            <h4>Bank Transfer</h4>
            <label>
                <input type="radio" name="method" value="DBBL">
                <img src="payment_methods/dutchbanglabank.jpg" alt="Dutch-Bangla Bank" class="payment-logo"> Dutch-Bangla Bank
            </label>
            <label>
</edit>
                <input type="radio" name="method" value="EBL">
                <img src="payment_methods/easternbank.jpg" alt="Eastern Bank Limited" class="payment-logo"> Eastern Bank Limited
                
            </label>
            <label>
                <input type="radio" name="method" value="PrimeBank">
                <img src="payment_methods/primebank_logo.png" alt="Prime Bank" class="payment-logo"> Prime Bank
            </label>
            
            <h4>Cards & Others</h4>
            <label>
                <input type="radio" name="method" value="Card">
                <img src="payment_methods/creditcard_logo.jpg" alt="Credit/Debit Card" class="payment-logo"> Credit/Debit Card
            </label>
            <label>
                <input type="radio" name="method" value="Nexus">
                <img src="payment_methods/nexuspay_logo.png" alt="Nexus Pay" class="payment-logo"> Nexus Pay

            </label>
            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
