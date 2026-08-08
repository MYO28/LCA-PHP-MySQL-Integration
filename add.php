<?php

require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $department = trim($_POST['department']);
    $email      = trim($_POST['email']);

    if (!empty($first_name) && !empty($last_name) && !empty($department) && !empty($email)) {

        $stmt =$conn->prepare("INSERT INTO staff (first_name, last_name, department, email) VALUES (?, ?, ?, ?)");
        
        $stmt->bind_param("ssss", $first_name,$last_name, $department,$email);
        
        if ($stmt->execute()) {$stmt->close();
            header('Location: index.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Staff - AfriStaff</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Staff Member</h2>
        <form action="add.php" method="POST">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" id="department" name="department" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Staff</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html