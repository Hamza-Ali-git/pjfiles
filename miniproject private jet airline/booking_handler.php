<?php
// Database connection details
$servername = "localhost";
$username = "root";         
$password = "";             
$dbname = "elite_wings_airline"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$full_company_name = $_POST['name'];
$email_address = $_POST['email'];
$jet_type = $_POST['jet_type'];
$departure_city = $_POST['departure'];
$destination_city = $_POST['destination'];
$departure_date = $_POST['departure_date'];
$return_date = isset($_POST['return_date']) ? $_POST['return_date'] : null; // Can be null if not filled

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bookings (full_company_name, email_address, jet_type, departure_city, destination_city, departure_date, return_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $full_company_name, $email_address, $jet_type, $departure_city, $destination_city, $departure_date, $return_date);

// Execute the query
if ($stmt->execute()) {
    echo "<h1>Booking Successful!</h1>";
    echo "<p>Thank you for booking with Elite Wings. Your booking details have been submitted.</p>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
