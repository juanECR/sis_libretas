
    <!-- ------------------------------contenido--------------------------- -->
    <div class="container-fluid py-4">
  
      <!----------------------------------------------------Historial---------------------------->
    <div class="col-md-3 ">
       <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#historyModal">
        Ver Historial
        </button>
    </div>
       <!-- Modal tabla Historial-->
  <div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="historyModalLabel">Historial</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                  <div class="table-responsive" style=" height: 500px;overflow-y: auto;">
                      <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Fecha</th>
                                  <th>Estudiante</th>
                                  <th>Archivo</th>
                                  <th>Acción</th>
                              </tr>
                          </thead>
                          <tbody id="historyTableBody">
                            <?php
                            $sql = "SELECT * FROM historial";
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {

                              while ($row = $result->fetch_assoc()) { 
              
                              echo "<tr>";
                              echo "<td>".$row["id"]."</td>";
                              echo "<td>". $row['fecha']."</td>";
                              echo "<td>".$row['estudiante'] ."</td>";
                              echo "<td>" .$row['archivo'] . "</td>";
                              echo "<td>". $row['accion'] . "</td>";     
                              echo "</tr>";
                              }
                            }else {
                              echo "<tr><td colspan='8' class='text-center'>No se encontraron registros.</td></tr>";
                            }
                            if ($conexion->more_results()) {
                              while ($conexion->next_result());
                          }
                            ?>
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
              </div>
          </div>
      </div>
  </div>


      <!---------------------Modal registrar Arhcivo--------------------------------->
      <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Registrar Libreta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="studentForm" action="<?php echo BASE_URL; ?>views/php/insertar_nota.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="studentId">Id Estudiante</label>
                        <input type="number" id="studentId" name="studentId" class="form-control" readonly required>
                    </div>
                   <select class="form-select" name="bimestre" id="bimestre">
                     <option >BIMESTRE</option>
                     <option value="I">I</option>
                     <option value="II">II</option>
                     <option value="III">III</option>
                   </select>
                    <div class="mb-3">
                    <input type="file" name="archivo" id="archivo" class="btn btn-outline-secondary w-100" accept=".pdf" required>
                    </div>
                    <button type="submit" class="btn btn-registrar btn-primary w-100">Registrar</button>
                </form>
                </div>
            </div>
        </div>
    </div>

 <h1>Estudiantes</h1>
      <!--------------------------------- Filtro degrado y seccion  ---------------------->
        <div class="row">
            <div class="col-6 col-md-3 ">
                <select class="form-select border border-light-subtle text-center" aria-label="Rango de grado de estudiantes">
                    <option selected>Grado</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="col-6 col-md-3">
                <select class="form-select border border-light-subtle text-center" aria-label="Rango de sección de estudiantes">
                    <option selected>Sección</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="C">E</option>
                    <option value="D">F</option>
                </select>
            </div>
        </div>
      <!-- ---Tabla estudiantes sin nota------------->
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Estudiantes</h6>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive p-3">
                        <table class="table" id="tablaAsignarNota">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Nombre</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Grado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Seccion</th>
                                    <th class="text-secondary"></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $query = "SELECT * FROM estudiante";
                                $result1 = $conexion->query($query);

                                if ($result1->num_rows > 0) {

                                  while ($row = $result1->fetch_assoc()) {

                              echo "<tr>";
                                    echo "<td class="."text-center".">".$row['id']."</td>";
                                    echo "<td><p class='text-xs text-uppercase font-weight-bold text-center mb-0'>".$row['nombre']."</p></td>";
                                    echo "<td class="."align-middle text-center text-sm".">".$row['grado']."</td>";
                                    echo "<td class='align-middle text-uppercase text-center'>".$row['seccion']."</td>";
                                    echo "<td> <div class='col-md-1 p-0'>
                                        <button type='button' 
                                                class='btn p-0 m-0' 
                                                data-bs-target='#studentModal' 
                                                data-bs-toggle='modal'
                                                data-student-id='".$row['id']."'>
                                            <img src='https://cdn.icon-icons.com/icons2/209/PNG/256/Folder-Add256_24876.png' 
                                                 width='40px' 
                                                 height='40px'>
                                        </button>
                                    </div>
                                  </td>";
                            echo "</tr>";
                                  }
                                }else {
                                   echo "<tr><td colspan='8' class='text-center'>No se encontraron registros.</td></tr>";
                                }

                                if ($conexion->more_results()) {
                                  while ($conexion->next_result());
                              }
                              ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

      <!-----------------------------------------------------------Lista de estudiantes con Nota ------------------------------------------>
  <h1 class="mt-5">Estudiantes con Nota</h1>   
  <div class="row">
    <div class="col-4 col-md-3 ">
        <select class="form-select border border-light-subtle text-center" aria-label="Rango-de-grado">
            <option selected>Grado</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
    </div>
    <div class="col-4 col-md-3">
        <select class="form-select border border-light-subtle text-center" aria-label="Rango-de-seccion">
            <option selected>Sección</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="C">E</option>
            <option value="D">F</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary col-4 col-md-1">
      Eliminar Notas
    </button>
