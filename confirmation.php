
<?php
/*
 * Jessica Sestak
 * confirmation.php uploads form information to database
 */

//Will stop post if empty
if(empty($_POST)) {
    return;
}

//set the time zone
date_default_timezone_set('America/Los_Angeles');

//adds the header and the database credentials 
include ('includes/head.html');
require ('includes/dbcreds.php');
?>

<body>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Jessica's Guestbook</h1>
    </div>
</div>
<?php


//get data from post array
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$job_title = $_POST['jobTitle'];
$company = $_POST['company'];
$linkedin = $_POST['link'];
$email = $_POST['email'];
$meetOption = $_POST['meetSelect'];
if($meetOption == 'other') {
    $meet = $_POST['meet'];
}
else {
    $meet = $_POST['meetSelect'];
}
$message = $_POST['comment'];
if(isset($_POST['test'])) {
    $mailing = $_POST['mailingSelect'];
}
else {
    $mailing = "";
}

// I use this to check that values are being properly received
/*
echo "<p>Name: $fname $lname</p>";
echo "<p>Job Title: $job_title</p>";
echo "<p>Company: $company</p>";
echo "<p>LinkedIn: $linkedin</p>";
echo "<p>Email: $email</p>";
echo "<p>Meet: $meet</p>";
echo "<p>Message: $message</p>";
echo "<p>Mailing: $mailing</p>";
var_dump($_POST);

*/

    //save order to database
    $sql= "INSERT INTO guests(fname,lname,job_title,company,
    linkedin,email,meet,message,mailing)
    VALUES ('$fname','$lname','$job_title','$company','$linkedin','$email','$meet','$message','$mailing')";
    $success = mysqli_query($cnxn, $sql);
    if(!$success) {
        echo "<p>Sorry... something went wrong.</p>";
        return;
    }
?>

</body>
<h1 class ="text-center text-white">Thank you <?php echo $_POST['fname']?>, for filling out Jessica's Guestbook!</h1>
<script crossorigin="anonymous" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts/form.js"></script>
</body>
</html>
