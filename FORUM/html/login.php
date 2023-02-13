<?php
    require '../action/users/loginAction.php';
    require '../action/users/securityAction.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../include/header.php" ?>
</head>
    
    <body>
       

        
        <div class="container-fluid ">
            
            <div class="row bg-cover text-warning">
                <h1>Blessing- Forum</h1>
            </div>

            <?php if($errorMsg): ?>
                <div class="alert alert-danger">
                    <p><?= $errorMsg ?></p>
                </div>
            <?php endif ?>
            
            <?php if($success): ?>
                <div class="msg_error">
                    <p><?= $success ?></p>
                </div>
            <?php else: ?>

            <div class="row formulaire2">
            <h1  class="text-white text-center">Connectez-vous à votre compte</h1>
            <h6 class="text-white text-center">En toute sesécurité !!!</h6>
            <form method="POST" class="text-primary p-5">
                <div class="form-group">
                    <label for="exampleInputEmail1">email :</label>
                    <input name="email" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter votre email">
                </div>
               
                <div class="form-group pt-3">
                    <label for="exampleInputPassword1">Mot de passe :</label>
                    <input type="password" name="pswd" class="form-control"  placeholder="Entrer mot de passe">
                </div>
               
                <div class="lien-bouton2 pt-3 text-center">
                    <button type="submit" name="validate" class="btn btn-primary btn-lg ">Se connecter</button>
                    <a href="signup.php" id="lien2">
                        <p class="text-primary" >Je n'ai pas de compte, je m'inscris</p>
                    </a>
                </div>
                    
            </form>
            </div>
            <?php endif  ?>
        </div>


        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.min.js"></script>
</body>
</html>