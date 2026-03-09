<?php
// Start session for messages
session_start();

// Include database connection
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get and sanitize form data
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $dob = $_POST['dob'];
    $address = htmlspecialchars(trim($_POST['address']));
    $course = $_POST['course'];
    
    // Server-side validation
    $errors = [];
    
    if (strlen($full_name) < 3) {
        $errors[] = "Name must be at least 3 characters";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    // If no errors, insert into database
    if (empty($errors)) {
        try {
            // Prepare SQL statement
            $sql = "INSERT INTO students (full_name, email, phone, date_of_birth, address, course) 
                    VALUES (:full_name, :email, :phone, :dob, :address, :course)";
            
            $stmt = $pdo->prepare($sql);
            
            // Execute with parameters
            $stmt->execute([
                ':full_name' => $full_name,
                ':email' => $email,
                ':phone' => $phone,
                ':dob' => $dob,
                ':address' => $address,
                ':course' => $course
            ]);
            
            // Redirect to index with success message
            header('Location: index.php?success=1');
            exit();
            
        } catch (PDOException $e) {
            // Check if email already exists
            if ($e->errorInfo[1] == 1062) {
                $errors[] = "Email already registered";
            } else {
                $errors[] = "Database error: " . $e->getMessage();
            }
        }
    }
    
    // If there are errors, display them
    if (!empty($errors)) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Registration Error</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="container">
                <h1>Registration Error</h1>
                <div class="alert" style="background: #fed7d7; color: #c53030;">
                    <?php foreach($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
                <a href="index.php" class="btn">Go Back</a>
            </div>
        </body>
        </html>
        <?php
    }
}
?>