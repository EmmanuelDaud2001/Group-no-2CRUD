<?php
// Include config file
include "config.php";

// Check if ID parameter is set and is a number
if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
    // Prepare a DELETE statement
    $id = $_GET["id"];
    $sql = "DELETE FROM client WHERE StudentID = ?";

    if($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $id);

        // Attempt to execute the statement
        if($stmt->execute()) {
            // Records deleted successfully. Redirect to main page
            header("location: index.php");
            exit();
        } else {
            echo "Error executing delete operation: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing delete statement: " . $conn->error;
    }
} else {
    // ID parameter is missing or not a number. Redirect to main page
    header("location: index.php");
    exit();
}

// Close connection
$conn->close();
?>
