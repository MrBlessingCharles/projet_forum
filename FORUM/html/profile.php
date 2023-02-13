<?php
    require '../action/users/securityAction.php';
    require '../action/users/showUserProfileAction.php';
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('../include/header.php'); ?>
<body>
    <?php include('../include/navbar.php'); ?>
    
    <br>
    <div class="container">
        <?php if($errorMsg): ?>
            <div class="alert alert-danger">
                <?= $errorMsg ?>
            </div>
        <?php endif ?>  

        <?php if($getHisQuestion) { ?> 
            <div class="card">
                <div class="card-body bg-info">
                    <h3>
                        <i class="fa fa-user" aria-hidden="true" ></i>
                        @<?= $user_pseudo; ?></h3>
                    <hr>
                    <p><?= $user_name.' '. $user_first_name?></p>
                </div>
            </div>
            <br><br>
            <?php while($question = $getHisQuestion->fetch()){ ?>
                <div class="card">
                    <div class="card-header">
                        <?=  $question['titre_quest']  ?>
                    </div>
                    <div class="card-body">
                        <?=  $question['description_quest']  ?>
                    </div>
                    <div class="card-footer">
                        <small>publié par :
                            <?=  $question['pseudo'].' le '. $question['date_publication'] ?>
                        </small>
                    </div>
                </div> 
                <br>
        <?php 
            }
            } ?>    
    </div>
</body>
</html>