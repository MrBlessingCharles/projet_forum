<?php
    require '../action/database.php';
    $getAllMyQestion = $bdd->prepare('SELECT num_quest, titre_quest, description_quest, date_publication 
        FROM question WHERE code_auteur= ? ORDER BY num_quest DESC ');
    $getAllMyQestion->execute(array($_SESSION['codeUser']));
?>