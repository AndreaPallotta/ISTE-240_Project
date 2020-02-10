<?php $title = 'What to do in Amsterdam'; ?>
<?php $currentPage = 'todo'; ?>
<?php include('assets/include/header.php'); ?>
<style>
    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 5em;
    }

    h2 {
        text-align: center;
    }

    /* form inputs */
    input[type=text], textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .comments {
        height: 200px;
    }

    /* table with the sql results */
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    table {
        padding-bottom: 3em;
    }
</style>

<body>
<?php include('assets/include/navbar.php'); ?>

<!-- create the form -->
<div class="container">
    <form name="Form" action="" onsubmit="return validateForm()" method="GET">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name">

        <label for="comment">Comments</label>
        <textarea id="comment" name="comment" placeholder="Write your comments here"></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

<?php
require "../../../dbConnect.inc";

// put info in the database
if ($mysqli) {
    if (isset($_GET['name']) && isset($_GET['comment'])) {
        if ($_GET['name'] != '' && $_GET['comment'] != '') {
            $stmt = $mysqli->prepare("INSERT INTO blog (name, comment) VALUES (?, ?)");
            $stmt->bind_param("ss", $_GET['name'], $_GET['comment']);
            $stmt->execute();
            $stmt->close();
        }
    }
}
?>

<?php

// get info from the database
$sql = "SELECT name, comment FROM blog";
$res = $mysqli->query($sql);

// print the info in a table
echo '<table>';
echo '<tr>';
echo '<th> Name </th>';
echo '<th> Comment </th>';
echo '</tr>';
if($res) {
    while($rowHolder = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        echo '<tr>';
        echo '<th>' . $rowHolder["name"] . '<th/>';
        echo '<th>' . $rowHolder["comment"] . '<th/>';
        echo '</tr>';

    }
    echo '</table>';
}

else {
    echo 'the table is empty';
}
?>


</body>
<!-- include footer -->
<?php include('assets/include/footer.php'); ?>

<script>
    function validateForm() {
        var returnForm = true;

        // get the elements from the form
        var name = document.getElementById('name');
        var comment = document.getElementById('comments');

        // if the name is empty
        if (name.value == '') {
            name.style.backgroundColor = 'pink';
            name.style.borderColor = 'red';
            name.innerHTML = '';
            returnForm = false;
        }

        // if the name is not empty
        else {
            name.style.backgroundColor = 'greenyellow';
            name.style.borderColor = 'green';
        }

        // if the textarea is empty
        if (comment.value.trim() == '') {
            comment.style.backgroundColor = 'pink';
            comment.style.borderColor = 'red';
            returnForm = false;
        }

        // if the textarea contains text
        else {
            comment.style.backgroundColor = 'greenyellow';
            comment.style.borderColor = 'green';
        }

        // return value of the form validation boolean
        return(returnForm);
    }
</script>
</html>