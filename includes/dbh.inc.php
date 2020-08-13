<!-- This file creates the connection with the Yuppiechef Project Database. -->

<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "yuppiechefproject";

// Create the connection with the database
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// This creates the tables for the yuppiechefproject database.
// Create the products table:
$productsTableSql = "CREATE TABLE products (
  productID INT NOT NULL AUTO_INCREMENT,
  productName VARCHAR(100) NOT NULL,
  PRIMARY KEY (productID)
  )";

if ($conn->query($productsTableSql) === TRUE) {
  echo "Tables created successfully";
} else {
  echo "Error creating tables: " . $conn->error;
}

// Create the reviews table:
// The reviews table contains a foreign key (productID) that references the products table.
$reviewsTableSql = "CREATE TABLE reviews (
  reviewID INT NOT NULL AUTO_INCREMENT,
  reviewDescription TEXT(1000),
  reviewRating INT(1) NOT NULL,
  productID INT NOT NULL,
  customerName VARCHAR(100),
  customerEmail VARCHAR(100) NOT NULL,
  PRIMARY KEY (reviewID),
  FOREIGN KEY (productID) REFERENCES products(productID)
  )";

if ($conn->query($reviewsTableSql) === TRUE) {
  echo "Tables created successfully";
} else {
  echo "Error creating tables: " . $conn->error;
}
 
?>
