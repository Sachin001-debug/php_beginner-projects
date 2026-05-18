<?php
 
$name = "";
$email = "";

$nameError = "";
$emailError = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    // Name validation
    if (empty($name)) {
        $nameError = "Name is required!";
    }

    // Email validation
    if (empty($email)) {
        $emailError = "Email is required!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format!";
    }

    // Success
    if (empty($emailError) && empty($nameError)) {
        $success = "Form submitted!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Handling</title>
</head>
<body>

<h1>Form</h1>

<form method="POST">

    <label>Name:</label>
    <input 
        type="text"
        name="name"
        value="<?php echo $name; ?>"
        placeholder="Enter name"
    >
    <div style="color:red">
        <?php echo $nameError; ?>
    </div>

    <br>

    <label>Email:</label>
    <input
        type="text"
        name="email"
        value="<?php echo $email; ?>"
        placeholder="Enter email"
    >
    <div style="color:red">
        <?php echo $emailError; ?>
    </div>

    <br>

    <button type="submit">Submit</button>

</form>

<div style="color:green">
    <?php echo $success; ?>
</div>

</body>
</html>