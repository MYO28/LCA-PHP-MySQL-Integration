<?php

require_once 'config/db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $department = trim($_POST['department']);
    $email      = trim($_POST['email']);

    if (!empty($first_name) && !empty($last_name) && !empty($department) && !empty($email)) {
    
        $stmt =$conn->prepare("UPDATE staff SET first_name = ?, last_name = ?, department = ?, email = ? WHERE id = ?");
      
        $stmt->bind_param("ssssi", $first_name, $last_name,$department, $email,$id);
      
        if ($stmt->execute()) {$stmt->close();
            header('Location: index.php');
            exit;
        }
    }
}
$stmt =$conn->prepare("SELECT * FROM staff WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();$result = $stmt->get_result();$staff  = $result->fetch_assoc();$stmt->close();
if (!$staff) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Staff - AfriStaff</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Staff Member</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($staff['first_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($staff['last_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" id="department" name="department" value="<?php echo htmlspecialchars($staff['department']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($staff['email']); ?>" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Staff</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</htm