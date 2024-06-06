<?php
include "config.php";

$id = null;
$FirstName = "";
$LastName = "";
$Email = "";
$PhoneNumber = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM client WHERE StudentID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $FirstName = $row["FirstName"];
        $LastName = $row["LastName"];
        $Email = $row["Email"];
        $PhoneNumber = $row["PhoneNumber"];
    } else {
        echo "Record not found";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id = $_POST["id"];
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Email = $_POST["Email"];
    $PhoneNumber = $_POST["PhoneNumber"];

    $sql = "UPDATE client SET FirstName=?, LastName=?, Email=?, PhoneNumber=? WHERE StudentID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $FirstName, $LastName, $Email, $PhoneNumber, $id);
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>
<body>
    <h2>Edit Record</h2>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="FirstName">First Name:</label>
        <input type="text" id="FirstName" name="FirstName" value="<?php echo $FirstName; ?>" required><br>
        <label for="LastName">Last Name:</label>
        <input type="text" id="LastName" name="LastName" value="<?php echo $LastName; ?>" required><br>
        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" value="<?php echo $Email; ?>" required><br>
        <label for="PhoneNumber">Phone Number:</label>
        <input type="text" id="PhoneNumber" name="PhoneNumber" value="<?php echo $PhoneNumber; ?>" required><br>
         <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
