<?php

// Connect to the database
// change below arguments of mysqli function as per requirement
$db = new mysqli('localhost', 'root', '', 'real_estate_form');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Validate form data (customize as needed)
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo "Form data incomplete. Please fill in all fields.";
} else {
    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($db->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

$db->close();
?>
