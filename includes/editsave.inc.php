<!-- This saves the edited review from the adminreview.php page. -->

<?php require_once 'dbh.inc.php';

    if (isset($_POST['save'])) {
        $reviewID = $_POST['reviewID'];
        $reviewEdited = $_POST['reviewEdited'];

        $sql = "UPDATE reviews
                SET reviewDescription = '$reviewEdited'
                WHERE reviewID = '$reviewID'";

        $conn->query($sql) or die($conn->error());
    }

?>