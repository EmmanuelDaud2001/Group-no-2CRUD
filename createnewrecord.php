<?php include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Email = $_POST["Email"];
    $PhoneNumber = $_POST["PhoneNumber"];

    $sql = "INSERT INTO client (FirstName, LastName, Email, PhoneNumber) VALUES ('$FirstName', '$LastName', '$Email', '$PhoneNumber')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
