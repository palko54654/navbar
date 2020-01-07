<?php 
include 'partials/header.php'; 
include 'partials/nav.php';
?>



<div class="container">
<h1>Toto je kontaktný formulár.</h1>
<h3>Ak máš nejakú otázku, alebo pripomienku napíš nám</h3>

<form action="mail.php" method="post">
<div class="form-group">
    <label>Meno a priezvisko</label>
    <input type="text" class="form-control"  placeholder="Meno a priezvisko" name="name">
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control"  placeholder="name@example.com" name="email">
  </div>
  
  <div class="form-group">
    <label>Example textarea</label>
    <textarea class="form-control"  rows="3" placeholder="Vaša správa" name="message"></textarea>
  </div>

  <button type="submit" class="btn btn-info">Odoslať správu</button>
</form>
</div>


<?php 
include 'partials/footer.php';

?>


