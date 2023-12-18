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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    // Update the person's information in the database
    $sql = "UPDATE persons SET fname = '$fname', lname = '$lname' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
        header('location: results.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve the person's information based on the ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM persons WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Person</title>
</head>
<body>

<h1>Update Person</h1>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>First Name:</label>
    <input type="text" name="fname" value="<?php echo $row['fname']; ?>"><br><br>
    <label>Last Name:</label>
    <input type="text" name="lname" value="<?php echo $row['lname']; ?>"><br><br>
    <input type="submit" value="Update">
</form>

</body>
</html>