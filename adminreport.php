<?php 
    require_once 'includes/dbh.inc.php';
    require_once 'includes/header.inc.php';
?>

<!-- This page displays a number of statistics related to the reviews submitted to the reviews table. -->
<h1>Admin Report Page</h1>

<!-- This table displays the number of reviews per product: -->
<h3>Number of Reviews Per Product</h3>
<div class="row justify-content-center">
<table class="table">

    <thead>
        <tr>
            <th>Product</th>
            <th>Number of Reviews</th>
        </tr>
    </thead>

    <?php
        $result = $conn->query("SELECT COUNT(reviews.productID), products.productName 
                                FROM reviews 
                                INNER JOIN products ON reviews.productID = products.productID 
                                GROUP BY products.productID") 
                                or die($conn->error);
        while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?php echo $row['productName']?></td>
            <td><?php echo $row['COUNT(reviews.productID)']?></td>
        </tr>

    <?php 
        endwhile
    ?>

</table>
</div>


<!-- This table displays the average review rating for each product: -->
<h3>Average Review Rating Per Product</h3>
<div class="row justify-content-center">
<table class="table">

    <thead>
        <tr>
            <th>Product</th>
            <th>Average Review Rating</th>
        </tr>
    </thead>

    <?php
        $result = $conn->query("SELECT FLOOR(AVG(reviews.productID)), products.productName 
                                FROM reviews 
                                INNER JOIN products ON reviews.productID = products.productID 
                                GROUP BY products.productID") 
                                or die($conn->error);
        while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?php echo $row['productName']?></td>
            <td><?php echo $row['FLOOR(AVG(reviews.productID))']?></td>
        </tr>

    <?php 
        endwhile; 
    ?>

</table>
</div>

<!-- This table displays the top 5 reviews: -->
<h3>Top 5 Reviews</h3>
<div class="row justify-content-center">
<table class="table">

    <thead>
        <tr>
            <th>Product Name</th>
            <th>Review Description</th>
            <th>Review Rating</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
        </tr>
    </thead>
    <tr>
    <?php
        $result = $conn->query("SELECT products.productName, 
                                reviews.reviewDescription, 
                                reviews.reviewRating, 
                                reviews.customerName, 
                                reviews.customerEmail 
                                FROM reviews 
                                INNER JOIN products on reviews.productID = products.productID 
                                ORDER BY reviews.reviewRating DESC 
                                LIMIT 5 ") 
                                or die($conn->error);
        while ($row = $result->fetch_assoc()):
    ?>
        <td><?php echo $row['productName'] ?></td>
        <td><?php echo $row['reviewDescription'] ?></td>
        <td><?php echo $row['reviewRating'] ?></td>
        <td><?php echo $row['customerName'] ?></td>
        <td><?php echo $row['customerEmail'] ?></td>
    </tr>
    <?php 
        endwhile; 
    ?>
</table>
</div>

<!-- This table displays the bottom or worst 5 reviews: -->
<h3>Bottom 5 Reviews</h3>
<div class="row justify-content-center">
<table class="table">

    <thead>
        <tr>
            <th>Product Name</th>
            <th>Review Description</th>
            <th>Review Rating</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
        </tr>
    </thead>
        <tr>
        <?php
             $result = $conn->query("SELECT products.productName, 
                                    reviews.reviewDescription, 
                                    reviews.reviewRating, 
                                    reviews.customerName, 
                                    reviews.customerEmail 
                                    FROM reviews 
                                    INNER JOIN products on reviews.productID = products.productID 
                                    ORDER BY reviews.reviewRating ASC 
                                    LIMIT 5 ") 
                                    or die($conn->error);
            while ($row = $result->fetch_assoc()):
        ?>
            <td><?php echo $row['productName'] ?></td>
            <td><?php echo $row['reviewDescription'] ?></td>
            <td><?php echo $row['reviewRating'] ?></td>
            <td><?php echo $row['customerName'] ?></td>
            <td><?php echo $row['customerEmail'] ?></td>
        </tr>
            <?php endwhile; ?>
</table>
</div>

<!-- This displays a list of each unique email address within the reviews table: -->
<h3>List of Customer Emails</h3>
<?php
    $result = $conn->query("SELECT DISTINCT customerEmail FROM reviews") or die($conn->error());
    while ($row = $result->fetch_assoc()):
?>
    <p><?php echo $row['customerEmail'] ?></p>
        
<?php 
    endwhile; 
?>

<?php
    require_once 'includes/footer.inc.php';
?>
