<?php 
include 'header.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <a class="navbar-brand" href="index.php">CLsearch </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a href="index.php" class="nav-link">Domov<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link">Onás</a>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produkty
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="products.php"><strong>Muži</strong></a>
            <a class="dropdown-item" href="products.php"><strong>Ženy</strong></a>
            <a class="dropdown-item" href="products.php"><strong>Deti</strong></a>
            <a class="dropdown-item" href="contactus.php"><strong>Napíš nám</strong></a>
          </div>
        </li>
        
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Hľadaj..." aria-label="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Vykonaj</button>
      </form>
    </div>
  </nav>
