<?php 

    require '../action/users/securityAction.php';
    require '../action/question/publishQuestionAction.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication de questions</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <?php require '../include/navbar.php'  ?>
    <h3 class="text-center p-4">PUBLICATION DES QUESTIONS</h3>
        <?php while($info=$userInfo->fetch()){     ?> 
           <div class="text-center">
                <h4 align-items>Salut 
                    <span style="color: blue;"> <?= $info['nom_User'], ' ', $info['prenom_user'] ?> </span>
                    Nous sommes très ravi de vous revoir
                </h4>    
           </div>  
        <?php }  ?>
<div class="container ">
            <?php if($errorMsg): ?>
                <div class="alert alert-danger"><?= $errorMsg ?></div>

            <?php endif ?>

            <?php if($success): ?>
                <div class="alert alert-danger"><?= $success ?></div>
            <?php else: ?>

            <div class="row ">
            <form method="POST" class="p-5">
                <div class="form-group form-inline">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question </label>
                    <input type="text" name="titre" class="form-control"  placeholder="Le titre....">
                </div>

                <div class="form-group pt-4">
                    <label for="exampleInputPassword1">Description de la question</label>f
                    <textarea type="text" name="description" class="form-control"  placeholder="Entrer la description...."></textarea>
             
                </div>
                <div class="form-group pt-4">
                    <label for="exampleInputPassword1">contenu de la question</label>
                    <textarea type="text" name="content" class="form-control"  placeholder="Entrer contenu"></textarea>
                </div>

                <div class="form-group pt-3">
                    <button  type="submit"  class="btn btn-primary btn-lg pt-2 "class="form-control" name="validate">Publier la question</button>
                </div>  
               
            </form>
            </div>
            
        </div>
        <?php endif ?>
</body>
</html>