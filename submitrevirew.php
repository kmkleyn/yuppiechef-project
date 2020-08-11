<?php
    require_once 'includes/submit.inc.php';
    require_once 'includes/header.inc.php';
?>

<form action="" method="POST">

    <label>Name</label>
    <input type="text" name="customerName" placeholder="Name">

    <label>Email</label>
    <input type="text" name="customerEmail" placeholder="Email">
    
    <!-- This loops through the products in the products table to display their names. -->
    <label>Product</label>
    <select name="productID">

        <?php 
            $result = $conn->query("SELECT productID FROM products") or die($conn->error());
            while ($row = $result->fetch_assoc()):
        ?>

        <option><?php echo $row['productID']?></option>
        
        <?php endwhile; ?>

    </select>

    <label>Rating</label>
    <select name="reviewRating">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>

    <label>Review</label>
    <input type="text" name="reviewDescription" placeholder="Write your review here.">

    <button type="submit" name="save">Submit</button>

</form>

<?php
    require_once 'includes/footer.inc.php';
?>
