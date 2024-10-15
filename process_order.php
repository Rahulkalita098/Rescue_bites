<?php

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['food_items']) && !empty($_POST['food_items'])) {
        $food_items = $_POST['food_items'];

        $sql = "INSERT INTO food_orders (food_item) VALUES (?)";

        // Prepare statement once
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Loop through food items and bind each one
            foreach ($food_items as $item) {
                $stmt->bind_param("s", $item);
                $stmt->execute();
            }

            // Redirect after successful execution
            header("Location: ../Order.html");
            exit();
        } else {
            echo "Failed to prepare the statement.";
        }
    } else {
        echo "No food items selected.";
    }

    // Close statement only if it was created
    if (isset($stmt)) {
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
