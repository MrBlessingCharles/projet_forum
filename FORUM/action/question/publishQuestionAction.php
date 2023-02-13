<?php 
   require '../action/database.php';
    $errorMsg =null;
    $success =null;
        $user_email = $_SESSION['email'];
        $userInfo= $bdd-> prepare('SELECT nom_User, prenom_user FROM users WHERE email =?');
        $userInfo->execute(array($user_email));
        
    //validation di frmulaire
    if(isset($_POST['validate'])){
        if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['content']) ){
            
            $question_title =htmlspecialchars($_POST['titre']);
            $question_description =nl2br(htmlspecialchars($_POST['description']));
            $question_content =nl2br(htmlspecialchars($_POST['content']));
            $date_publication =date('d/m/Y H:m:s');
            $user_code = $_SESSION['codeUser'];
            $user_email = $_SESSION['email'];
            $user_pseudo = $_SESSION['pseudo'];

            //insere les infos dans la base de données
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO question( titre_quest, description_quest, 
                                                contenu_question, date_publication, email_user, code_auteur, pseudo) 
                                                VALUES(?,?,?,?,?,?,?) ');
            $insertUserOnWebsite->execute(array(
                $question_title, 
                $question_description, 
                $question_content, 
                $date_publication, 
                $user_email, 
                $user_code,
                $user_pseudo
            ));
                
            $success ="votre message a bien été publié dans le forum !";
        }else{
            $errorMsg="Veuillez remplir tous les champs svp !";
        }

        
    }
?>