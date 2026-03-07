<?php
 
 include '../includes/fonctions.php' ;

$dbb = conx();

$res = $dbb->prepare('select * from admin');
  $res->execute();
?> 
<?php include 'header.php' ?>

      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        
        <div class="row">
       
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Bienvenue 
              <?php 
            
                echo $_SESSION['user']['email']; ?>
              </h5>
              </div>
            </div>
          </div>
          </div>
             
      </div>
<?php include 'footer.php' ?>