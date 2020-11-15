<?php
/*
 * Jessica Sestak
 * This is a guestbook form that allows users to fill out my guestbook
 */
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
<form id="guestbookForm" method="post" action="confirmation.php">
<!--contact -->
<fieldset class="form-group border p-2 shadow p-3 mb-5 bg-white rounded">
    <legend class="text-center">Contact Info</legend>
    <!--First Name -->
    <div class="form-group">
        <label for="fname">First Name</label>
        <input class="form-control" id="fname" name="fname" type="text">
        <span id="error-fname" class="hidden">Please enter your first name</span>
    </div>
    <!--Last Name -->
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input class="form-control" id="lname" name="lname" type="text">
        <span id="error-lname" class="hidden">Please enter your last name</span>
    </div>
    <!--Job Title -->
    <div class="form-group">
        <label for="jobTitle">Job Title</label>
        <input class="form-control" id="jobTitle" name="jobTitle" type="text">
    </div>
    <!--Company -->
    <div class="form-group">
        <label for="company">Company</label>
        <input class="form-control" id="company" name="company" type="text">
    </div>
    <!--LinkedIn URL -->
    <div class="form-group">
        <label for="link">LinkedIn URL</label>
        <input class="form-control" id="link" name="link" type="text">
        <span id="error-linked" class="hidden">Please enter a correct LinkedIn</span>
    </div>
    <!--email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" id="email" name="email" type="text">
        <span id="error-email" class="hidden">Email required for mailing list</span>
        <span id="error-email-incorrect" class="hidden">Please enter a valid email</span>
    </div>
</fieldset>
<!--How we met  -->
<fieldset class="form-group border p-2 shadow p-3 mb-5 bg-white rounded">
    <legend class="text-center">How we met</legend>
    <!--How we met dropdown -->
    <div class="form-group">
        <label for="met">How did we meet?</label>
        <select class="form-control" id="met" name="meetSelect" onchange='checkValue(this.value)'>
            <option value="none">How did we meet?</option>
            <option value="Meetup">Meetup</option>
            <option value="Job Fair">Job Fair</option>
            <option value="Not Met">We haven't met</option>
            <option value="other">Other</option>
        </select>
        <span id="errMeet" class="hidden">Please choose how we met</span>

        <!--Hidden input that shows up if you choose other-->
        <label for="meet" id="meetLabel" style='display:none'>Please explain where we met:</label>
        <input class="form-control" id="meet" name="meet" style='display:none' type="text"/>
    </div>

    <!-- Message -->
    <div class="form-group">
        <label for="comment" >Please leave me a message</label>
        <textarea class="form-control" id="comment" name ="comment"rows="5"></textarea>
    </div>
</fieldset>
<!-- Mailing List -->
<fieldset class="form-group border p-2 shadow p-3 mb-5 bg-white rounded text-center">
    <legend class="text-center">Mailing List</legend>
    <!-- Checkbox to add to mailing list -->
    <div class="form-group">
        <label class="form-group">
            <input id="mailing" name ="mailing" class="form-check-input" type="checkbox" onclick="mailingList()">Please add me to your mailing list!<br></label>
    </div>
    <!-- Email format radio buttons -->
    <div id="mailingSelect" style = "display:none"class="form-group text-center">
        <p   class="legendText">Choose an email format:</p>
        <input  checked class="form-group" id="gridRadios1" name="mailingSelect" type="radio" value="html">
        <label   class="form-group" for="gridRadios1">HTML</label>
        <div class="form-group">
            <input  class="form-group" id="gridRadios2" name="mailingSelect" type="radio" value="text">
            <label  class="form-group" for="gridRadios2">Text</label>
        </div>
    </div>

</fieldset>
<!-- Submit button -->
<div class="form-group text-center">
    <button type="submit" class="btn btn-dark text-center">Submit</button>
</div>
    <div class="container text-center">
        <a href="adminpage.php" class="btn btn-info" role="button">My Guests</a>
    </div>
</form>
<script crossorigin="anonymous" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts/form.js"></script>
</body>
</html>
