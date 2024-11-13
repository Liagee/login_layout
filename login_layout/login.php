<?php
session_start();
require_once 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Query using your existing table structure
    $sql = "SELECT * FROM users WHERE USER = '$username' AND PASSWORD = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['user_name'] = $username;
        
        // Handle Remember Me
        if(isset($_POST['remember']) && $_POST['remember'] == 'on') {
            setcookie('remember_user', $username, time() + (30 * 24 * 60 * 60), '/'); // 30 days
        } else {
            setcookie('remember_user', '', time() - 3600, '/'); // Delete cookie
        }
        
        header("Location: home.php");
        exit();
    } else {
        header("Location: index.php?error=" . urlencode("Invalid username or password"));
        exit();
    }
}
?>