<?php

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $title = $_POST["title"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone_number = $_POST["phone-number"];
    $university = $_POST["university"];
    $department = $_POST["department"];
    $topic = $_POST["topic"];
    $presentation_type = $_POST["presentation-type"];
    $abstract_title = $_POST["abstract-title"];
    $accommodation_type = $_POST["accommodation-type"];
    $room_type = $_POST["room-type"];
    $accompanying_persons = isset($_POST['accompanying-persons']) ? $_POST['accompanying-persons'] : 'No';
    $hotel_check_in = isset($_POST['hotel-check-in']) ? $_POST['hotel-check-in'] : '';
    $hotel_check_out = isset($_POST['hotel-check-out']) ? $_POST['hotel-check-out'] : '';

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Email content
    $to = "$email"; // Recipient's email address
    $subject = "New Registration";
    $message = "Title: $title\n";
    $message .= "Name: $name\n";
    $message .= "Surname: $surname\n";
    $message .= "Email: $email\n";
    $message .= "Phone Number: $phone_number\n";
    $message .= "University: $university\n";
    $message .= "Department: $department\n";
    $message .= "Topic: $topic\n";
    $message .= "Presentation Type: $presentation_type\n";
    $message .= "Abstract Title: $abstract_title\n";
    $message .= "Accommodation Type: $accommodation_type\n";
    $message .= "Room Type: $room_type\n";
    $message .= "Accompanying Persons: $accompanying_persons\n";
    $message .= "Hotel Check In Date: $hotel_check_in\n";
    $message .= "Hotel Check Out Date: $hotel_check_out\n";

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'phpmailer.130@gmail.com'; // Your Gmail email address
        $mail->Password = 'zwnk ykky ijba kqkf'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom('phpmailer.130@gmail.com', 'Your Name'); // Change this to your name
        $mail->addAddress($to);

        // Email content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();
        echo "Email has been sent successfully.";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // File upload handling
    $abstract_file_name = $_FILES["abstract-file"]["name"];
    $abstract_file_temp = $_FILES["abstract-file"]["tmp_name"];
    $abstract_file_type = $_FILES["abstract-file"]["type"];
    $abstract_file_data = null;

    // Check if file was uploaded
    if (isset($abstract_file_name) && !empty($abstract_file_name)) {
        // Read the file content
        $abstract_file_data = file_get_contents($abstract_file_temp);
    } else {
        // Handle case when no file was uploaded
        $abstract_file_name = null;
        $abstract_file_type = null;
    }

    // Connect to MySQL database
    $conn = new mysqli("localhost", "id22229389_root", "UPcs2024.", "id22229389_databaza");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO registration_form (
        title, name, surname, email, password, phone_number, university, department, topic, presentation_type, abstract_title, accommodation_type, room_type, accompanying_persons, hotel_check_in, hotel_check_out, abstract_file_name, abstract_file_data, abstract_file_type
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    $stmt = $conn->prepare($sql);

    // Adjust binding parameters based on file upload status
    if ($abstract_file_data !== null) {
        $stmt->bind_param(
            "sssssssssssssssssbs", 
            $title, $name, $surname, $email, $hashed_password, $phone_number, $university, $department, $topic, $presentation_type, $abstract_title, $accommodation_type, $room_type, $accompanying_persons, $hotel_check_in, $hotel_check_out, $abstract_file_name, $abstract_file_data, $abstract_file_type
        );
    } else {
        $stmt->bind_param(
            "ssssssssssssssssss", 
            $title, $name, $surname, $email, $hashed_password, $phone_number, $university, $department, $topic, $presentation_type, $abstract_title, $accommodation_type, $room_type, $accompanying_persons, $hotel_check_in, $hotel_check_out, $abstract_file_name, $abstract_file_type
        );
    }

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Form submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
