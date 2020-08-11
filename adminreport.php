<?php 
    require_once 'includes/dbh.inc.php';
    require_once 'includes/header.inc.php';

    // $result = $conn->query("SELECT AVG (reviewRating) FROM reviews WHERE prodctName = 'Product 1'");
    // echo $result;

?>

<h3>List of Customer Emails</h3>
<?php
    $result = $conn->query("SELECT DISTINCT customerEmail FROM reviews") or die($conn->error());
    while ($row = $result->fetch_assoc()):
        ?>
        <p><?php echo $row['customerEmail'] ?></p>
        
    <?php endwhile; ?>
    <br>

<h3>Top 5 Reviews</h3>

<table>

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
        $result = $conn->query("SELECT * FROM reviews ORDER BY reviewRating DESC LIMIT 5 ") or die($conn->error);
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



<h3>Bottom 5 Reviews</h3>

<table>

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
            $result = $conn->query("SELECT * FROM reviews ORDER BY reviewRating ASC LIMIT 5 ") or die($conn->error);
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


<?php
    require_once 'includes/footer.inc.php';
?>
