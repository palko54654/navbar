<?php 
include 'partials\nav.php';
include 'partials\header.php';
      
?>
    <body>
   <div class="container">
   <div class="d-flex flex-row">
            <div class="card" style="width: 18rem;">
                <img src="img/image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="show.php" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>      

        </div>
   </div>

  
   
    <?php
    require('config/config.php');
        mb_internal_encoding("UTF-8");
    $sql = mysqli_query($db, 'SELECT * FROM produkty WHERE PRODUCTNAME LIKE "%bunda%" ORDER BY ID DESC LIMIT 3') ;
    while($data = mysqli_fetch_assoc($sql))
    {
    

    echo '<div class="product_box">';
      echo '<a href="productdetail.php?x=' .$data["PRODUCTNAME"]. '"><img src="' .$data["IMGURL"]. '" alt="' .$data["PRODUCTNAME"]. '"   width="200" height="200"></a>';

      echo '<p>'.$data["PRODUCTNAME"]. '</p>';
      echo '<p>'.$data["PRICE_VAT"]. '€</p>';   
      echo '<a href="'.$data["URL"].'" class="degail"></a>';


      echo '</div>';  
    }  
?>      

   
   
   

   
        



    </body>
    
    
   

     

   

    <?php include ('partials/footer.php') ?>

    