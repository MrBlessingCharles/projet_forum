<?php 
    require '../action/question/getInfoEditquestionAction.php'; 
    require '../action/question/editQuestionAction.php'; 
    require '../action/users/securityAction.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>
    <?php require 'navbar.php'; ?>


<div class="container ">
    <?php if($errorMsg): ?>
        <br><br>
        <div class="alert alert-danger"><?= $errorMsg ?></div>
    <?php endif ?>

    <?php if(isset($question_content)){
    ?>
    <h3 class="text-center p-4">MODIFIER VOS QUESTIONS</h3>
    <div class="row ">
        <form method="POST" class="p-5">
            <div class="form-group form-inline">
                <label for="exampleInputEmail1" class="form-label">Titre de la question </label>
                <input type="text" name="titre" class="form-control"  value="<?=  $question_title  ?>">
            </div>

            <div class="form-group pt-4">
                <label for="exampleInputPassword1">Description de la question</label>
                <textarea type="text" name="description" class="form-control"  ><?= $question_description ?></textarea>
        
            </div>
            <div class="form-group pt-4">
                <label for="exampleInputPassword1">contenu de la question</label>
                <textarea type="text" name="content" class="form-control" ><?= $question_content ?></textarea>
            </div>

            <div class="form-group pt-3">
                <button  type="submit"  class="btn btn-primary btn-lg pt-2 "class="form-control" name="validate">Modifier la question</button>
            </div>  
        
        </form>
    </div>

    <?php
        } ?>      
            
            
</div>

        
</body>
</html>