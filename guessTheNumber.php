<?php
session_start();

$result = "";

// create random number only once
if (!isset($_SESSION["randomNum"])) {
    $_SESSION["randomNum"] = rand(1, 100);
}

$randomNum = $_SESSION["randomNum"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num = $_POST["num"];

    if ($num == "") {
        $result = "Give a number";
    } else {

        $num = (int)$num;

        if ($randomNum == $num) {
            $result = " Wow! You guessed right! Number was $randomNum";
            unset($_SESSION["randomNum"]); // reset game
        } elseif ($randomNum > $num) {
            $result = " Guess higher";
        } else {
            $result = "Guess lower";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess the Number</title>
</head>
<body>

<h2>Guess a number between 1 - 100</h2>

<form method="POST">

    <input type="number" name="num" placeholder="Enter number">

    <button type="submit">Submit</button>

</form>

<h2><?php echo $result; ?></h2>

</body>
</html>