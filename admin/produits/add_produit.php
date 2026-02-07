<?php
 include '../../fonctions.php' ;

$dbb = conx();

if(isset($_POST) && !empty($_POST)){
    if($_POST['titre'] == '' || $_POST['prix']==''  || $_FILES['image']['name']==''  ){
        $msg = ' <div class="alert alert-danger" role="alert">Verifier vos données!</div>';
         }else{
 
    $img = pathinfo($_FILES['image']['name']);
 
  move_uploaded_file($_FILES['image']['tmp_name']
  , '../uploads/' .basename($_FILES['image']['name']));
 
    
    
  
      $res = $dbb->prepare('insert into produits(titre,prix,image) values(?,?,?)  ');
      $insert = $res->execute([
           $_POST['titre'],  $_POST['prix'],   
           basename($_FILES['image']['name'])
      ]);
      $msg = ' <div class="alert alert-success" role="alert">Enregistre avec succes.</div>';

    }
  }
  
?>
<?php include '../header.php' ?>

      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        
        <div class="row">
       
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
              <?php 
if(isset($msg) && $msg != ''){
  echo $msg;

}

?>
              <form method="post" action="" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom </label>
                    <input type="text" 
                 
                    class="form-control" name="titre"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Prix </label>
                    <input type="number" class="form-control" 
                    name="prix"
                    id="exampleInputPassword1">
                  </div>
               

                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" class="form-control" 
                    name="image"
                    id="exampleInputPassword1"
                    
                    >
                  </div>
                   <input type="submit"  value="Enregistrer"
                   class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                   > 
                  
                </form>
              </div>
            </div>
          </div>
          </div>
             
      </div>
<?php include '../footer.php' ?>