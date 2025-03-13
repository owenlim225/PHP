<?php

$name = $address = $email = "";
$nameErr = $addressErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // name error
    if (empty($_POST["name"])) {
        $nameErr = "Name is required!";}
    else {
        $name = $_POST["name"];
    }

    // email error
    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";}
    else {
        $email = $_POST["email"];
    }

    // address error
    if (empty($_POST["address"])) {
        $addressErr = "Address is required!";}
    else {
        $address = $_POST["address"];
    }
}
?>

<style>
    .error {color: red;}
</style>


<form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<input type="text" name="name" value="<?php echo $name; ?>"> <br>

<input type="text" name="address" value="<?php echo $address; ?>"> <br>

<input type="text" name="email" value="<?php echo $email; ?>"> <br>

<input type="submit" value="Submit">



</form>