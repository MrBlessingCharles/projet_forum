<?php
    require '../database.php';
//on verifie si l utilisateur est ben connecté
    if(!isset($_SESSION['auth'])){
        header('Location: ../html/login.php');
    }

    $errorMsg =null;
    if(isset($_GET['num_quest']) AND !empty($_GET['num_quest']) ){
      $idOfQuestion = $_GET['num_quest'];

      //on verifie si la question existe
      $checkIfQuestionExist = $bdd->prepare('SELECT * FROM question WHERE num_quest=?');
      $checkIfQuestionExist->execute(array($idOfQuestion));

        if($checkIfQuestionExist->rowCount() >0){
            
            //on stock la valeur trouvée dans une variable
            $questInfo =  $checkIfQuestionExist->fetch();
            if($questInfo['code_auteur']== $_SESSION['codeUser']){

                $deleteThisQuestion =$bdd->prepare('DELETE FROM question WHERE num_quest=?');
                $deleteThisQuestion->execute(array($idOfQuestion));
                header('Location: ../../html/my-question.php');
            }else{
                echo"vous n'êtes pas l'auteur de la question et donc vous ne pouvez pas modifier la modifier";
            }
        }else{
            echo"Aucune question n'a été trouvé !";  
        }
    }else{
       echo"Aucune question n'a été trouvé !";
    }
?>

<meta charset="UTF-8">