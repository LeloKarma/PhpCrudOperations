<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];

$data = $fname . ' ' . $lname . "\n";

$file = fopen("SWE3.txt", "a");
fwrite($file, $data);
fclose($file);

echo "Form data submitted successfully.";
?>