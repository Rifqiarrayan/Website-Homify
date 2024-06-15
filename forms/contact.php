<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "homify";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
/**
 * CREATE TABLE form_submissions (
 *  id INT AUTO_INCREMENT PRIMARY KEY,
 *  name VARCHAR(255) NOT NULL,
 *  email VARCHAR(255) NOT NULL,
 *  subject VARCHAR(255) NOT NULL,
 *  submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 * );
 */
  $stmt = $conn->prepare("INSERT INTO form_submissions (name, email, subject) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $subject);

  // Execute the statement
  if ($stmt->execute()) {
    echo "OK";
  } else {
    echo "NOT OK";
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();
?>
