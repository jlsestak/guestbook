<?php
/*
 * Jessica Sestak
 * adminpage.php
 * Displays guests
 */

//turn on error reporting
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/

//includes files
include ('includes/head.html');
require('includes/dbcreds.php');

?>

<body>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Jessica's Guests</h1>
    </div>
</div>
<!-- Guestbook Table of Guests -->
<div class = "container" id = "main">
    <table id="guest-table" class ="display" style="width:100%">
        <thead>
        <tr>
            <td>Guest ID</td>
            <td>Name</td>
            <td>Job Title</td>
            <td>Company</td>
            <td>LinkedIn</td>
            <td>Email</td>
            <td>Where we met</td>
            <td>Message</td>
            <td>Mailing</td>
            <td>TimeStamp</td>

        </tr>
        </thead>
    <tbody>
    <?php
        $sql ="SELECT * FROM guests";
        $result = mysqli_query($cnxn, $sql);
       // print the table
        foreach($result as $row){
            $guest_id = $row['guest_id'];
            $fullname = $row['fname']." ".$row['lname'];
            $job_title = $row['job_title'];
            $company = $row['company'];
            $linkedin = $row['linkedin'];
            $email = $row['email'];
            $meet = $row['meet'];
            $message = $row['message'];
            $mailing = $row['mailing'];
            $time_stamp = date("M d, Y g:i a", strtotime($row['time_stamp']));
            echo "<tr>";
            echo "<td>$guest_id</td>";
            echo "<td>$fullname</td>";
            echo "<td>$job_title</td>";
            echo "<td>$company</td>";
            echo "<td>$linkedin</td>";
            echo "<td>$email</td>";
            echo "<td>$meet</td>";
            echo "<td>$message</td>";
            echo "<td>$mailing</td>";
            echo "<td>$time_stamp</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
        </table>
    <div class="container text-center">
        <a href="index.php" class="btn btn-info" role="button">Guestbook Form</a>
    </div>

</div>
<script crossorigin="anonymous" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts/form.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    //get table format with order time descending
    $(document).ready(function() {
        $('#guest-table').DataTable( {
            "order": [[ 9, "desc" ]]
        } );
    } );

</script>
</body>
</html>
