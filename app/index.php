<?php
require_once('Database.php');

$database = new Database;
$tasks = $database->read();
$database->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeList - php</title>
</head>

<body>

    <a href="add.php">Ajouter une tâche</a>
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

        <p>
            <?= $task['task_name'] ?> 
        </p>

    <?php
    }
    ?>

</body>

</html>