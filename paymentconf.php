<?php
// Get the booking details from the URL parameters
$name = $_GET['name'];
$email = $_GET['email'];
$total = $_GET['total'];

// You can add more processing here, like saving the booking to a database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
</head>
<body>
    <h2>Thank you for booking with us, <?php echo htmlspecialchars($name); ?>!</h2>
    <p>An email confirmation has been sent to: <?php echo htmlspecialchars($email); ?></p>
    <p>Total amount to be paid: <?php echo htmlspecialchars($total); ?></p>

    <p>Your booking has been successfully submitted. We will get back to you shortly with the booking confirmation.</p>
</body>
</html>
