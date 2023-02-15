<?php
$servername = "127.0.0.1:3308";
$username = "root";
$password = "";

// Create connection

$conn = new mysqli($servername, $username, $password);
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
$conn->query($sql);

// sql to create table StoreProducts
mysqli_select_db($conn, "myDB");
$sql = "CREATE TABLE IF NOT EXISTS StoreProducts (
    id INT(6) UNSIGNED,
    shop INT(6) UNSIGNED NOT NULL,
    product INT(6) UNSIGNED NOT NULL,
    PRIMARY KEY (shop, product)
    )";
$conn->query($sql);

// sql to create table Products
mysqli_select_db($conn, "myDB");
$sql = "CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    price FLOAT NOT NULL,
    toppings VARCHAR(255)
    )";

$conn->query($sql);

// sql to create table Stores
mysqli_select_db($conn, "myDB");
$sql = "CREATE TABLE IF NOT EXISTS Stores (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
    )";

$conn->query($sql);

$conn->close();
