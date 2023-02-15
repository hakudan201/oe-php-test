<nav id="mainNav">
    <p>Milk Tea Store</p>
    <?php
    // Create connection
    $conn = new mysqli("127.0.0.1:3308", "root", "", "myDB");
    $sql = "SELECT * FROM Stores";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<a href='index.php?storeID=" . $row['id'] . "'>
                    <p>$row[name]</p>
                </a>";
        }
    }
    $conn->close();
    ?>
</nav>
