<?php
// Start the session
session_start();

include 'config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch pricing data from database
$query = "SELECT * FROM pricing";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turf Pricing - Turf Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="pricing-container">
        <h2>Turf Pricing</h2>
        <table class="pricing-table">
            <thead>
                <tr>
                    <th>Time Slot</th>
                    <th>Price</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['time_slot'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['duration'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No pricing information available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
