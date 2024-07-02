<?php

// Connect to MySQL database
$conn = new mysqli("localhost", "root", "UPcs2024", "databaza");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch file data from the database based on file name
$abstract_file_name = "Syprina e siperfaqes se trupit rrotullues.jpg"; // Replace with your file name

$sql = "SELECT abstract_file_data, abstract_file_type FROM registration_form WHERE abstract_file_name = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $abstract_file_name);
$stmt->execute();
$stmt->store_result();

// Check if record exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($abstract_file_data, $abstract_file_type);
    $stmt->fetch();

    // Set appropriate headers for file download or display
    header("Content-type: $abstract_file_type");
    header("Content-Disposition: attachment; filename=\"$abstract_file_name\"");
    
    // Output the file data
    echo $abstract_file_data;
} else {
    echo "File not found.";
}

// Close statement and connection
$stmt->close();
$conn->close();


