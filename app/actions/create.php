<?php
require_once('../Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST)) {
        if (
            (isset($_POST['taskName']) && !empty($_POST['taskName']))
            &&
            (isset($_POST['taskRecurrence']) && !empty($_POST['taskRecurrence']))
        ) {

            $taskName = strip_tags($_POST['taskName']);
            $taskRecurrence = strip_tags($_POST['taskRecurrence']);

            $database = new Database;

            $database->create($taskName, $taskRecurrence);

            echo ('tâche ajoutée');
        } else {
            echo ('erreur lors de l\'ajout de la tâche');
        }
    }
}
