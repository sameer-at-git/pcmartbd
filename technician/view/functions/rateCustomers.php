<?php
require '../../control/rateCustomerControl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Customers - PCMartBD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../css/mainstyle.css">
</head>

<body class="table-pages">
    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="../layout/home.php" class="website-name">PCMartBD</a>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="../layout/home.php">Home</a></li>
            <li><a href="../layout/dashboard.php">Dashboard</a></li>
            <li><a href="../layout/settings.php">Settings</a></li>
            <li><a href="../layout/profile.php">Profile</a></li>
            <li><a href="../../../layout/view/login.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <div class="page-header">
                <button onclick="window.history.back()" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </button>
                <h2>Rate Customers</h2>
            </div>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert success">Rating submitted successfully!</div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert error">Error submitting rating. Please try again.</div>
            <?php endif; ?>
            <div class="table">
                <?php if (!empty($customers)): // Check if the customers array is not empty 
                ?>
                    <form action="../../control/rateCustomerControl.php" method="POST">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Appointment Status</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($customers as $row): // Loop through the array of customers 
                                ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                        <td><?php echo htmlspecialchars($row['appointment_status']); ?></td>
                                        <td>
                                            <!-- Use appointment_id as the unique key -->
                                            <select name="rating[<?php echo $row['appointment_id']; ?>]">
                                                <option value="" disabled>Select</option>
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <option value="<?php echo $i; ?>" <?php echo ($row['technician_rating'] == $i) ? 'selected' : ''; ?>>
                                                        <?php echo $i; ?>
                                                    </option>
                                                <?php endfor; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <textarea name="comment[<?php echo $row['appointment_id']; ?>]" rows="2" cols="20"><?php echo htmlspecialchars($row['technician_comment']); ?></textarea>
                                        </td>
                                        <td>
                                            <button type="submit" name="submit_rating" value="<?php echo $row['appointment_id']; ?>">Submit</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                <?php else: ?>
                    <p>No customers found for your appointments.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>