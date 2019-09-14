<?php
require 'init.php';
// Create connection
$conn = new mysqli($servername, $username, $db_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  /* change character set to utf8 */
  if (!$conn->set_charset("utf8")) {
      printf("Error loading character set utf8: %s\n", $conn->error);
  }
  
  
$conn_msg = "Connected successfully";