<?php
require_once('Database.php');

if (isset($_POST)) {
    if (
    (isset($_POST['taskNameInput']) && !empty($_POST['taskNameInput'])) 
    &&
    (isset($_POST['taskRecurrence']) && !empty($_POST['taskRecurrence']))
    )
    {
        echo(strip_tags($_POST['taskNameInput']));
        echo(strip_tags($_POST['taskRecurrence']));
    }
}
?>

<h1>Ajout d'une tâche</h1>
<form method="post">
    <label for="taskNameLabel">Ajouter une tâche</label>
    <input type="text" name="taskNameInput" id="taskNameId">
    <br>
    <br>
    <label for="taskRecurrence">Préciser une récurrence</label>
    <input type="text" name="taskRecurrence" id="recurrence">
    <br>
    <br>
    <button>Enregistrer</button>
</form>