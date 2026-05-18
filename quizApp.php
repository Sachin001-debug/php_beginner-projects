<?php

$questions = [
    [
        "q" => "What is the capital of Nepal?",
        "options" => ["Kathmandu", "Pokhara", "Lalitpur", "Biratnagar"],
        "answer" => "Kathmandu"
    ],
    [
        "q" => "2 + 2 = ?",
        "options" => ["3", "4", "5", "6"],
        "answer" => "4"
    ],
    [
        "q" => "Which is a programming language?",
        "options" => ["HTML", "CSS", "PHP", "Photoshop"],
        "answer" => "PHP"
    ]
];

$score = 0;
$result = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($questions as $index => $q) {

        $userAnswer = $_POST["q$index"];

        if ($userAnswer == $q["answer"]) {
            $score++;
            $result[$index] = " Correct";
        } else {
            $result[$index] = " Wrong (Correct: " . $q["answer"] . ")";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz App</title>
</head>
<body>

<h1>Quiz App</h1>

<form method="POST">

<?php foreach ($questions as $index => $q) { ?>

    <h3><?php echo $q["q"]; ?></h3>

    <?php foreach ($q["options"] as $opt) { ?>

        <label>
            <input type="radio" name="q<?php echo $index; ?>" value="<?php echo $opt; ?>" required>
            <?php echo $opt; ?>
        </label><br>

    <?php } ?>

    <?php
    if (isset($result[$index])) {
        echo "<p>" . $result[$index] . "</p>";
    }
    ?>

    <hr>

<?php } ?>

<button type="submit">Submit Quiz</button>

</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <h2>Your Score: <?php echo $score; ?> / <?php echo count($questions); ?></h2>
<?php } ?>

</body>
</html>