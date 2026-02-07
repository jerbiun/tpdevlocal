<?php
 include '../../fonctions.php' ;

$dbb = conx();

$res = $dbb->prepare('select * from produits');
  $res->execute();
?>
<?php include '../header.php' ?>

      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        
        <div class="row">
       
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
              <a href="add_produit.php" class="btn btn-primary m-1">
                  Ajouter Produit</a> 

                  <?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $ress = $dbb->prepare('delete from produits where id=? ');
$insert = $ress->execute([ $_GET['id'] ]);
  echo '<div class="alert alert-success" role="alert">
  Supprime avec succes!
</div>';
$res->execute();
}

?>
            <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                      <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Image</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nom</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Prix</h6>
                        </th>
                      
                        <th class="border-bottom-0">
                          actions
</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($res->fetchAll() as $row){ ?>
                      <tr>
                        <td class="border-bottom-0"> 
                            <img src="../uploads/<?php echo $row['image'] ?>" style="width:100px">
                    </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">
                            <?php echo $row['titre']; ?>
                            </h6>
                                                    
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">
                          <?php echo $row['prix']; ?>
                          
                          </p>
                        </td>
                     
                        <td class="border-bottom-0">
                          <a href="edit_produit.php?id=<?php echo $row['id'] ?>">Modifier</a>
                          <a href="produits.php?action=delete&id=<?php echo $row['id'] ?>">Supprimer</a>
                        </td>
                      </tr> 
                         <?php } ?>                  
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
          </div>
             
      </div>
<?php include '../footer.php' ?>