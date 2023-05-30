let buttonAdd = document.getElementById('addHabitacion');
let addInput = document.getElementById('addinput');

let campoId = 0;
/**
* Leonardo Costa
* La función add añade la parte de la habitación del formulario de reserva para poder tener más.
* Con una variable que funciona de contador/identificador, primero se comprueba que no sea mayor de 3,
* para que no pueda insertar habitaciones infinitas, después se añade el innerHTML y finalmente se suma 1 a la variable.
*/
function add(event) {
    if(campoId > 3) {
        return
    }
    event.preventDefault();
    addInput.innerHTML += `<div id="addinput`+campoId+`" class="inputEntra">
    <button class="btn btn-danger quitar float-end" onclick="quitar(`+campoId+`);">Eliminar</button>
    <div class="mb-3">
        <input type="number" id="personas" min="0" max="5" class="form-control" name="personas[]" placeholder="0 Adultos">
    </div>
    <div class="mb-3">
        <label for="tipo_habitacion">Habitación:</label>
        <select name="tipo_habitacion[]" id="tipo_habitacion" class="form-control">
            <option value="suite">Suite</option>
            <option value="gransuite">Gran Suite</option>
            <option value="familiar">Familiar</option>
        </select>
    </div>
</div>`;
campoId++;

}
/**Leonardo Costa
 * La función quitar, remueve una habitación identificandola por su id más la variable/contador insertada anteriormente.
 */
function quitar(rid){
    let inputQuitar = document.getElementById('addinput'+rid);
    inputQuitar.remove();
    campoId--;
}

buttonAdd.addEventListener('click', add, false);
