<?php


function test_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name    = test_input($_POST['name']);
$email   = test_input($_POST['email']);
$state   = test_input($_POST['state']);
$bday    = test_input($_POST['bday']);
$bar     = test_input($_POST['selectionBars']);
$coffee  = test_input($_POST['selectionCoffee']);
$places  = test_input($_POST['place']);
$range   = test_input($_POST['range']);
$comment = test_input($_POST['ta']);

$destination_email = "RITISTprofessor@gmail.com, ap4534@rit.edu";

$email_subject = "Amsterdam - Andrea Pallotta";

$email_body  = "Visitor name: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "State: $state\n";
$email_body .= "Birthday: $bday\n";
$email_body .= "Did you go to any bar? $bar\n";
$email_body .= "Did you go to any coffee shop? $coffee\n";
$email_body .= "Places you liked: $places\n";
$email_body .= "How much did you like it: $range\n";
$email_body .= "Comment: $comment\n";

mail($destination_email, $email_subject, $email_body);
echo "Data Sent<br />";

//echo "place = " . $_POST['place'];
/**
 * Created by PhpStorm.
 * User: Andrea Pallotta
 * Date: 2/7/2019
 * Updated:  2/12/2019
 * Time: 1:02 PM
 */
?>

<?php
require "../../../dbConnect.inc";



if($mysqli) {

    $stmt = $mysqli->prepare("INSERT INTO survey (name, email, state, bar, coffeeshop, checkbox, howMuchYouLike, comment, bday) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssiss", $name, $email, $state, $bar, $coffee, $place, $range, $comment, $bday);

    $stmt->execute();

}
?>

<?php $title = 'Form Response'; ?>
<?php $currentPage = 'process_sample'; ?>
<?php include('assets/include/header.php'); ?>

<body>

<h3>Thank you so much for taking the time out
    of your day to complete our short survey.</h3>
<img src="assets/images/thankyou1.png" alt="Thanks for filling out our form"
     title="Thanks for filling out our form" />

<p><a href="https://people.rit.edu/~ap4534/iste240/exer/hw01/index.php">
        <img class="NoBorder" width="50" src="assets/images/home_blue.png"
             id="homeJRH" alt="Home"    title="Home"
             onmouseover="change('homeJRH','assets/images/home_red.png')"
             onmouseout ="change('homeJRH','assets/images/home_blue.png')" /></a></p>

<div class="footer_item">
    <p class="overline"> This site was created by Andrea Pallotta for his iste 240 - Web and </p>
    <p> Mobile II individual project. Copyright © 2019. All rights reserved. </p>
</div>
</div>
<br />
<div id="logo">
    <a href="#"><img id="html_logo" src="assets/images/html.png" alt="html logo"></a>
    <a href="#"><img id="css_logo" src="assets/images/css.png" alt="css logo"></a>
</div>
</footer> <!-- end of footer -->
<?php include('assets/include/footer.php'); ?>
</body>
</html>
