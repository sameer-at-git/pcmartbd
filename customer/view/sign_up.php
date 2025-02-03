<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
    
    <div class="container">
        <h1>Sign Up</h1>
        <form id="signUpForm" action="../control/validsign_up.php" method="POST" onsubmit="return validatesignUpForm()">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" onblur="validatesignUpForm()">
            <p id="nameError" class="error"></p>
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" onblur="validatesignUpForm()">
            <p id="phoneError" class="error"></p>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" onblur="validatesignUpForm()">
            <p id="addressError" class="error"></p>

            <label for="email">Email : </label>
            <input type="email" id="email" name="email" placeholder="Enter your email" onblur="validatesignUpForm()">
            <p id="emailError" class="error"></p>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" onblur="validatesignUpForm()">
            <p id="passwordError" class="error"></p>

            <label for="conpass">Confirm Password</label>
            <input type="password" id="conpassword" name="conpassword" placeholder="Confirm your password" onblur="validatesignUpForm()">
            <p id="conpasswordError" class="error"></p>
            
            <button type="submit">Sign Up</button>
        </form>
        <div class="note">
            Already have an account? <a href="../../layout/view/login.php">Log In</a>
        </div>
    </div>
    <script src="../js/signup.js"></script>
</body>
</html>
