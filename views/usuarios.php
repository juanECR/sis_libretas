
    <!-- contenido -->
    <div class="container-fluid py-4">

      <div class="row  mt-4 " >
        <!-- boton registrar-->
        <div class="col-md-3">
          <button id="btnAddStudent" class="btn btn-primary w-100">
              <i class="fas fa-plus"></i> AGREGAR USUARIO
          </button>
        </div>
        <!---------------------Modal registrar--------------------------------->
        <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="studentModalLabel">Datos del Usuario</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="studentForm" method="POST" action="<?php BASE_URL;?>views/php/insertar_usuario.php">
                          <input type="number" class="form-control" id="dni" name="dni" placeholder="DNI" required>
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                          <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                             <option value="" disabled selected>Tipo de usuario</option>
                             <option value="1">Administrador</option>
                             <option value="2">Apoderado</option>
                          </select>
                          <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electronico" required>
                          <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                          <button type="submit" class="btn btn-registrar btn-primary w-100">Registrar</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  <!-- ---Tabla Usuarios------------->
 <div class="col-12">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Lista de usuarios Apoderados</h6>
            </div>
        </div>
        <div class="card-body px-0">
            <div class="table-responsive p-3">
                <table class="table" id="tablaAsignarNota">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Dni</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nombre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Tipo usuario</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Correo</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Clave</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Telefono</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                 
                     $query = "CALL verUsuarios()";
                     $resultado = $conexion->query($query);

                     if ($resultado->num_rows > 0) {

                      while ($row = $resultado->fetch_assoc()) {   

                        if ($row['tipo_user'] == 1) {
                          $tipo_user = 'ADMINISTRADOR';
                          } elseif ($row['tipo_user'] == 2) {
                              $tipo_user = 'APODERADO';
                          } else {
                              $tipo_user = ''; // Puedes manejar otros casos si es necesario
                          }     

                          echo "<tr> ";
                          echo "<td class='text-center text-xs'>".$row['id']."</td>";
                          echo "<td><p class='text-xs mb-0 text-center'>" .$row['dni']."</p></td>";
                          echo "<td><p class='text-xs text-uppercase font-weight-bold text-center mb-0'>".$row['nombre']."</p></td>";
                          echo "<td class='align-middle text-uppercase text-center text-xs'>".$tipo_user."</td>";
                          echo "<td class='align-middle text-center'>" . $row['correo']."</td>";
                          echo "<td class='align-middle text-uppercase text-center'>*********</td>";
                          echo "<td class='align-middle text-uppercase text-center'>". $row['telefono']."</td>";
                          echo "<td class='align-middle'>";
                          echo " <button type='button' class='btn p-0 m-0 btn-editar' data-bs-toggle='modal' data-bs-target='#ModalUpdate'
                                 data-id='" . $row['id'] . "' 
                                 data-dni='" . $row['dni'] . "' 
                                 data-nombre='" . $row['nombre'] . "' 
                                 data-t_user='" . $tipo_user . "' 
                                 data-correo='" . $row['correo'] . "' 
                                 data-telefono='" . $row['telefono'] . "'>
                           <img src='https://cdn.icon-icons.com/icons2/1572/PNG/512/3592869-compose-create-edit-edit-file-office-pencil-writing-creative_107746.png' 
                                width='40px' 
                                height='40px'>
                         </button>";


                          echo "<a href="."views/php/eliminar_usuario.php?id=" . $row['id'] . ""."><img src="."https://cdn.icon-icons.com/icons2/1808/PNG/512/trash-can_115312.png"." alt="."eliminar"." width="."40px"." height="."40pX"."></a>";
                          echo "</td>";
                          echo "</tr>";
                     }
                     } else {
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

    <!---------------------Modal Editar usuario--------------------------------->
    <div class="modal fade" id="ModalUpdate" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Datos del Usuario</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ModalUpdateForm" method="POST" action="<?php echo BASE_URL;?>views/php/actualizar_usuario.php">
                    <input type="number" class="form-control mb-3" id="id" name="id" placeholder="ID" readonly>
                    <input type="number" class="form-control mb-3" id="new_dni" name="new_dni" placeholder="DNI" required>
                    <input type="text" class="form-control mb-3" id="new_nombre" name="new_nombre" placeholder="Nombre" required>
                    <select class="form-select mb-3" id="new_tipo_user" name="new_tipo_user" required>
                        <option value="" disabled selected>Tipo de usuario</option>
                        <option value="1">Administrador</option>
                        <option value="2">Apoderado</option>
                    </select>
                    <input type="email" class="form-control mb-3" id="new_email" name="new_email" placeholder="Correo Electrónico" required>
                    <input type="text" class="form-control mb-3" id="new_telefono" name="new_telefono" placeholder="Teléfono" required>
                    <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
      <!-- ---------------Pie de pagina--------------->
      <footer class="footer py-4  ">
PIE DE PAGINA
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php BASE_URL;?>views/assets/js/material-dashboard.min.js?v=3.1.0"></script>
<script>
       // Abrir el modal al hacer clic en el botón "Agregar Estudiante"
  $(document).ready(function() {
      $('#btnAddStudent').click(function() {
          $('#studentModal').modal('show');
      });
  });
// Abrir editar usuario
  $(document).ready(function() {
      $('#btnUpdateUser').click(function() {
          $('#ModalUpdate').modal('show');
      });
  });
</script>

     <!-- --------------------pagionacion y filtrado-------------------- -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
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

         //mandar valor al modal
      
           // Cuando se abre el modal
           const modal = document.getElementById('ModalUpdate');
           modal.addEventListener('show.bs.modal', function (event) {
             // Obtener el botón que activó el modal
             const button = event.relatedTarget;
             
             // Obtener el valor del atributo 'data-id'
             const id = button.getAttribute('data-id');
             // Obtener el valor del atributo 'data-nombre'
             const dni = button.getAttribute('data-dni');
             const nombre = button.getAttribute('data-nombre');
             const user = button.getAttribute('data-t_user');
             const correo = button.getAttribute('data-correo');
             const telefono = button.getAttribute('data-telefono');
             
             
             // Pasar el ID al input o a cualquier parte del modal
             document.getElementById('id').value = id;  // Si lo necesitas en un campo oculto
             document.getElementById('new_dni').value = dni;
             document.getElementById('new_nombre').value = nombre;
             document.getElementById('new_tipo_user').value = user;
             document.getElementById('new_email').value = correo;
             document.getElementById('new_telefono').value = telefono;
           });
    </script>
</body>

</html>