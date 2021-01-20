<?php
ini_set('log_errors', 1);
ini_set('error_log','php.log');
error_log(E_ALL);
    require_once 'connection.php';
    require_once 'DbInsert.php';
    $conn = new Connection();
    $db = $conn->conn();
?>
<html lang="en">
    <head>
        <title>Todo App</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <div class="todo">
        <h1 class="todo-header">Todo App</h1>

        <form class="todo-input-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label class="l-title" for="title" id="l-title">Title</label><br>
            <input name="title" id="title" class="title" required><br><br>
            <label class="l-description" for="description" id="l-description">Task Description</label><br>
            <textarea name="description" id="description" class="description" required></textarea><br><br>
            <button class="submit" name="submit">+</button>
        </form>
        <?php
        $db_ins = new DbInsert();
            if(isset($_POST['submit'])){
                error_log( "Houston Everything is joly!");
                $title = $db->real_escape_string($_POST['title']);
                $task = $db->real_escape_string($_POST['description']);


                $db_ins->setTitle($title);
                $db_ins->setTask($task);
                $db_ins->Insert();
            }
            if(isset($_POST['delete'])){
                error_log( 'Houston i am coming home see you in 50 minutes!');
                $t_id = $db->real_escape_string($_POST['todoid']);
                $db_ins->deleteTodo($t_id);
            }
        ?>
    <div class="tasks-list">
        <h1 class="todo-header">Tasks</h1>
        <div class="tasks-group">
        <?php
            $result = $db->query("select * from todo");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){ ?>
                    <div class="task-item">
                        <div id="<?php echo $row['todoid']?>" class="mark-done">
                            <p>Done!</p>
                        </div>
                        <input name="done" id="done" class="done" type="checkbox" onchange="toogleDone(this,<?php echo $row['todoid']?>)">
                        <h1><?php echo ucfirst( $row['todoname']);?></h1>
                        <div class="desc">
                            <p><?php echo ucfirst($row['tododesc']) ?></p>
                            <div class="date"><?php echo $row['timestamp'] ?></div>
                        </div>
                        <div class="hidden-items">
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                                <input class="hidden" name="todoid" value="<?php echo $row['todoid']?>"/>
                                <button class="deletes" name="delete" id="deleted">-</button>
                            </form>
                        </div>
                    </div>
           <?php } ?>
        </div>
    </div>
    </div>
    <script src="main.js" type="text/javascript"></script>
    </body>
</html>