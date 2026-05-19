<?php 
session_start();

if(!isset($_SESSION["win"])){
    $_SESSION["win"] = 0;
}
if(!isset($_SESSION["win"])){
    $_SESSION["lose"] = 0;
}
if(!isset($_SESSION["win"])){
    $_SESSION["draw"] = 0;
}

$userChoosed = "";
$result = "";
$computerChoosed = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $userChoosed = $_POST["move"];

    $computerOption = rand(1,3);

    if($computerOption == 1){
        $computerChoosed = "Rock";

        if($userChoosed == "Paper"){
            $result = "You Win";
            $_SESSION["win"]++;
        }elseif($userChoosed == "Scissors"){
            $result = "You Lose";
            $_SESSION["lose"]++;
        }else{
            $result = "Draw";
            $_SESSION["draw"]++;
        }
    }

    if($computerOption == 2){
        $computerChoosed = "Paper";

        if($userChoosed == "Scissors"){
            $result = "You Win";
            $_SESSION["win"]++;
        }elseif($userChoosed == "Rock"){
            $result = "You Lose";
             $_SESSION["lose"]++;
        }else{
            $result = "Its a Draw";
            $_SESSION["draw"]++;
        }
    }

    if($computerOption == 3){
        $computerChoosed = "Scissors";

        if($userChoosed == "Rock"){
            $result = "You Win";
            $_SESSION["win"]++;
        }elseif($userChoosed == "Paper"){
            $result = "You Lose";
             $_SESSION["lose"]++;
        }else{
            $result = "Its a Draw";
            $_SESSION["draw"]++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>

.options{
    display:flex;
    gap:12px;
    padding:12px;
}

button{
    padding:10px;
    width:120px;
    border:none;
    cursor:pointer;
    color:white;
}

.rock{ background:blue; }
.paper{ background:red; }
.scissors{ background:purple; }

</style>
</head>

<body>

<h1>Play with Computer</h1>

<form method="POST">

<div class="options">

    <button class="rock" name="move" value="Rock">Rock</button>

    <button class="paper" name="move" value="Paper">Paper</button>

    <button class="scissors" name="move" value="Scissors">Scissors</button>

</div>

</form>

<hr>

<h2>Computer chose: <?php echo $computerChoosed; ?></h2>

<h2>Result: <?php echo $result; ?></h2>

<h2>Wins: <?php echo $_SESSION["win"]; ?></h2>
<h2>Lose: <?php echo $_SESSION["lose"]; ?></h2>
<h2>Draw: <?php echo $_SESSION["draw"]; ?></h2>

</body>
</html>