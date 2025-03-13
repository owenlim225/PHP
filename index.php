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


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


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
include("connections.php");

    if($name && $address && $email){
        $query = mysqli_query($connections, "INSERT INTO mytbl(name, address, email) VALUES('$name', '$address', '$email')");

        echo "<script language='javascript'>alert('New Record has been inserted!');</script>";
        echo "<script language='javascript'>window.location='index.php';</script>";
    }

    $view_query = mysqli_query($connections,"SELECT * FROM mytbl");

    echo "<table border='1' width='50%'>";

    echo "<tr>
            <td>Name</td>
            <td>Address</td>
            <td>Email</td>

            <td>Options</td>
        </tr>";


    while($row = mysqli_fetch_assoc($view_query)){
        $user_id = $row["id"];

        $db_name = $row['name'];
        $db_address = $row['address'];
        $db_email = $row['email'];

        echo "<tr>
                <td>$db_name</td>
                <td>$db_address</td>
                <td>$db_email</td>

                <td>
                    <a href='edit.php?user_id=$user_id'>Update</a>
                    &nbsp;
                    <a href='confirmDelete.php'>Delete</a>
                </td>
            </tr>";
    }

    echo "</table>";
?>