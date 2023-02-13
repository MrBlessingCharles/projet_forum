<?php   
require '../action/database.php';

$success= null;
$errorMsg= null;
    //valider le formulaire
    if(isset($_GET['num_quest']) AND !empty($_GET['num_quest'])){
        $idOfQuestion = $_GET['num_quest'];

        //verifie si la question existe
        $checkIfQuestionExist =$bdd->prepare('SELECT * FROM question WHERE num_quest = ?');
        $checkIfQuestionExist->execute(array($idOfQuestion));

        //verifie si le formulaire n'est pas vide
        if($checkIfQuestionExist->rowCount() >0){
           $questionInfo = $checkIfQuestionExist->fetch();

           //compare le code de la session à l'identifiant de l auteur de la question
           if($questionInfo['code_auteur']== $_SESSION['codeUser']){
              
                $question_title= $questionInfo['titre_quest'];
                $question_description= $questionInfo['description_quest'];
                $question_content=$questionInfo['contenu_question'];
              
                $question_description= str_replace("<br />", " ", $question_description);
                $question_content= str_replace("<br />", " ",  $question_content);
           }else{
            $errorMsg ="desolé vous n'êtes pas l'auteur de cette question et donc vous ne pouvez pas modifier !";
     
           }
        }else{
        $errorMsg ="desolé aucune question n'a été trouvée !";
        }
    //code
    }else{
        $errorMsg ="desolé aucune question n'a été trouvée !";
    }

?>