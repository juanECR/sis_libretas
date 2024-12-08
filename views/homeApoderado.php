<?php
$usua_id = $_SESSION['secion_ventas_id'];


 $sql = "SELECT 
        c.id,
        c.estudiante_id,
        e.nombre AS nombre_estudiante,
        e.grado,
        e.seccion,
        c.fecha,
        c.archivo,
        c.bimestre
    FROM 
        calificacion c
    INNER JOIN 
        estudiante e ON c.estudiante_id = e.id
    WHERE 
        e.apoderado_id = '{$usua_id}'";

$result = $conexion->query($sql);
?>
<h6>Bienvenido al sistema de Academico, Apoderado.. <span style="color:red"> <?php echo $_SESSION['sesion_venta_nombres'];?></span><a  href="">  Visite nuestra pagina</a>.</h6>
<div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Notas del estudiante</h6>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive p-3">
                    <table class="table" id="tablaVerNota">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">N°</th>
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
                        $cont = 0;
                         if ($result->num_rows > 0) {
                          $cont++;
                           while ($row = $result->fetch_assoc()) {
                                        // Formatear la fecha
                                        $fecha = date('d/m/Y', strtotime($row['fecha']));
                        echo "<tr>";
                          echo "<td class="."text-center ".">".$cont."</td>";
                          echo "<td><p class='text-xs text-uppercase font-weight-bold text-center mb-0'>".$row['nombre_estudiante']."</p></td>";
                          echo "<td class='align-middle text-center text-sm'>".$row['grado']."</td>";
                          echo "<td class='align-middle text-uppercase text-center'>".$row['seccion']."</td>";
                          echo "<td class='align-middle text-uppercase text-center'><a target="."_blank"." href="."uploads/calificaciones/".$row['archivo'].">".$row['archivo']."<img src="."https://cdn.icon-icons.com/icons2/2753/PNG/512/ext_pdf_filetype_icon_176234.png"." width="."40px"." height="."40px"."></a></td>";
                            echo "<td class='align-middle text-uppercase text-center'>".$row['bimestre']."</td>";
                          echo "<td><p class='text-xs text-uppercase font-weight-bold text-center mb-0'>".$fecha."</p></td>";
                          echo "<td class='align-middle'>
                                  <a href=".""."><img src="."https://cdn.icon-icons.com/icons2/1380/PNG/512/vcsconflicting_93497.png"." width="."40px"." height="."40px"."></a>
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