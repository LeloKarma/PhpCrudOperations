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

// Delete person record if delete button is clicked
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM persons WHERE id = '$delete_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";

        // Redirect to the same page without the success message
        header("Location: results.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Retrieve persons' information from the database
$sql = "SELECT * FROM persons";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>

<h1>Results</h1>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                <a href="results.php?delete_id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="index.php">ADD</a>
<a href="content.php">FILE</a>
</body>
</html>

