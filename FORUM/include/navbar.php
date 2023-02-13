<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>barre de navigation</title>
    <meta charset="UTF-8">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blessing-Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link "  href="../html/index.php">Question</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../html/publish-question.php">Publier une question</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../html/my-question.php">voir les questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../html/profile.php?codeUser=<?= $_SESSION['codeUser'] ?>">Mon profile</a>
        </li>


        <?php if(isset($_SESSION['auth'])){
          ?> 
            <li class="nav-item">
              <a  class="nav-link" href="../action/users/logOut.php">Deconnexion</a>
            </li>
        <?php 
           }   ?>
      </ul>
      
    </div>
  </div>
</nav>
</body>
</html>