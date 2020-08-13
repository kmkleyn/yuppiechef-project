<?php
    require_once 'includes/edit.inc.php';
    require_once 'includes/header.inc.php';
?>

<h1>Admin Listing Page</h1>

<!-- This creates a table that displays the information from each entry in the reviews table in the yuppiechefproject database. -->
<div class="row justify-content-center">
<table class="table">
    <thead>
        <tr>
            <th>reviewID</th>
            <th>Product Name</th>
            <th>Review Description</th>
            <th>Review Rating</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Edit</th>
        </tr>
    </thead>

    <!-- This loops through each of the entries in the reviews database to display them in the table. -->
    <?php
        $result = $conn->query("SELECT reviews.reviewID, 
                                        products.productName, 
                                        reviews.reviewDescription, 
                                        reviews.reviewRating, 
                                        reviews.customerName, 
                                        reviews.customerEmail 
                                        FROM reviews 
                                        INNER JOIN products on reviews.productID = products.productID") 
                                        or die($conn->error);
        while($row = $result->fetch_assoc()):
    ?>

    <tr>
        <td><?php echo $row['reviewID'] ?></td>
        <td><?php echo $row['productName'] ?></td>
        <td><?php echo $row['reviewDescription'] ?></td>
        <td><?php echo $row['reviewRating'] ?></td>
        <td><?php echo $row['customerName'] ?></td>
        <td><?php echo $row['customerEmail'] ?></td>
        
        <!-- This creates a link which will take the admin to the adminreview.php page to edit the review description. -->
        <td>
            <a href="adminreview.php?edit=<?php echo $row['reviewID'] ?>" class="btn btn-info">Edit</a>
        </td>
    </tr>

    <?php 
        endwhile;
    ?>

</table>
</div>

<?php
    require_once 'includes/footer.inc.php';
?>
