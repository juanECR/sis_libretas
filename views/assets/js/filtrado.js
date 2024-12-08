document.addEventListener('DOMContentLoaded', function () {
    const gradoFilter = document.querySelector('select[aria-label="Rango de grado de estudiantes"]'); // Filtro por grado
    const seccionFilter = document.querySelector('select[aria-label="Rango de sección de estudiantes"]'); // Filtro por sección
    const studentTable = document.getElementById('tablaAsignarNota').getElementsByTagName('tbody')[0]; // Cuerpo de la tabla
    const rows = studentTable.getElementsByTagName('tr'); // Filas de la tabla


    // Función para filtrar la tabla según los filtros seleccionados
    function filterTable() {
        const selectedGrado = gradoFilter.value; // Valor seleccionado del filtro por grado
        const selectedSeccion = seccionFilter.value; // Valor seleccionado del filtro por sección

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const grado = row.cells[3].textContent; // Columna del grado
            const seccion = row.cells[4].textContent; // Columna de la sección

            const matchesGrado = selectedGrado === "Grado" || grado === selectedGrado; // Coincidencia con el grado
            const matchesSeccion = selectedSeccion === "Sección" || seccion === selectedSeccion; // Coincidencia con la sección

            if (matchesGrado && matchesSeccion) {
                row.style.display = ''; // Mostrar fila si coincide con los filtros
            } else {
                row.style.display = 'none'; // Ocultar fila si no coincide
            }
        }
    }
    // Eventos para filtrar la tabla cuando cambien los selectores
    gradoFilter.addEventListener('change', filterTable);
    seccionFilter.addEventListener('change', filterTable);

    // Inicializar el filtro al cargar la página
    filterTable();
});

//FILTRADO DE LA LISTA DE ESTUDIANTES POR GRADO Y SECCION -----------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const gradoFilter = document.querySelector('select[aria-label="Rango de grado de estudiantes"]'); // Filtro por grado
    const seccionFilter = document.querySelector('select[aria-label="Rango de sección de estudiantes"]'); // Filtro por sección
    const studentTable = document.getElementById('tablaEstudiantes').getElementsByTagName('tbody')[0]; // Cuerpo de la tabla
    const rows = studentTable.getElementsByTagName('tr'); // Filas de la tabla


    // Función para filtrar la tabla según los filtros seleccionados
    function filterTable() {
        const selectedGrado = gradoFilter.value; // Valor seleccionado del filtro por grado
        const selectedSeccion = seccionFilter.value; // Valor seleccionado del filtro por sección

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const grado = row.cells[3].textContent; // Columna del grado
            const seccion = row.cells[4].textContent; // Columna de la sección

            const matchesGrado = selectedGrado === "Grado" || grado === selectedGrado; // Coincidencia con el grado
            const matchesSeccion = selectedSeccion === "Sección" || seccion === selectedSeccion; // Coincidencia con la sección

            if (matchesGrado && matchesSeccion) {
                row.style.display = ''; // Mostrar fila si coincide con los filtros
            } else {
                row.style.display = 'none'; // Ocultar fila si no coincide
            }
        }
    }
    // Eventos para filtrar la tabla cuando cambien los selectores
    gradoFilter.addEventListener('change', filterTable);
    seccionFilter.addEventListener('change', filterTable);
    
    // Inicializar el filtro al cargar la página
    filterTable();
});

//FILTRADO DED ESTUDIANTES CON NOTA SEGUN GRADO Y SECCION----------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const gradoFilter = document.querySelector('select[aria-label="Rango-de-grado"]'); // Filtro por grado
    const seccionFilter = document.querySelector('select[aria-label="Rango-de-seccion"]'); // Filtro por sección
    const studentTable = document.getElementById('tablaVerNota').getElementsByTagName('tbody')[0]; // Cuerpo de la tabla
    const rows = studentTable.getElementsByTagName('tr'); // Filas de la tabla


    // Función para filtrar la tabla según los filtros seleccionados
    function filterTable() {
        const selectedGrado = gradoFilter.value; // Valor seleccionado del filtro por grado
        const selectedSeccion = seccionFilter.value; // Valor seleccionado del filtro por sección

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const grado = row.cells[3].textContent; // Columna del grado
            const seccion = row.cells[4].textContent; // Columna de la sección

            const matchesGrado = selectedGrado === "Grado" || grado === selectedGrado; // Coincidencia con el grado
            const matchesSeccion = selectedSeccion === "Sección" || seccion === selectedSeccion; // Coincidencia con la sección

            if (matchesGrado && matchesSeccion) {
                row.style.display = ''; // Mostrar fila si coincide con los filtros
            } else {
                row.style.display = 'none'; // Ocultar fila si no coincide
            }
        }
    }
    // Eventos para filtrar la tabla cuando cambien los selectores
    gradoFilter.addEventListener('change', filterTable);
    seccionFilter.addEventListener('change', filterTable);

    // Inicializar el filtro al cargar la página
    filterTable();
});