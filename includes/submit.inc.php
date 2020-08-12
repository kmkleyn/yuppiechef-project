<!-- This saves the input from the user entered in the submitreview.php page. -->

<?php require_once 'dbh.inc.php';

    if (isset($_POST['save'])) {
        $customerName = $_POST['customerName'];
        $customerEmail = $_POST['customerEmail'];  
        $productID = $_POST['productID'];
        $reviewRating = $_POST['reviewRating'];
        $reviewDescription = $_POST['reviewDescription'];
        
        $sql = "INSERT INTO reviews (
                reviewDescription, 
                reviewRating, 
                productID, 
                customerName, 
                customerEmail
                )
            VALUES(
                '$reviewDescription',
                '$reviewRating',
                '$productID',
                '$customerName',
                '$customerEmail'
            )";
        
        $conn->query($sql) or die($conn->error());
    }
?>
