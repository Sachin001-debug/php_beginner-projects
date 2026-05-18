<?php

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $op = $_POST["op"];

    // validation FIRST
    if ($num1 === "" || $num2 === "") {
        $result = "Enter both numbers";
    } else {

        $num1 = (float)$num1;
        $num2 = (float)$num2;

        if ($op == "+") {
            $result = $num1 + $num2;
        } elseif ($op == "-") {
            $result = $num1 - $num2;
        } elseif ($op == "*") {
            $result = $num1 * $num2;
        } elseif ($op == "/") {

            if ($num2 == 0) {
                $result = "Cannot divide by zero";
            } else {
                $result = $num1 / $num2;
            }
        }
    }
}

?>

<form method="POST">

<input type="number" name="num1" placeholder="Number 1">
<br><br>

<input type="number" name="num2" placeholder="Number 2">
<br><br>

<select name="op">
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select>

<br><br>

<button type="submit">Calculate</button>

</form>

<h2>Result: <?php echo $result; ?></h2>