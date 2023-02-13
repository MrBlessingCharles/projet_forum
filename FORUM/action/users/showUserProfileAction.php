<?php
    require '../action/database.php';

    $errorMsg= null;
    //Recuperer l'identifiant de l'utilisateur
    if(isset($_GET['codeUser']) AND !empty($_GET['codeUser'])){
        $idOfUser = $_GET['codeUser'];

        //verifier si l'identifiant existe
        $checkIfUserExist = $bdd->prepare('SELECT nom_User, prenom_user, pseudo_auteur FROM users WHERE codeUser = ?');
        $checkIfUserExist ->execute(array($idOfUser));

        //verifier si l identifiant a été trouvée
        if($checkIfUserExist->rowCount() >0){
            $userInfo = $checkIfUserExist->fetch();

            //recupere les informations de l utilsateur dans des variables propres
            $user_pseudo = $userInfo['pseudo_auteur'];
            $user_name = $userInfo['nom_User'];
            $user_first_name = $userInfo['prenom_user'];

            //recuperer les question de l utilsateur 
            $getHisQuestion = $bdd->prepare('SELECT * FROM question WHERE code_auteur=?');
            $getHisQuestion->execute(array($idOfUser));
            //$userQuestionInfo= $getHisQuestion->fetch();
        }else{
            $errorMsg="Aucun utilisateur n'a été trouvé !"; 
        }
    }else{
        $errorMsg="Aucun utilisateur n'a été trouvé !";
    }

?>