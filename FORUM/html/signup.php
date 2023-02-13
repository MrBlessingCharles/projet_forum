<?php
    require '../action/users/signupAction.php';
    require '../action/users/securityAction.php';
?>
<?php
   
?>
<!DOCTYPE html>
<html lang="en">
<?php include "../include/header.php" ?>
    
    <body>
        <div class="container-fluid h-50">
            <?php if($errorMsg): ?>
                <div class="alert alert-danger">
                    <p><?= $errorMsg ?></p>
                </div>
            <?php endif ?>
            
            <?php if($success): ?>
                <div class="alert alert-warning">
                    <p><?= $success ?></p>
                </div>
            <?php else: ?>
            <div class="row ">
                <div class="col-lg-6 " id="signup">
                    <h3 id="inscris">Inscrivez-vous gratuitement !</h3>
                    <h1 class="forum mb-3">Blessing-Forum</h1>
                    <p>Trouvez des réponses devient un réel plaisir !</p>
                </div>
                    <div class="col-lg-6 col-sm-12 " id="formulaire">
                       <h1 class="title">INSCRIVEZ-VOUS !</h1>
                        <form method="POST" class="p-5 text-white">
                            <div class="form-group form-inline">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control"  placeholder="votre email...."></div>
                            
                            <div class="form-group pt-4">
                                <label for="exampleInputPassword1">pseudo :</label>
                                <input name="pseudo" type="text" class="form-control"  placeholder="Entrer votre pseudo">
                            </div>

                            <div class="form-group pt-4">
                                <label for="exampleInputPassword1">Nom utilisateur :</label>
                                <input name="first-name" type="text" class="form-control"  placeholder="Entrer votre nom">
                            </div>

                            <div class="form-group pt-4">
                                <label for="exampleInputPassword1">prenom utilisateur :</label>
                                <input type="text" name="name" class="form-control"  placeholder="Entrer votre prenom">
                            </div>

                            <div class="form-group pt-4">
                                <label for="exampleInputPassword1">Mot de passe :</label>
                                <input type="password" name="pswd" class="form-control"  placeholder="Entrer mot de passe">
                            </div>
                        
                            <div class="lien-bouton pt-4 text-center">
                                <button type="submit" name="validate" class="btn btn-primary btn-lg ">S'inscrire</button>
                                
                                <a href="login.php"  id="lien2">
                                    <p class="text-white">Je n'ai dejà un compte, je me connecte</p>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif  ?>
        </div>

<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>
</body>
</html>