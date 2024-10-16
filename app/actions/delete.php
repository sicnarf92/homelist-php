<?php
require_once('../Database.php');

if (isset($_GET['task_id']) && !empty($_GET['task_id'])) {
    $taskId = strip_tags($_GET['task_id']);

    $database = new Database;

    $database->delete($taskId);

    header('Location: ../index.php');
    echo($taskId);
}

?>