
<?php
/*
 * Jessica Sestak
 * confirmation.php creates a confirmation page to check user information and send it to database
 */

//checks to see if form was empty
if (empty($_POST)) {
    header("location: index.php");
}


include('includes/head.html');
require('includes/dbcreds.php');
require('includes/guestFunctions.php');
?>
<body>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Jessica's Guestbook</h1>
    </div>
</div>
<?php

$isValid = true;


//Check first name
if (validName($_POST['fname'])) {
    $fname = $_POST['fname'];
} else {
    echo "<p>Invalid first name</p>";
    $isValid = false;
}

//Check last name
if (validName($_POST['lname'])) {
    $lname = $_POST['lname'];
} else {
    echo "<p>Invalid last name</p>";
    $isValid = false;
}

//check meet option
$meetOption = $_POST['meetSelect'];
if ($meetOption == 'other') {
    $meet = $_POST['meet'];
} else if (validMeetSelect($meetOption)) {
    $meet = $_POST['meetSelect'];
} else {
    echo "<p>Invalid Meeting</p>";
    $isValid = false;
}

//check mailing
if (isset($_POST['mailing'])) {
    if(validMailing($_POST['mailingSelect'])) {
        $mailing = $_POST['mailingSelect'];
    }
    else {
        echo "<p>Only HTML or Text</p>";
    }
} else {
    $mailing = "";
}

//check email
$email = "";
if (isset($_POST['mailing']) and !(validEmail(($_POST['email'])))) {
    echo "<p>Please put in a valid email</p>";
    $isValid = false;
} else {
    $email = $_POST['email'];
}

//checked LinkedIn
$linked = "";
$linkedCheck = $_POST['link'];
if ($linkedCheck != "") {
    if (!(validLinkedin($linkedCheck))) {
        echo "<p>Please put a valid LinkedIn</p>";
        $isValid = false;
    } else {
        $linked = $linkedCheck;
    }
} else {
    $linked = $linkedCheck;
}


if (!$isValid) {
    return;
}

$job_title = $_POST['jobTitle'];
$company = $_POST['company'];
$message = $_POST['comment'];

$fname = mysqli_real_escape_string($cnxn, $fname);
$lname = mysqli_real_escape_string($cnxn, $lname);
$job_title = mysqli_real_escape_string($cnxn, $job_title);
$company = mysqli_real_escape_string($cnxn, $company);
$linked = mysqli_real_escape_string($cnxn, $linked);
$email = mysqli_real_escape_string($cnxn, $email);
$meet = mysqli_real_escape_string($cnxn, $meet);
$message = mysqli_real_escape_string($cnxn, $message);
$mailing = mysqli_real_escape_string($cnxn, $mailing);


//Used for testing
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
$sql = "INSERT INTO guests(fname,lname,job_title,company,
linkedin,email,meet,message,mailing)
 VALUES ('$fname','$lname','$job_title','$company','$linked','$email','$meet','$message','$mailing')";
$success = mysqli_query($cnxn, $sql);


//if doesn't download successfully than prints an error or prints summary if is was successful
if (!$success) {
    echo "<p>Sorry... something went wrong.</p>";

} else {
    echo "<h1 class ='text-center text-white'> Thank you $fname, for filling out Jessica's Guestbook!</h1>";
    echo "<h4 class = 'text-white ml-5'>Name: $fname $lname</h4>";
    echo "<h4 class = 'text-white ml-5'>Job Title: $job_title</h4>";
    echo "<h4 class = 'text-white ml-5'>Company: $company</h4>";
    echo "<h4 class = 'text-white ml-5'>LinkedIn: $linked</h4>";
    echo "<h4 class = 'text-white ml-5'>Email: $email</h4>";
    echo "<h4 class = 'text-white ml-5'>Meet: $meet</h4>";
    echo "<h4 class = 'text-white ml-5'>Message: $message</h4>";
    echo "<h4 class = 'text-white ml-5'>Mailing: $mailing</h4>";

}

?>
<div class="container text-center">
    <a href="index.php" class="btn btn-info" role="button">Guestbook Form</a>
    <a href="adminpage.php" class="btn btn-info" role="button">My Guests</a>
</div>


</body>

<script crossorigin="anonymous" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts/form.js"></script>
</body>
</html>
