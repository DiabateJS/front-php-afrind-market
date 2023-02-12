<header>
  <br>
  <img src="images/afrind_market.jpeg" style="width:150px; height: 150px;margin-bottom:15px;">
  <br>
  <?php
  if (isset($_SESSION["user"]) && $_SESSION["user"] !== ""){
  ?>
    <span><i class="fa fa-user" aria-hidden="true"></i> Utilisateur : <?= $_SESSION["user"] ?> - <i class="fa fa-cart-plus" aria-hidden="true"></i> <a href="panier.php?userid=<?= $_SESSION["userid"] ?>">Mon Panier</a> - <i class="fa fa-cog" aria-hidden="true"></i> <a href="profil.php?id=<?= $_SESSION["userid"] ?>">Mon Profil</a> - <i class="fa fa-user-times" aria-hidden="true"></i> <a href="deconnexion.php">Deconnexion</a></span><br>
  <?php 
  }else{
  ?>
    <span><i class="fa fa-user" aria-hidden="true"></i> Utilisateur : Inconnu - <i class="fa fa-user-circle" aria-hidden="true"></i> <a href="connexion.php">Connexion</a></span><br>
  <?php
  }
  ?>
  
<nav> 
<ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
  <li class="nav-item" role="presentation">
    <button class="nav-link <?= $page == "articles" ? "active" : "" ?> rounded-5" id="articles-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Articles</button>
  </li>
  <?php
  if (isset($_SESSION["profil"]) && $_SESSION["profil"] == "admin"){ 
  ?>
  <li class="nav-item" role="presentation">
    <button class="nav-link <?= $page == "article" ? "active" : "" ?> rounded-5" id="article-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Nouveau</button>
  </li>
  <?php
  }
  ?>
  <li class="nav-item" role="presentation">
    <button class="nav-link <?= $page == "contact" ? "active" : "" ?> rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contact</button>
  </li>
  <?php
  if (isset($_SESSION["profil"]) && $_SESSION["profil"] == "admin"){ 
  ?>
  <li class="nav-item" role="presentation">
    <button class="nav-link <?= $page == "administration" ? "active" : "" ?> rounded-5" id="admin-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Administration</button>
  </li>
  <?php
  }
  ?>
</ul>
<br>
</nav>
</header>
<script>
    let urlBase = 'http://localhost/front-php-afrind-market/';
    document.getElementById("articles-tab2").onclick = function(){
        window.location.href = urlBase;
    }
    <?php
    if (isset($_SESSION["profil"]) && $_SESSION["profil"] == "admin"){ 
    ?>
    document.getElementById("article-tab2").onclick = function(){
        window.location.href = urlBase + 'nouveau.php';
    }
    <?php
    }
    ?>
    document.getElementById("contact-tab2").onclick = function(){
        window.location.href = urlBase + 'contact.php';
    }
    <?php
    if (isset($_SESSION["profil"]) && $_SESSION["profil"] == "admin"){ 
    ?>
    document.getElementById("admin-tab2").onclick = function(){
        window.location.href = urlBase + 'administration.php';
    }
    <?php
    }
    ?>
</script>