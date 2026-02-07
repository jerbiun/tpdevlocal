
<?php
 include '../fonctions.php' ;
 $dbb = conx();
 $msg ='';
 if(isset($_POST) && !empty($_POST)){
  
        if($_POST['nom'] == '' || $_POST['email']=='' || $_POST['pwd']==''){
        $msg = ' <div class="alert alert-danger" role="alert">Verifier vos données!</div>';
        }else{
          $user = $dbb->prepare('select * from admin where email=? limit 1');
$user->execute( [$_POST['email'] ]);
//echo '<pre>';var_dump($user->fetch());echo'</pre>';die();
if($user->fetch()   ){
  $msg = ' <div class="alert alert-danger" role="alert">Vous etes deja inscrit!</div>';

}else{
          $res = $dbb->prepare('insert into admin(nom,email,password) values(?,?,?)  ');
            $insert = $res->execute([
                $_POST['nom'],  $_POST['email'],  md5($_POST['pwd'])
            ]);
            mail($_POST['email'],'Enregistrer avec succés','Enregistrer avec succés');
            $msg = ' <div class="alert alert-success" role="alert">Enregistre avec succes. 
            Vous pouvez Se Connecter</div>';
        }
      }
  
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Projet PFE TSIG 2</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <h2>PRojet PFE TSIG 2</h2>
                </a>
                 <form method="post" action="">
                  <?php 
 
  echo $msg;

 

?>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Nom et Prénom</label>
                    <input name="nom" type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input name="pwd" type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Valider"> 

                   <div class="d-flex align-items-center justify-content-center">
                     <a class="text-primary fw-bold ms-2" href="./login.php">Se Connecter</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>