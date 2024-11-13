<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
    </html>
    <?php
    <?php
session_start();

if (isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
    
    <!-- Logout Button -->
    <form action="logout.php" method="POST" style="text-align: center; margin-top: 20px;">
        <button type="submit" class="logout-button">Logout</button>
    </form>
</body>
</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>

} else {
    header("Location: index.php");
    exit();
}
?>
