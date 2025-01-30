<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form id="signUpForm" action="/signup" method="POST" onsubmit="return validateForm()">
            <label for="name">Full Name</label>
            <input type="text" id="uname" name="name" placeholder="Enter your full name">
            <p id="nameerr" class="error"></p>

            <label>Gender</label>
            <div>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
            </div>
            <div>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            </div>
            <div>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label>
            </div>
            <p id="gendererr" class="error"></p>
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number">
            <p id="phoneerr" class="error"></p>

            <label for="address">Present Address</label>
            <input type="text" id="address" name="address" placeholder="Enter your address">
            <p id="addresserr" class="error"></p>

            <label for="email">Email : </label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <p id="emailerr" class="error"></p>

            <label for="password">Password</label>
            <input type="password" id="pass" name="password" placeholder="Create a password">
            <p id="passerr" class="error"></p>

            <label for="conpass">Confirm Password</label>
            <input type="password" id="conpass" name="conpassword" placeholder="Confirm your password">
            <p id="conpasserr" class="error"></p>
            
            <button type="submit">Sign Up</button>
        </form>
        <div class="note">
            Already have an account? <a href="../../layout/view/login.php">Log In</a>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
