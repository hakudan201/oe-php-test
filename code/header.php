<?php
// Create connection
$conn = new mysqli("127.0.0.1:3308", "root", "", "myDB");

$sql = "SELECT name FROM Stores WHERE id = " . $_SESSION['storeID'];
$result = $conn->query($sql);
$name = $result->fetch_assoc();
echo "<header class='grid-item' id='pageHeader'>$name[name] Menu</header>";
?>
