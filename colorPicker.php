
<?php

$result = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $r = rand(0, 255);
   $g = rand(0, 255);
   $b = rand(0, 255);

   $result = "rgb($r,$g,$b)";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
body{
    background: <?php echo $result;  ?>
}

</style>
<body>


<h1>Generate random Color </h1>

<form method="POST">
 <button  type="submit">Generate</button>

</form>



</body>
</html>