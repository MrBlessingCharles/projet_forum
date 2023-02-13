
<?php   require '../action/users/securityAction.php';
        require '../action/question/showArticleContentAction.php'; 
        require '../action/question/publishAnswerAction.php'; 
        require '../action/question/showAllAnswersAction.php'; 
        ?>

<!DOCTYPE html>
<html lang="en">
    <?php include('../include/header.php'); ?>
<body>
    <?php include('../include/navbar.php'); ?>  
    <br><br>
    <div class="container">
        <?php if($errorMsg): ?>
            <div class="alert alert-danger text-center">
                <?= $errorMsg; ?>
            </div>
        <?php endif ?>
        <?php 
            if(isset($question_date_publication) ){
            ?>
               <section class="show-content">
                    <h3>
                        <?= $question_title; ?>
                    </h3>
                    <hr>
                    <p>
                        <?=$question_content; ?>
                    </p>
                    <hr>
                    <small>
                        Ecrit par :
                        <?='<a href="profile.php?codeUser='.$question_code_auteur.'">'.$question_pseudo_auteur.'</a> Le '.$question_date_publication; ?>
                    </small>
               </section>
               <br>
               <section class="show-answers">
                   <form action="" class="form-group" method="POST">
                      <div class="mb-3">
                        <label for="" class="form-label">Reponse : </label>
                        <textarea  name="answer" id=""  class="form-control mb-3"></textarea>
                        <button type="submit" name="validate" class="btn btn-warning">Répondre</button>
                      </div>
                   </form><br><br>
                   <?php while($answer = $getAllAnswersOfThisQuestion->fetch()){    ?>
                        <div class="card">
                            <div class="card-header bg-warning "> Reponse de :
                                <a href="profile.php?codeUser=<?= $answer['code_auteur'] ?>"> 
                                    <?= $answer['pseudo_auteur']; ?>
                                </a>
                            </div>
                            <div class="card-body">
                                <?= $answer['contenu']; ?>
                            </div>
                        </div>
                        <br>
                    <?php
                   }
                   ?>
               </section>
            <?php
        }
        ?>
      
    </div>

  
</body>
</html>