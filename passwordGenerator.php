<?php 

$result = "";
$length = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){

   $length = (int) $_POST["length"];

   $chars = array_merge(
      range('a','z'),
      range('A','Z'),
      range('0','9')
   );

   $result = "";

   for($i = 0; $i < $length; $i++){
      $result .= $chars[array_rand($chars)];
   }
}

?>

<!DOCTYPE html>
<html>
<body>

<h1>Generate Random Password</h1>

<form method="POST">

<label>Password Length:</label>

<input type="number" name="length" required min="1">

<button type="submit">Generate</button>

</form>

<h2><?php echo $result; ?></h2>

</body>
</html>