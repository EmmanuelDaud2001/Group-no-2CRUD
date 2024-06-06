<?php include "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        
        form {
            color: black;
            max-width: auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color:green;
            color:black;
        }
        th, td {
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: aqua;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn-primary-sm {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
            padding: 4px 8px;
            font-size: 12px;
        }
        .btn-delete {
            background-color:red;
            color: #fff;
            border-color: #dc3545;
            padding: 4px 8px;
            font-size: 12px;
        }
        @media (max-width: 768px) {
            table {
                width: 100%;
            }
            table, th, td {
                display: block;
            }
            th, td {
                text-align: left;
            }
        }
        .container{
            
    display: inline;
    display: flex;
    align-items: center;
    margin-right: 10px;}
    </style>
</head>
<body>    
<div class="container">
    <div class="container">
        <form action="createnewrecord.php" method="post">
            <div class="container">
                <label for="FirstName">First Name:</label>
                <input type="text" id="FirstName" name="FirstName" required><br><br>
            </div>
            <div class="container">
                <label for="LastName">Last Name:</label>
                <input type="text" id="LastName" name="LastName" required>
            </div>
            <div class="container">
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email" required><br><br>
            </div>
            <div class="container">
                <label for="PhoneNumber">Phone Number:</label>
                <input type="text" id="PhoneNumber" name="PhoneNumber" required><br><br>
            </div>
            <button type="submit">Add Record</button>
        </form>
    </div>
</div>
        
<!-- Display Existing Records -->
<h2 style="text-align: center;">Records in My DataBase</h2>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>StudentID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM client";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["StudentID"] . "</td>";
                echo "<td>" . $row["FirstName"] . "</td>";
                echo "<td>" . $row["LastName"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["PhoneNumber"] . "</td>";
                echo "<td><a class='btn btn-primary-sm' href='edit.php?id=" . $row["StudentID"] . "'>Edit</a> | <a class='btn btn-delete' href='delete.php?id=" . $row["StudentID"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
