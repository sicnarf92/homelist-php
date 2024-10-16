document.getElementById('task-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const taskName = document.getElementById('taskName').value.trim();
    const taskRecurrence = document.getElementById('taskRecurrence').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/create.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    //écrire une fonction qd la requete est terminée
    //par exemple "tache ajoutée" ou "erreur"
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Réponse du serveur : \n' + xhr.responseText);
        } else {
            console.log('Erreur : ' + xhr.status);
        }
    };

    xhr.send('taskName=' + encodeURIComponent(taskName) + '&taskRecurrence=' + encodeURIComponent(taskRecurrence));
});

