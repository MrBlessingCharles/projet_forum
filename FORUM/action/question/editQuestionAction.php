<?php 
    
require '../action/database.php';
    if(isset($_POST['validate'])){
        if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
            
            $question_title = htmlspecialchars($_POST['titre']);
            $question_description = nl2br(htmlspecialchars($_POST['description']));
            $question_content = nl2br(htmlspecialchars($_POST['content']));

            //modification des données
        $editQuestionOnWebsite = $bdd->prepare('UPDATE question set titre_quest=?, description_quest=?, contenu_question=? WHERE num_quest=?');
        $editQuestionOnWebsite->execute(array(
                                    $question_title, 
                                    $question_description,
                                    $question_content,
                                    $idOfQuestion));

        //redirection vers la page des questons de l'utilisateur    
        header('Location: ../html/my-question.php');
    }else{
        $errorMsg ="veuillez completer tous les chapls svp !";
    }
}
?> 