<?php
if(isset($_POST['content'])) {
  $UpdatedContent =$_POST['content'];
  file_put_contents("SWE3.txt", $UpdatedContent);
  echo "Updated content successfully.";
}
?>