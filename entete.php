<ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
  <li class="nav-item" role="presentation">
    <button class="nav-link <?= $page == "articles" ? "active" : "" ?> rounded-5" id="articles-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Articles</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link <?= $page == "article" ? "active" : "" ?> rounded-5" id="article-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Nouveau</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contact</button>
  </li>
</ul>
<script>
    let urlBase = 'http://localhost:8888/front-php-afrind-market/';
    document.getElementById("articles-tab2").onclick = function(){
        window.location.href = urlBase;
    }
    document.getElementById("article-tab2").onclick = function(){
        window.location.href = urlBase + 'nouveau.php';
    }
</script>