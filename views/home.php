

<!----------------------------------------------------- contenido-----------------------------....-->
<div class="container-fluid py-4">
                

<h6>Bienvenido al sistema de Academico .. <span style="color:red"> <?php echo $_SESSION['sesion_venta_nombres'];?></span><a  href="">  Visite nuestra pagina</a>.</h6>
<div class="row">
  <div class="col-12 position-relative z-index-2">
    <div class="card card-plain mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="d-flex flex-column h-100">
  <h2 class="font-weight-bolder mb-0">Sistema academico</h2>
</div>

          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-sm-5">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">weekend</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">Notas registradas</p>
      <h4 class="mb-0">
        <?php
        $sqli = "SELECT count(*) as suma FROM calificacion";
        $res = $conexion->query($sqli);
        $row = $res->fetch_assoc();
        echo $row['suma'];
        if ($conexion->more_results()) {
          while ($conexion->next_result());
      }
        ?>
      </h4>
    </div>
  </div>

  <hr class="dark horizontal my-0">
  <div class="card-footer p-3">
    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>De estudiantes</p>
  </div>
</div>

        <div class="card  mb-2">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">leaderboard</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">Promedio mas alto</p>
      <h4 class="mb-0">20</h4>
    </div>
  </div>

  <hr class="dark horizontal my-0">
  <div class="card-footer p-3">
    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>Que el mes pasado</p>
  </div>
</div>

      </div>
      <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">store</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize ">Estudiantes</p>
      <h4 class="mb-0 ">
        <?php
           $sqli = "SELECT count(*) as suma FROM estudiante";
           $ress = $conexion->query($sqli);
           $row = $ress->fetch_assoc();
           echo $row['suma'];
           if ($conexion->more_results()) {
            while ($conexion->next_result());
        }
        ?>
      </h4>
    </div>
  </div>

  <hr class="horizontal my-0 dark">
  <div class="card-footer p-3">
    <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">+2% </span>Que el año pasado</p>
  </div>
</div>

        <div class="card ">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">person_add</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize ">Usuarios</p>
      <h4 class="mb-0 ">
        <?php
        $sqli = "SELECT count(*) as sume FROM usuario";
        $resul = $conexion->query($sqli);
        $row = $resul->fetch_assoc();
        echo $row['sume'];
      $conexion->close();
        ?>
      </h4>
    </div>
  </div>

  <hr class="horizontal my-0 dark">
  <div class="card-footer p-3">
    <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">90% </span>Con respecto a estudiantes</p>
  </div>
</div>

      </div>
    </div>

  </div>
</div>

<!-- ..............................................footer...............................................-->

<footer class="footer py-4  ">
footer
</footer>

</div>

         
</main>
      
 <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-gear py-2"></i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Configuracionded la pagina</h5>
          <p>Vea nuestras opciones de panel.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Colores de la barra lateral</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>

        <!-- Sidenav Type -->
        
        <div class="mt-3">
          <h6 class="mb-0">Tipo de navegación lateral</h6>
          <p class="text-sm">Elige entre 2 tipos diferentes de navegación lateral.</p>
        </div>

        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Oscuro</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">Claro</button>
        </div>
        <!-- Navbar Fixed -->
        
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Barra de navegación</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        

        
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Claro/Oscuro</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
          
        </div>
      </div>
    </div>

<!--   Core JS Files   -->
<script src="<?php BASE_URL;?>views/assets/js/core/popper.min.js"></script>
<script src="<?php BASE_URL;?>views/assets/js/core/bootstrap.min.js"></script>
<script src="<?php BASE_URL;?>views/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php BASE_URL;?>views/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?php BASE_URL;?>views/assets/js/plugins/chartjs.min.js"></script>
<script src="<?php BASE_URL;?>views/assets/js/material-dashboard.min.js?v=3.1.0"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="./assets/js/material-dashboard.min.js?v=3.1.0"></script>
  </body>

</html>
