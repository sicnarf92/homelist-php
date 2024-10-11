<?php
/*
function connect() {
    global $database;
    try {
        $database = new PDO('mysql:host=database_homelist;dbname=homelist','homelist','homelist');
    } catch (PDOException $e) {
        echo 'Erreur: '. $e->getMessage();
        die();
    }
}

function close() {
    global $database;

    $database = null;
}
    */

class Database
{
    private $database;

    public function __construct()
    {
        $host = 'database_homelist';
        $dbname = 'homelist';
        $username = 'homelist';
        $password = 'homelist';

        try {
            $this->database = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
            die();
        }
    }

    public function close()
    {
        $this->database = null; // Ferme la connexion
    }

    public function create()
    {
        $sql = 'INSERT INTO `tasks` (`task_name`, `task_recurrence`, `task_status`) VALUES (:taskName, :taskRecurrence,0)';

        $query = $this->database->prepare($sql);

        $query->bindValue(':taskName', $_POST['task'], PDO::PARAM_STR);
        $query->bindValue(':taskRecurrence', $_POST['status'], PDO::PARAM_INT);

        $query->execute();
    }

    public function read()
    {
        
        $sql = 'SELECT  * FROM `tasks`';

        $query = $this->database->prepare($sql);

        $query->execute();

        global $result;
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
