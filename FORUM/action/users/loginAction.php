<?php

    require '../action/database.php';

    
    $errorMsg =null ;
    $success =null ;
        if(isset($_POST['validate'])){
        if(!empty($_POST['email'])  AND !empty($_POST['pswd']) ){
            
            $user_email =htmlspecialchars($_POST['email']);
            $pswd_user =htmlspecialchars($_POST['pswd']);

            //verification de l'email
            if(filter_var($user_email,FILTER_VALIDATE_EMAIL)){
                
                $email = null;  
              }else{
                  $error= 'email invalide !';
              }
            
            $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE email= ? ');
            $checkIfUserExist->execute(array($user_email));
            $userInfo =$checkIfUserExist->fetch();

            //verification si l email entrée existe dans la BDD
            if($userInfo){
                $passwordHash = $userInfo['motPasse_user'];

                //on verifie si le mot de passe entré correspond à celui de la base de donnee
                if(password_verify($pswd_user, $passwordHash )){
                    //authentifie l utilisateur et stocke ses données dans les var de session
                    $_SESSION['auth']= true;
                    $_SESSION['codeUser']=  $userInfo['codeUser'];
                    $_SESSION['email']= $userInfo['email'];
                    $_SESSION['first-name']=$userInfo['nom_User'];
                    $_SESSION['name']=$userInfo['prenom_user'];
                    $_SESSION['pseudo']=$userInfo['pseudo_auteur'];

                    //redirige l utilisateur vers la page d accueil
                    header('Location: index.php');

                }else{
                    $errorMsg = "Mot de passe incorrect !";
                } 
              
        }else{
            $errorMsg = "Erreur d'email ou de mot de passe veuillez ressayez! !";
        }
    }else{
        $errorMsg = "veuillez completez tous les champs svp !";
    }
}
?>