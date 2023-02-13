<?php
    require '../database.php';

    if(isset($_POST['validate']) ){
        if(!empty($_POST['answer'])){
            $userAnswer = nl2br(htmlspecialchars($_POST['answer']));
            $answer_code_auteur =$_SESSION['codeUser'];
            $answer_pseudo_auteur=$_SESSION['pseudo'];
            

    $insertAnswer = $bdd->prepare('INSERT INTO reponse(code_auteur, pseudo_auteur, num_quest, contenu)VALUES(?,?,?,?)');
    $insertAnswer->execute(array($answer_code_auteur,
                                          $answer_pseudo_auteur,
                                          $idOfQuestion ,
                                          $userAnswer));          
        }
    }

    ?>
    