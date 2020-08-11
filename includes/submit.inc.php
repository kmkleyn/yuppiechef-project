<!-- This saves the input from the user entered in the submitreview.php page. -->

<?php require_once 'dbh.inc.php';

    if (isset($_POST['save'])) {
        $customerName = $_POST['customerName'];
        $customerEmail = $_POST['customerEmail'];
        $productName = $_POST['productName'];
        $reviewRating = $_POST['reviewRating'];
        $reviewDescription = $_POST['reviewDescription'];
        
        $sql = "INSERT INTO reviews (
                reviewDescription, 
                reviewRating, 
                productName, 
                customerName, 
                customerEmail
                )
            VALUES(
                '$reviewDescription',
                '$reviewRating',
                '$productName',
                '$customerName',
                '$customerEmail'
            )";
        
        $conn->query($sql) or die($conn->error());
    }
?>