<?php
// Include the database connection file
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $landmark = isset($_POST['land']) ? $_POST['land'] : '';

    // SQL query to insert data into 'orders' table
    $sql = "INSERT INTO orders (name, phone, address, landmark) VALUES (?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters (s - string, i - integer, etc.)
    $stmt->bind_param("ssss", $name, $phone, $address, $landmark);

    // Execute the query
    if ($stmt->execute()) {
        // Success message (redirect to last page)
        // Redirecting to LastPage.html after successful execution
        header("Location: ../LastPage.html");
        exit();  // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
