<?php
include("connection.php");



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



</body>
</html>

<?php
// Close the database connection
$conn->close();
?>