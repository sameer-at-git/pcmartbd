<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback - PCMartBD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../css/mainstyle.css">
</head>
<body>
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
                    <img src="../../images/icons/arrow-left-solid.svg" alt="Back" class="icon">
                    Back
                </button>
                <h2>Customer Feedback</h2>
            </div>

            <div class="feedback-container">
                <!-- Feedback Statistics -->
                <div class="feedback-stats">
                    <div class="stat-card">
                        <div class="stat-value">4.5</div>
                        <div class="stat-label">Average Rating</div>
                        <div class="star-display">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">127</div>
                        <div class="stat-label">Total Reviews</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">98%</div>
                        <div class="stat-label">Satisfaction Rate</div>
                    </div>
                </div>

                <!-- Feedback Table -->
                <div class="table-container">
                    <div class="table-filters">
                        <div class="filter-group">
                            <label for="dateFilter">Filter by Date:</label>
                            <select id="dateFilter">
                                <option value="all">All Time</option>
                                <option value="last7">Last 7 Days</option>
                                <option value="last30">Last 30 Days</option>
                                <option value="last90">Last 90 Days</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="ratingFilter">Filter by Rating:</label>
                            <select id="ratingFilter">
                                <option value="all">All Ratings</option>
                                <option value="5">5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                    </div>

                    <table class="feedback-table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Service Date</th>
                                <th>Service Type</th>
                                <th>Rating</th>
                                <th>Feedback</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example rows - Replace with actual data from database -->
                            <tr>
                                <td>David Wilson</td>
                                <td>2024-03-15</td>
                                <td>Laptop Repair</td>
                                <td>
                                    <div class="rating-display">
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span>(5.0)</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="feedback-text">
                                        Excellent service! Fixed my laptop quickly and professionally.
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge positive">Positive</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Emily Brown</td>
                                <td>2024-03-14</td>
                                <td>PC Setup</td>
                                <td>
                                    <div class="rating-display">
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <span>(4.0)</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="feedback-text">
                                        Great work setting up my new PC. Very knowledgeable technician.
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge positive">Positive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="page-btn" disabled>&lt; Previous</button>
                    <div class="page-numbers">
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <span>...</span>
                        <button class="page-btn">10</button>
                    </div>
                    <button class="page-btn">Next &gt;</button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>

    <script>
        // Filter functionality
        document.getElementById('dateFilter').addEventListener('change', function() {
            // Implement date filtering logic
        });

        document.getElementById('ratingFilter').addEventListener('change', function() {
            // Implement rating filtering logic
        });

        // Pagination functionality
        document.querySelectorAll('.page-btn').forEach(button => {
            button.addEventListener('click', function() {
                if (!this.disabled && !this.classList.contains('active')) {
                    // Implement pagination logic
                }
            });
        });
    </script>
</body>
</html>
