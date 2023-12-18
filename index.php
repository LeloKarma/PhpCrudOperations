<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Registration Form</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>

  <h2>User Registration Form</h2>
  <form name="registrationForm" onsubmit="return validateForm()" method="post">

    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname" required><br><br>
    
    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>
    
    <input type="submit" value="Submit">

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];

  // Validate the form data
  if (!empty($fname) && !empty($lname)) {
    // Prepare the data to be written to the file
    $data = $fname . ' ' . $lname . "\n";

    // Open the file in append mode and write the data
    $file = fopen("SWE3.txt", "a");
    fwrite($file, $data);
    fclose($file);

     // Redirect to the same page without the success message
     echo "Form data submitted successfully.";
  
  } else {
    echo "Please fill in all fields.";
  }

}
?> 
  </form>
 
</body>
</html>