<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>sistema academico</title>
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
<link rel="stylesheet" href="<?php BASE_URL;?>views/assets/css/modalform.css">
<!-- Nepcha Analytics (nepcha.com) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script> const base_url= "<?php echo BASE_URL;?>";</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
  
  <body class="g-sidenav-show  bg-gray-100">
      <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" target="_blank">
      <img src="<?php BASE_URL;?>views/assets/img/LOGO-MERCEDES.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white">SISTEMA ACADEMICO</span>
    </a>
  </div>


  <hr class="horizontal light mt-0 mb-2">


  
<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      

 
<li class="nav-item">
  <a class="nav-link text-white " href="<?php BASE_URL;?>estudiantes">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="fas fa-home me-2"></i>
      </div>
    
    <span class="nav-link-text ms-1">Estudiantes</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-white " href="<?php BASE_URL;?>usuarios">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="fas fa-users me-2"></i>
      </div>
    
    <span class="nav-link-text ms-1">Usuarios</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-white " href="<?php BASE_URL;?>notas">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="fas fa-book me-2"></i>
      </div>
    
    <span class="nav-link-text ms-1">Notas</span>
  </a>
</li>
  
<li class="nav-item">
  <a class="nav-link text-white " href="<?php BASE_URL;?>asistencia">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="fas fa-calendar-check me-2"></i>
      </div>
    
    <span class="nav-link-text ms-1">Asistencia</span>
  </a>
</li>

  
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Paginas de cuenta</h6>
    </li>
  
<li class="nav-item">
  <a class="nav-link text-white " href="<?php BASE_URL;?>perfil">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="fas fa-user-circle me-2"></i>
      </div>
    
    <span class="nav-link-text ms-1">Cuenta</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-white" onclick="cerrar_sesion();">  
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="fas fa-sign-out-alt me-2"></i>
      </div>
    <span class="nav-link-text ms-1">cerrar sesion</span>
  </a>
</li>

          

        
      
    </ul>
  </div>
  
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
      <a class="btn bg-gradient-primary w-100" href="https://ielasmercedeshuanta.limon-cito.com" type="button">Pagina web</a>
    </div>
    
  </div>
  
</aside>

<main class="main-content border-radius-lg ">
        <!-- Navbar -->

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Inicio</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">SISTEMA ACADEMICO</h6>
      
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          
          <div class="input-group input-group-outline">
            <label class="form-label">Buscar...</label>
            <input type="text" class="form-control">
          </div>
          
      </div>
      <ul class="navbar-nav  justify-content-end">
        <li class="nav-item d-flex align-items-center">
          <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://ielasmercedeshuanta.limon-cito.com">Pagina web</a>
        </li>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0">
            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
          </a>
        </li>
        
        <li class="nav-item d-flex align-items-center">
          <a  class="nav-link text-body font-weight-bold px-0" onclick="cerrar_sesion();">
            <i class="fa fa-user me-sm-1"></i>
            
            <span type="button" class="d-sm-inline d-none">cerrar sesion</span>
            
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- End Navbar -->

