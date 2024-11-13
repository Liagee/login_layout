<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define connection parameters
$sname = "localhost"; // MySQL server name (usually 'localhost')
$uname = "u888950461_admin"; // MySQL username
$password = "Gumbatova1998"; // MySQL password
$db_name = "u888950461_Lachin"; // Database name

// Establish connection to MySQL database
$conn = mysqli_connect($sname, $uname, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error()); // Output error if connection fails
}

// Optional: Display success message if connected
echo "Connected successfully to the database.<br>";

// Example query to retrieve data from the 'users' table
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "User: " . $row["USER"] . " - Password: " . $row["PASSWORD"] . "<br>";
        }
    } else {
        echo "No results found.<br>";
    }
} else {
    echo "SQL Error: " . mysqli_error($conn); // Output SQL error if query fails
}

// Close the connection
mysqli_close($conn);
?>
