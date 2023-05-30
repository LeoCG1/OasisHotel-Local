let buttonMasFechas = document.getElementById('masFechas');
let apretarMasFechas = document.getElementById('ponerMasFechas');
let quitarMasFechas = document.getElementById('quitarMasFechas');
/**Leonardo Costa
 * Función que inserta en el HTML 2 divs con inputs tipo date.
 */
function masFechas(event) {
    event.preventDefault();
    buttonMasFechas.innerHTML = `
    <div class="mb-3">
        <label for="desde_horario">Desde </label>
        <input type="date" id="desde_horario" name="desde_horario" class="form-control">
    </div>
    <div class="mb-3">
        <label for="hasta_horario">Hasta </label>
        <input type="date" id="hasta_horario" name="hasta_horario" class="form-control">
    </div>`;

}
/**Leonardo Costa
 * Función que inserta en el DOM un input tipo date.
 */
function ocultarFechas(event) {
    event.preventDefault();
    buttonMasFechas.innerHTML = `<label for="fecha_horario">Fecha </label>
    <input class="form-control mb-3" type="date" id="fecha_horario" name="fecha_horario">`;
}

apretarMasFechas.addEventListener('click', masFechas, false);
quitarMasFechas.addEventListener('click', ocultarFechas, false);

