
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistema academico </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?php BASE_URL;?>views/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?php BASE_URL;?>views/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php BASE_URL;?>views/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <script> const base_url= "<?php echo BASE_URL;?>";</script>
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <!--------------------------Contenido------------------------------->
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Iniciar Sesión</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
              <form role="form" class="text-start" id="frm_login" >
               <div class="input-group input-group-outline my-3">
                 <input type="text" class="form-control" name="usuario" id="usuario" placeholder="usuario" required>
               </div>
               <div class="input-group input-group-outline mb-3">
                 <input type="password" class="form-control" name="password" id="password" placeholder="contraseña" required>
               </div>
               <div class="text-center">
                 <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Iniciar Sesión</button>
               </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--------------------------------------------Pie de pagina--------------------------------->
      <footer class="footer position-absolute bottom-2 py-2 w-100">
Pie de pagina
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="<?php echo BASE_URL;?>views/js/functions_login.js"></script>
</body>

</html>