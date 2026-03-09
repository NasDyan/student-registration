<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Registration Form</h1>
        
        <?php
        // Display success message if redirected from registration
        if(isset($_GET['success']) && $_GET['success'] == 1) {
            echo '<div class="alert success">Registration successful!</div>';
        }
        ?>
        
        <form id="registrationForm" action="register.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>
                <small class="error" id="nameError"></small>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <small class="error" id="emailError"></small>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone">
                <small class="error" id="phoneError"></small>
            </div>
            
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob">
            </div>
            
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3"></textarea>
            </div>
            
            <div class="form-group">
                <label for="course">Course:</label>
                <select id="course" name="course">
                    <option value="">Select a course</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Software Engineering">Software Engineering</option>
                    <option value="Data Science">Data Science</option>
                </select>
            </div>
            
            <button type="submit" class="btn">Register</button>
            <a href="students.php" class="btn btn-secondary">View All Students</a>
        </form>
    </div>
    
    <script src="script.js"></script>
</body>
</html>