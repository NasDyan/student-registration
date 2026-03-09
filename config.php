<?php
// Database configuration for WampServer
$host = 'localhost';
$dbname = 'student_registration';
$username = 'root';      // Default WampServer username
$password = '';          // Default WampServer password (empty)

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set default fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Silent success - no echo needed
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>