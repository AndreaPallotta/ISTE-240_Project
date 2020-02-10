<?php $title = 'Food in Amsterdam'; ?>
<?php $currentPage = 'food'; ?>
<?php include('assets/include/header.php'); ?>

<body>
<?php include('assets/include/navbar.php'); ?>
<!-- gets the content from the database -->
<?php

require "../../../dbConnect.inc";

$stmt = "SELECT content FROM Content WHERE page = 'food'";

$result = $mysqli->query($stmt);
if($result) {
    while($rowHolder = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $record[] = $rowHolder;
    }

    foreach($record as $this_row) {
        echo $this_row['content'];
    }
}

?>
<?php include('assets/include/footer.php'); ?>
</body>
</html>