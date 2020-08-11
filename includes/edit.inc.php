<!-- This gets the review description from the clicked edit button on the adminlisting.php page to edit. -->

<?php require_once 'dbh.inc.php';

    if (isset($_GET['edit'])) {
        $reviewID = $_GET['edit'];

        $sql = "SELECT * FROM reviews WHERE reviewID = '$reviewID'";

        $result = $conn->query($sql) or die($conn->error());
        if ($result) {
            $row = $result->fetch_array();
            $reviewDescription = $row['reviewDescription'];
        }
    }
?>