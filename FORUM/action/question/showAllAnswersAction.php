<?php
    require '../database.php';

    $getAllAnswersOfThisQuestion = $bdd->prepare('SELECT code_auteur, pseudo_auteur, contenu 
                                                  FROM reponse WHERE num_quest=? ORDER BY num_rep DESC');
    $getAllAnswersOfThisQuestion->execute(array($idOfQuestion));

    ?>