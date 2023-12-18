<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "animal";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate the form data
    if (empty($fname) || empty($lname) || empty($password) || empty($confirmPassword)) {
        echo "Please fill in all fields.";
    } elseif ($password != $confirmPassword) {
        echo "Passwords do not match.";
    } elseif (!preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/", $password)) {
        echo "Password must be at least 8 characters long and contain special characters and numbers.";
    } else {

        // Prepare the data for database insertion
        $fname = mysqli_real_escape_string($conn, $fname);
        $lname = mysqli_real_escape_string($conn, $lname);
        $password = mysqli_real_escape_string($conn, $password);

        // Insert the data into the database
        $sql = "INSERT INTO persons (fname, lname, password) VALUES ('$fname', '$lname', '$password')";
        if ($conn->query($sql) === TRUE) {

            // Redirect to the results page
            header("Location: results.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>