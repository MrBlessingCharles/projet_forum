<?php
   require '../action/database.php';
    //verifier les questions par defaut sans recherche
    $getAllQuestion =$bdd->query('SELECT num_quest,titre_quest, description_quest, code_auteur, date_publication, email_user, pseudo
                                FROM question ORDER BY num_quest DESC LIMIT 0,5');

    //verifier si une recherche a été effectuée par l'utilisateur
    if(isset($_GET['search']) AND  !empty($_GET['search'])){

        //recherche de l'utilisateur
        $userSearch = $_GET['search'];

       //recuperer les questions qui correspondent en fonctin du titre
        $getAllQuestion = $bdd->query("SELECT num_quest, titre_quest, description_quest, email_user, date_publication, pseudo
                                      FROM question WHERE titre_quest LIKE '%".$userSearch."%'ORDER BY num_quest DESC");
    }
?>