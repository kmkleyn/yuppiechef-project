<?php
	require_once 'includes/edit.inc.php';
    require_once 'includes/header.inc.php';
?>
<form action="includes/editsave.inc.php" method="POST">

    <input type="hidden" name="reviewID" value="<?php echo $reviewID; ?>">
    <input type="text" name="reviewEdited" value="<?php echo $reviewDescription; ?>">
    <button type="submit" name="save">Save</button>

</form>

<?php
    require_once 'includes/footer.inc.php'

?>