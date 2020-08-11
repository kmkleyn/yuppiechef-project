<?php
    require_once 'includes/edit.inc.php';
    require_once 'includes/header.inc.php';
?>

<table>

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

    <?php 
        $result = $conn->query("SELECT * FROM reviews") or die($conn->error());
        while($row = $result->fetch_assoc()):
    ?>

    <tr>
        <td><?php echo $row['reviewID'] ?></td>
        <td><?php echo $row['productName'] ?></td>
        <td><?php echo $row['reviewDescription'] ?></td>
        <td><?php echo $row['reviewRating'] ?></td>
        <td><?php echo $row['customerName'] ?></td>
        <td><?php echo $row['customerEmail'] ?></td>
        <td>
            <a href="adminreview.php?edit=<?php echo $row['reviewID'] ?>">Edit</a>
        </td>
    </tr>

    <?php 
        endwhile;
    ?>

</table>

<?php
    require_once 'includes/footer.inc.php';
?>