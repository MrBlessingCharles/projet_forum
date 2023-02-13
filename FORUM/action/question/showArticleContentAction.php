<?php
        require '../database.php';

        $errorMsg= null;
if(isset($_GET['num_quest']) AND !empty($_GET['num_quest'])){
    //code
    $idOfQuestion = $_GET['num_quest'];
    $checkIfQuestExist = $bdd->prepare('SELECT * FROM question WHERE num_quest = ? ');
    $checkIfQuestExist->execute(array($idOfQuestion));

    //verifier si la question existe
    if( $checkIfQuestExist->rowCount() >0){
        //recuperer  
        $questionInfo = $checkIfQuestExist->fetch();

        //on recupere les données dans des variables propres
        $question_title = $questionInfo['titre_quest'];
        $question_content= $questionInfo['contenu_question'];
        $question_code_auteur = $questionInfo['code_auteur'];
        $question_pseudo_auteur = $questionInfo['pseudo'];
        $question_date_publication = $questionInfo['date_publication'];
    }else{
        $errorMsg = "Aucune question n'a été trouvé !";
    }
    }else{
        $errorMsg = "Désolé, aucun article n'a été trouvé ! ";
    }


?>
<meta charset="UTF-8">