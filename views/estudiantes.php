

    <!-- ---------------------------------contenido---------------------- -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Estudiantes</p>
                <h4 class="mb-0">800</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+2% </span>Con respecto al año anterior</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Registrados</p>
                <h4 class="mb-0"><?php 
                $sql = "SELECT count(*) as total FROM estudiante";
                $result = $conexion->query($sql);
                $row = $result->fetch_assoc();
                echo $row['total'];
                ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>Que el año pasado</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row  mt-4 " >
      <!-- boton registrar-->
      <div class="col-md-3">
        <button id="btnAddStudent" class="btn btn-primary w-100">
            <i class="fas fa-plus"></i> Agregar Estudiante
        </button>
      </div>
      <!--------------------------------------------------------------Modal registrar--------------------------------------->
      <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Datos del Estudiante</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="studentForm" method="POST" action="<?php BASE_URL;?>views/php/insertar_estudiante.php">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
                        <label for="">fecha de nacimiento</label>
                        <input type="date" class="form-control" placeholder="Fecha de nacimiento" id="nacimiento" name="nacimiento" required>
                        <div class="row-flex">
                            <div>
                                <select class="form-select" required id="grado" name="grado">
                                    <option value="" disabled selected>Grado</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div>
                                <select class="form-select" required id="seccion" name="seccion">
                                    <option value="" disabled selected>Sección</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                        </div>
                        <input type="number" class="form-control" placeholder="DNI Apoderado" name="dni_apoderado" id="dni_apoderado" required>
                        <button type="submit" class="btn btn-registrar btn-primary w-100">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- -----buscador--------------->
   <div class="row">
     <div class="col-4 col-md-3 ">
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
     <div class="col-4 col-md-3">
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

          <!-- --------------------tabla---------------------------->
    <div class="col-12">
      <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Lista de estudiantes</h6>
              </div>
          </div>
          <div class="card-body px-0">
              <div class="table-responsive p-3">
                  <table class="table" id="tablaEstudiantes">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Id</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nombre</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Fecha Nacimiento</th>                        
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Grado</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Seccion</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">DNI Apoderado</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query = "SELECT e.id, e.nombre, e.f_nacimiento, e.grado, e.seccion, a.dni AS apoderado_dni
                        FROM estudiante e
                        JOIN usuario a ON e.apoderado_id = a.id";
                        $resultado = $conexion->query($query);
                        if ($resultado->num_rows > 0) {
                          while ($row = $resultado->fetch_assoc()) {
                           
                         echo "<tr>";
                         echo "<td class='text-xs font-weight-bold mb-0 text-center'>". $row['id'] ."</td>";
                         echo "<td><p class='text-xs text-uppercase font-weight-bold mb-0 text-center'>" . $row['nombre'] . "</p></td>";
                         echo "<td><p class='text-xs text-uppercase font-weight-bold text-center mb-0'>". $row['f_nacimiento'] . "</p></td>";
                         echo "<td class='align-middle text-center text-sm'>" . $row['grado']  . "</td>";
                         echo "<td class='align-middle text-uppercase text-center'>" . $row['seccion']  ."</td>";
                         echo "<td class='align-middle text-center text-sm'>".$row['apoderado_dni'] ."</td>";
                         echo "<td class='align-middle'>
                         <button type='button' class='btn p-0 m-0 btn-editar' data-bs-toggle='modal' data-bs-target='#TablaEditar'
                                 data-id='" . $row['id'] . "' 
                                 data-nombre='" . $row['nombre'] . "' 
                                 data-dniApoderado='" . $row['apoderado_dni'] . "' 
                                 data-f_nacimiento='" . $row['f_nacimiento'] . "' 
                                 data-grado='" . $row['grado'] . "' 
                                 data-seccion='" . $row['seccion'] . "'>
                           <img src='https://cdn.icon-icons.com/icons2/1572/PNG/512/3592869-compose-create-edit-edit-file-office-pencil-writing-creative_107746.png' 
                                width='40px' 
                                height='40px'>
                         </button>
                         <a href='views/php/eliminar_estudiante.php?id=" . $row['id'] . "'>
                           <img src='https://cdn.icon-icons.com/icons2/1808/PNG/512/trash-can_115312.png' 
                                width='40px' 
                                height='40px'>
                         </a>
                       </td>";
                          echo "</tr>";
                        }
                        }else {
                          echo "<tr><td colspan='8' class='text-center'>No se encontraron registros.</td></tr>";
                          }
                         //$conexion->close();
                     ?>
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
      </div>

     <!---------------------Modal Editar estudiante--------------------------------->
     <div class="modal fade" id="TablaEditar" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Editar Estudiante</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editStudentForm" method="POST" action="<?php echo BASE_URL;?>views/php/actualizar_estudiante.php">
                    <input type="text" class="form-control" id="edit_estudiante_id" name="edit_estudiante_id" readonly>

                    <label for="edit_nombre">Nombre</label>
                    <input type="text" class="form-control" id="edit_nombre" name="edit_nombre"  required>

                    <label for="edit_nacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="edit_nacimiento" name="edit_nacimiento" placeholder="Fecha de nacimiento" required>
                    <div class="row-flex">
                        <div>
                            <select class="form-select" id="edit_grado" name="edit_grado" required>
                                <option value="" disabled selected>Grado</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div>
                            <select class="form-select" id="edit_seccion" name="edit_seccion" required>
                                <option value="" disabled selected>Sección</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="edit_dni_apoderado" name="edit_dni_apoderado" placeholder="DNI Apoderado" required>
                    <button type="submit" class="btn btn-registrar btn-primary w-100">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
      <!--.................. footer...........-->
      <footer class="footer py-4  ">
         <div>pie de pagina@copy</div>
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
  <script src="<?php BASE_URL;?>views/assets/js/plugins/chartjs.min.js"></script>
  <script src="<?php BASE_URL;?>views/assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
  // Abrir el modal al hacer clic en el botón "Agregar Estudiante" 
    $(document).ready(function() {
        $('#btnAddStudent').click(function() {
            $('#studentModal').modal('show');
        });
    });
</script>

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
            $('#tablaEstudiantes').DataTable({
              
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


        //mandar valor al modal
      
  // Cuando se abre el modal
  const modal = document.getElementById('TablaEditar');
  modal.addEventListener('show.bs.modal', function (event) {
    // Obtener el botón que activó el modal
    const button = event.relatedTarget;
    
    // Obtener el valor del atributo 'data-id'
    const id = button.getAttribute('data-id');
    // Obtener el valor del atributo 'data-nombre'
    const nombre = button.getAttribute('data-nombre');
    const apoderadoDni = button.getAttribute('data-dniApoderado');
    const f_nacimiento = button.getAttribute('data-f_nacimiento');
    const grado = button.getAttribute('data-grado');
    const seccion = button.getAttribute('data-seccion');
    
    
    // Pasar el ID al input o a cualquier parte del modal
    document.getElementById('edit_estudiante_id').value = id;  // Si lo necesitas en un campo oculto
    document.getElementById('edit_nombre').value = nombre;
    document.getElementById('edit_dni_apoderado').value = apoderadoDni;
    document.getElementById('edit_nacimiento').value = f_nacimiento;
    document.getElementById('edit_grado').value = grado;
    document.getElementById('edit_seccion').value = seccion;
  });
    </script>
</body>

</html>
</body>

</html>