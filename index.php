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
<span class="error"><?php echo $nameErr;?></span> <br>

<input type="text" name="address" value="<?php echo $address; ?>"> <br>
<span class="error"><?php echo $addressErr;?></span> <br>

<input type="text" name="email" value="<?php echo $email; ?>"> <br>
<span class="error"><?php echo $emailErr;?></span> <br>

<input type="submit" value="Submit">

</form>

<hr>

<?php
    if($name && $address && $email){
     
        echo $name."<br>";
        echo $address."<br>";
        echo $email."<br>";
    }

?>