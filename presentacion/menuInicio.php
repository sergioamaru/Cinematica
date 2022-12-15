<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand"
		href="index.php?pid=<?php echo base64_encode("presentacion/inicio.php")?>"><span
		class="fas fa-video" data-toggle="tooltip" data-original-title="Inicio"></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item">
        <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/inicio/catalogo1.php")?>">Catalogo</a>
      </li>
    </ul>
    <span><li class="nav-item">
      <?php include 'presentacion/modalAutenticar.php'?>
      </li></span>
      <span><li class="nav-item">
      <?php include 'presentacion/modalRegistrar.php'?>
      </li></span>
    
  </div>
</nav>