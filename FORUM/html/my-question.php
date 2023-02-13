
    <?php 
    
    require '../action/users/securityAction.php';
    require '../action/question/myQuestionAction.php';
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include('../include/header.php'); ?>
    </head>
<body>
    <?php require '../include/navbar.php'; ?>

    <?php 
     while($question = $getAllMyQestion->fetch()){
        ?>
            <div class="container pt-4 justify-content-center">
            <div class="card me-4 " style="width: 45rem;">
                <h5 class="card-header text-center">
                    <a href=" article.php?num_quest=<?= $question['num_quest'] ; ?>">
                        <?= $question['titre_quest'] ;?>
                    </a>
                </h5>
                <div class="card-body">

                    <p><?= $question['description_quest']; ?></p>
                    <small><?= $question['date_publication']; ?></small> <br><br>
                    <a href=" article.php?num_quest=<?= $question['num_quest'] ; ?>" class="btn btn-primary me-3">Acceder à l article </a>
                    <a href="../include/edition_question.php?num_quest=<?= $question['num_quest']?>" class="btn btn-warning me-3">Modifier la question </a>
                    <a href="../action/question/deleteQuestionAction.php?num_quest=<?= $question['num_quest']?>" class="btn btn-danger me-4">Supprimer la question </a>
                    
                </div>
            </div>
            </div>


        <?php
     }
    ?>
</body>
</html>