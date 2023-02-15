<?php
$servername = "127.0.0.1:3308";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "myDB");

// json file name
$filename1 = "/../data/stores.json";
$filename2 = "/../data/products.json";
$filename3 = "/../data/stores.json";

// Read the JSON file in PHP
$json1 = file_get_contents(__DIR__ . '/../data/stores.json');
$json2 = file_get_contents(__DIR__ . '/../data/products.json');
$json3 = file_get_contents(__DIR__ . '/../data/storeProducts.json');

// Decode the JSON
try {

    $data1 = json_decode($json1, true);
    foreach($data1["stores"] as $row) {
        $id = $row["id"];
        $name = '"'.$row["name"].'"';
        $query1 .= " INSERT IGNORE INTO Stores  (
            id,
            name
        )
        VALUES (
            ".$id.",
            ".$name."
        );
        ";
    }
    $data2 = json_decode($json2, true);
    foreach($data2["products"] as $row) {
        $id = $row["id"];
        $name = '"'.$row["name"].'"';
        $price = $row["price"];
        $toppings = '"'.$row["toppings"].'"';
        $query2 .= " INSERT IGNORE INTO Products (
            id,
            name,
            price,
            toppings
        )
        VALUES (
            ".$id.",
            ".$name.",
            ".$price.",
            ".$toppings."
        );
        ";
    }
    $data3 = json_decode($json3, true);
    foreach($data3["shopProducts"] as $row) {
        $id = $row["id"];
        $shop = $row["shop"];
        $product = $row["product"];
        $query3 .= " INSERT IGNORE INTO StoreProducts (
            id,
            shop,
            product
        )
        VALUES (
            ".$id.",
            ".$shop.",
            ".$product."
        );
        ";
    }
    mysqli_multi_query($conn, $query1 . $query2 . $query3);
}
catch (Exception $e) {

}

$conn->close();
