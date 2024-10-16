<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = isset($_POST['taskName']) ? htmlspecialchars($_POST['taskName']) : null;
    $taskRecurrence = isset($_POST['taskRecurrence']) ? (int)$_POST['taskRecurrence'] : null;

    if ($taskName && $taskRecurrence) {
        echo "Nom de la tâche : " . $taskName . "\nRécurrence : " . $taskRecurrence;
    } else {
        echo "Task name or recurrence not provided.";
    }
}
