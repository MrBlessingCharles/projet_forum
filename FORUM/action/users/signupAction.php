<?php
    require '../action/database.php';
 
  
//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errorMsg =null ;
$success =null ;
    if(isset($_POST['validate'])){
        if(!empty($_POST['email']) AND !empty($_POST['first-name']) AND !empty($_POST['name']) AND !empty($_POST['pswd']) AND !empty($_POST["pseudo"]) ){
            $user_email =htmlspecialchars($_POST['email']);
            $firts_name_user =htmlspecialchars($_POST['first-name']);
            $name_user =htmlspecialchars($_POST['name']);
            $pswd_user =password_hash($_POST['pswd'], PASSWORD_DEFAULT);
            $user_pseudo =htmlspecialchars($_POST['pseudo']);
            $cle = rand(1000000,9000000);

            //verification de l'email
            $to ='koffikouadiocharles285@gmail.com';
            $subj='hello';
            $mess='ceci est un essage envoyé depuis le site de mr Blessing';
      
            if(filter_var($user_email,FILTER_VALIDATE_EMAIL)){
                
              $email = null;  
            }else{
                $error= 'email invalide !';
            }
           
           // mail($to,$subj, $mess);  
            $checkIfUserExist = $bdd->prepare('SELECT email FROM users WHERE email= ? ');
            $checkIfUserExist->execute(array($user_email)); 

            if($checkIfUserExist->rowCount()==0){
                //On insere les donnees de l utilisateur
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(email,
                                                                        nom_User, 
                                                                        prenom_user, 
                                                                        motPasse_user, 
                                                                        pseudo_auteur,
                                                                        cle,
                                                                        confirme_cle)        
                                                     VALUES(?,?,?,?,?,?,?) ');
                $insertUserOnWebsite->execute(array($user_email, 
                                                    $firts_name_user, 
                                                    $name_user, 
                                                    $pswd_user, 
                                                    $user_pseudo,
                                                    $cle,
                                                    0));
                //on recupere les infos de l utilisateur deja inscris

                $getInfoOfUser= $bdd->prepare('SELECT codeUser, 
                                                      email, 
                                                      nom_User, 
                                                      prenom_user,  
                                                      pseudo_auteur
                            FROM users WHERE email=? AND nom_User=? AND prenom_user=? AND pseudo_auteur=?');
                $getInfoOfUser->execute(array($user_email, $firts_name_user, $name_user, $user_pseudo));

                //on stocke les donnees dans un tableau
                $userInfo =  $getInfoOfUser->fetch();

                $_SESSION['auth']= true;
                $_SESSION['codeUser']=  $userInfo['codeUser'];
                $_SESSION['email']= $userInfo['email'];
                $_SESSION['first-name']=$userInfo['nom_User'];
                $_SESSION['name']=$userInfo['prenom_user'];
                $_SESSION['pseudo']=$userInfo['pseudo_auteur'];
            
                header('Location: index.php');
                
            }else{
                //code
                $errorMsg = "L'utilisateur existe déja sur le site, veuillez créer un autre compte !";
            }

        }else{
            $errorMsg = "veuillez completez tous les champs svp !";
        }
    }
?>