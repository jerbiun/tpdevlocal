<?php
 include '../../fonctions.php' ;

$dbb = conx();

if(isset($_POST) && !empty($_POST)){
    if($_POST['titre'] == '' || $_POST['prix']==''     ){
        $msg = ' <div class="alert alert-danger" role="alert">Verifier vos données!</div>';
         }else{
 if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ''){
        $img = pathinfo($_FILES['image']['name']);
 
  move_uploaded_file($_FILES['image']['tmp_name']
  , '../uploads/' .basename($_FILES['image']['name']));
  $nameimg = basename($_FILES['image']['name']);
 }else{
  $nameimg = $_POST['img'];

 }

 
    
    
  
      $res = $dbb->prepare('update produits set titre=?,prix=?,image=? where id=? ');
      $insert = $res->execute([
           $_POST['titre'],  $_POST['prix'],  $nameimg,$_GET['id']
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
$ress = $dbb->prepare('select * from produits where id=?');
 $ress->execute([ $_GET['id'] ]);
$row = $ress->fetch(); 
?>
              <form method="post" action="" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom </label>
                    <input type="text" 
                 value="<?php echo $row['titre'] ?>" 
                    class="form-control" name="titre"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Prix </label>
                    <input type="number" class="form-control" 
                    name="prix"
                    value="<?php echo $row['prix'] ?>" 
                    id="exampleInputPassword1">
                  </div>
               

                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" class="form-control" 
                    name="image"
                    id="exampleInputPassword1"
                   
                    >
                    <input type="hidden" value="<?php echo $row['image'] ?>" name="img">
                    <img src="../uploads/<?php echo $row['image'] ?>" style="width:100px">
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