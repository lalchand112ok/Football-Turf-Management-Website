<!--Create a dashboard.php that will serve as the homepage after login.-->
<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Turf Management</title>
</head>
<body>
    <h2>Welcome to your dashboard, <?php echo $_SESSION['user']; ?>!</h2>
    <p>This is the dashboard after successful login.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
