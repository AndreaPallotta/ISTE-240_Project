<?php $title = 'Welcome to Amsterdam'; ?>
<?php $currentPage = 'homepage'; ?>
<?php include('assets/include/header.php'); ?>

<body>
<?php include('assets/include/navbar.php'); ?>

<?php

    require "../../../dbConnect.inc";

$stmt = "SELECT content FROM Content WHERE page = 'homepage'";

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

<!-- footer -->
<?php include('assets/include/footer.php'); ?>



</body> <!-- end of body -->
</html>
