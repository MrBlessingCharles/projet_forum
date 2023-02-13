<?php   require ('../action/users/securityAction.php');
        require '../action/question/showAllQuestionAction.php'; 
    
        ?>

<!DOCTYPE html>
<html lang="en">
    <?php require '../include/header.php'; ?>
<body>
    <?php require '../include/navbar.php'  ?>
    <br>
    <div class="container">
        <h2 class="text-center mb-5 ">RECHERCHE DE QUESTIONS</h2>
        <form method="GET" action="">
            <div class="form-group row me-5 justify-content-center">
                <div class="col-2"></div>
                <div class="col-7">
                    <input type="search" name="search" id="" class="form-control mb-3">
                </div>
                <div class="col-3">
                    <button class="btn btn-warning">Rechercher</button>
                </div>
                    
            </div>
        </form>
        <br><br>
        <?php
            while($question=  $getAllQuestion->fetch()){
         ?>
            <div class="card">
                <div class="card-header bg-info ">
                    <a href=" article.php?num_quest=<?= $question['num_quest'] ; ?>">
                        <?= $question['pseudo'] ?>
                    </a>
                </div>
                <div class="card-body">
                    <?= $question['description_quest'] ?>
                </div>
                <div class="card-footer">
                    <small>publié par :</small>
                    <a href="profile.php?codeUser=<?= $_SESSION['codeUser']; ?>"><?= $question['pseudo'] ?></a>
                    <small>date publication :</small>
                    <?= $question['date_publication'] ?>
                </div>
            </div>
            <br><br>
         <?php
            }
            ?>
    </div>
</body>
</html>