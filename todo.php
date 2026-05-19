<?php
session_start();

if(!isset($_SESSION["tasks"])){
    $_SESSION["tasks"] = [];
}

/* ADD TASK */
if(isset($_POST["add_task"])){

    $task = $_POST["task"];

    if(!empty($task)){
        $_SESSION["tasks"][] = $task;
    }
}

/* DELETE TASK */
if(isset($_POST["delete_task"])){

    $index = $_POST["index"];

    unset($_SESSION["tasks"][$index]);

    $_SESSION["tasks"] = array_values($_SESSION["tasks"]); // reindex
}
?>

<!DOCTYPE html>
<html>
<head>
<style>

input{
    width:350px;
    padding:12px;
    border-radius:14px;
    border:none;
    font-size:18px;
    background:#f8e7cd;
    outline:none;
}

button{
    padding:10px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    color:white;
}

.add{ background:tomato; }
.delete{ background:black; margin-left:10px; }

.task{
    display:flex;
    align-items:center;
    gap:10px;
    margin:10px 0;
}

</style>
</head>

<body>

<h1>Todo App</h1>

<!-- ADD TASK -->
<form method="POST">

<input type="text" name="task" placeholder="Add Task">

<button class="add" name="add_task">Add</button>

</form>

<hr>

<h2>Your Tasks</h2>

<?php foreach($_SESSION["tasks"] as $index => $t){ ?>

    <div class="task">

        <p><?php echo $t; ?></p>

        <form method="POST" style="display:inline;">
            <input type="hidden" name="index" value="<?php echo $index; ?>">
            <button class="delete" name="delete_task">Delete</button>
        </form>

    </div>

<?php } ?>

</body>
</html>