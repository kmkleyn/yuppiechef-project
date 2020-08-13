<?php
    require_once 'includes/submit.inc.php';
    require_once 'includes/header.inc.php';
?>

<h1>Submit a Review</h1>
<!-- This form collects the review information from the user and uses the POST method in 
includes/submit.inc.php to save it to the database. -->
<form action="" method="POST">

    <!-- Customer Name -->
    <div class="form-group">
        <label>Your name</label>
        <input type="text" name="customerName" placeholder="Name">
        <br>
    </div>

    <!-- Customer Email -->
    <div class="form-group">
        <label>Your email</label>
        <input type="text" name="customerEmail" placeholder="Email">
        <br>
    </div>

    <!-- Product ID
    This loops through the products in the products table to display their IDs.
    An improvement can be made here to display the product names instead. -->
    <div class="form-group">
        <label>Product</label>
        <select name="productID">

            <?php 
                $result = $conn->query("SELECT productID FROM products") or die($conn->error());
                while ($row = $result->fetch_assoc()):
            ?>

            <option><?php echo $row['productID']?></option>
            
            <?php endwhile; ?>

        </select>
        <br>
    </div>

    <!-- Review Rating -->
    <div class="form-group">
        <label>Rating</label>
        <select name="reviewRating">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        <br>
    </div>

    <!-- Review Description -->
    <div class="form-group">
        <label>Review</label>
        <input type="text" name="reviewDescription" placeholder="Write your review here.">
        <br>
    </div>
    
    <!-- Submit Button -->
    <div class="form-group">
        <button type="submit" name="save" class="btn btn-primary">Submit</button>
    </div>

</form>

<?php
    require_once 'includes/footer.inc.php';
?>