</div>
      <!-- ---Tabla------------->
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Estudiantes Con Nota</h6>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive p-3">
                    <table class="table" id="tablaVerNota">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Id</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nombre</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Grado</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Seccion</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nota Pdf</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">BIMESTRE</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Fecha Carga</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $quer = "CALL sp_estudiantes_con_calificacion()";
                         $result2 = $conexion->query($quer);
                        
                         if ($result2->num_rows > 0) {
                        
                           while ($row = $result2->fetch_assoc()) {
                                        // Formatear la fecha
                                        $fecha = date('d/m/Y', strtotime($row['fecha']));
                                        $row['id'] += 1;
                        echo "<tr>";
                          echo "<td class="."text-center ".">".$row['id']."</td>";
                          echo "<td><p class='text-xs text-uppercase font-weight-bold text-center mb-0'>".$row['nombre']."</p></td>";
                          echo "<td class='align-middle text-center text-sm'>".$row['grado']."</td>";
                          echo "<td class='align-middle text-uppercase text-center'>".$row['seccion']."</td>";
                          echo "<td class='align-middle text-uppercase text-center'><a target="."_blank"." href="."uploads/calificaciones/".$row['archivo'].">".$row['archivo']."<img src="."https://cdn.icon-icons.com/icons2/2753/PNG/512/ext_pdf_filetype_icon_176234.png"." width="."40px"." height="."40px"."></a></td>";
                            echo "<td class='align-middle text-uppercase text-center'>".$row['bimestre']."</td>";
                          echo "<td><p class='text-xs text-uppercase font-weight-bold text-center mb-0'>".$fecha."</p></td>";
                          echo "<td class='align-middle'>
                                  <a href='views/php/eliminar_nota.php?id=".$row['id']."'><img src="."https://cdn.icon-icons.com/icons2/1380/PNG/512/vcsconflicting_93497.png"." width="."40px"." height="."40px"."></a>
                                </td>";
                        echo "</tr>";
                          }
                        }else{
                          echo "<tr><td colspan='8' class='text-center'>No se encontraron registros.</td></tr>";
                        }

                        $conexion->close();
                        ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

      <!-------------------------------------pie de pagina----------------------->
      <footer class="footer py-4  ">
        Pie de pagina
      </footer>
    </div>
  </main>

 <!-- Modal configuracion-->
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
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
  <!----------Abrir modal formulario------------->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- --------------------pagionacion y filtrado-------------------- -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <!--SCRIPT PARA FILTRADO POR GRADO Y SECCION-->
    <script src="<?php BASE_URL;?>views/assets/js/filtrado.js"></script>
    <!--SCRIPT PARA FORMATO DE TABLA-->
    <script>
        $(document).ready(function () {
            $('#tablaAsignarNota').DataTable({
              
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Listar _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "◀",
                        next: "▶",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 600,
                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
            });
        });

        $(document).ready(function () {
            $('#tablaVerNota').DataTable({
              
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Listar _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "◀",
                        next: "▶",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 600,
                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
            });
        });

   // asignar id formulario nota
document.addEventListener('DOMContentLoaded', function() {
    const studentModal = document.getElementById('studentModal');
    if (studentModal) {
        studentModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const studentId = button.getAttribute('data-student-id');
            const studentIdInput = this.querySelector('#studentId');
            if (studentIdInput) {
                studentIdInput.value = studentId;
            }
        });
    }
});
    </script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php BASE_URL;?>views/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>