<?php
require_once('Database.php');

$database = new Database;
$tasks = $database->read();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeList - php</title>
</head>

<body>
    <?php
    if (isset($_POST)) {
        if (
            (isset($_POST['taskNameInput']) && !empty($_POST['taskNameInput']))
            &&
            (isset($_POST['taskRecurrenceSelect']) && !empty($_POST['taskRecurrenceSelect']))
        ) {
            $taskName = strip_tags($_POST['taskNameInput']);
            $taskRecurrence = strip_tags($_POST['taskRecurrenceSelect']);
            $database->create($taskName, $taskRecurrence);
        }
    }
    ?>

    <h1>Ajout d'une tâche</h1>
    <form method="post">
        <label for="taskNameLabel">Ajouter une tâche</label>
        <input type="text" name="taskNameInput" id="taskNameId">
        <br>
        <br>

        <label for="taskRecurrenceLabel">Préciser une récurrence</label>
        <select name="taskRecurrenceSelect" id="taskRecurrenceId">
            <option value="1">Quotidienne</option>
            <option value="7">Hebdomadaire</option>
            <option value="30">Mensuelle</option>
            <option value="90">Saisonnière</option>
        </select>

        <br>
        <br>
        <button>Ajouter</button>
    </form>

    <h1>Liste des tâches</h1>

    <?php
    //tri des taches par récurrence
    usort($result, function ($a, $b) {
        return $a['task_recurrence'] <=> $b['task_recurrence']; // Trie en ordre ascendant
    });
    $recurrenceStarter = 0;
    foreach ($result as $task) {
        //quand la récurrence change, il faut créer un nouveau titre

        if ($task['task_recurrence'] != $recurrenceStarter) {
            $recurrenceStarter = $task['task_recurrence'];


            switch ($recurrenceStarter) {
                case 1:
    ?>
                    <h2>Tous les jours</h2>
                <?php
                    break;
                case 7:
                ?>
                    <h2>Toutes les semaines</h2>
                <?php
                    break;
                case 30:
                ?>
                    <h2>Tous les mois</h2>
                <?php
                    break;
                case 90:
                ?>
                    <h2>Toutes les saisons</h2>
        <?php
                    break;
            }
        }
        ?>

        <p id= <?= $task['task_id'] ?> >
            <?= $task['task_name'] ?>
        </p>
        <a href="">Supprimer</a>

    <?php
    }
    $database->close();

    ?>


<script src="js/create.js"></script>
</body>

</html>