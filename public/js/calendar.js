let nombreMes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
    'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

let fechaActual = new Date();
let diaActual = fechaActual.getDate();
let numeroMes = fechaActual.getMonth();
let anyoActual = fechaActual.getFullYear();

let fechas = document.getElementById('dias');
let mes = document.getElementById('mes');
let anyo = document.getElementById('anyo');

let mesPrevioDOM = document.getElementById('mes_prev');
let mesProximoDOM = document.getElementById('mes_next');

mes.textContent = nombreMes[numeroMes];
anyo.textContent = anyoActual.toString();

mesPrevioDOM.addEventListener('click', () => mesPrevio());
mesProximoDOM.addEventListener('click', () => mesProximo());

let fechaIngreso = document.getElementById('fecha_ingreso');
let fechaSalida = document.getElementById('fecha_salida');

escribirMes(numeroMes);

/**Leonardo Costa
 * Función que compara dos fechas, primero pasando las dos al mismo formato fecha y finalmente devolviendo true
 * si date1 es menor a date2.
 */
const compararFechas = (d1, d2) => {
    let date1 = new Date(d1).getTime();
    let date2 = new Date(d2).getTime();
    if (date1 < date2 ) {
      return false;
    } else {
      return true;
    }
  };
/**Leonardo Costa
 * Función que itera sobre los items del calendario removiendo la clase "clicado".
 */
function quitarClicado(){
    let seleccion =  document.getElementsByClassName('calendario__item');
    for(const sel of seleccion){
        sel.classList.remove('clicado');
    }
}
/**Leonardo Costa
 * Función que devuelve true si una fecha insertada es mayor a la fecha de hoy.
 */
function mayorHoy(fecha){
    const hoyFormateado = new Date();
    let date1 = new Date(fecha).getTime();
    let date2 = new Date(hoyFormateado).getTime();
    if(date1 >= date2){return true;}
}
/**Leonardo Costa
 * Función que inserta la fecha en el DOM.
 * Pasa la fecha dada a formato formulario input DATE. 
 * Se valida si el primer cual de los 2 inputs tiene datos para ponerlo en el vacio, si no, se borra y se pone en el primero.
 * Valida si la fecha insertada es mayor a hoy o si hay un dato insertado en el primer input, valida que sea mayor a esa.
 * Cuando se pone fecha en el DOM, se le pone la clase "clicado" a la fecha en el calendario.
 */
function ponerFecha(fecha) {
    let clicado = document.getElementById("clicado"+fecha);
    let fechaString = anyoActual.toString().padStart(4, '0') + '/' + (numeroMes + 1).toString().padStart(2, '0') + '/' + fecha.toString().padStart(2, '0');
    let d = new Date(fechaString);
    let fechaDom = d.getFullYear().toString().padStart(4, '0') + '-' + (d.getMonth() + 1).toString().padStart(2, '0') + '-' + d.getDate().toString().padStart(2, '0');
    if (!fechaIngreso.value) {
        if(!mayorHoy(fechaDom)){return}
        fechaIngreso.value = fechaDom;
        clicado.classList.add('clicado');
    } else if(fechaIngreso.value && fechaSalida.value && mayorHoy(fechaDom)){
        fechaIngreso.value = fechaDom;
        quitarClicado();
        fechaSalida.value = "";
        clicado.classList.add('clicado');
    }else if(!compararFechas(fechaDom, fechaIngreso.value)){
        return
    }else{
        fechaSalida.value = fechaDom;
        clicado.classList.add('clicado');
    }
}
/**Leonardo Costa
 * Función que comprueba si la fecha es HOY.
 */
function comprobarHoy(){
    let hoy = new Date();
    let fecha = new Date(anyoActual, numeroMes, diaActual);
    let hoyTime = hoy.getTime();
    let fechaTime = fecha.getTime();
    if(hoyTime >= fechaTime){return true}
}
/**Leonardo Costa
 * Función que escribe los días del mes en el calendario.
 * Primero itera los días del mes menores a HOY para poner la clase "pasado" que tiene opacity.
 * Después itera el total de días poniendo un onClick para que ponga esa fecha en el input del formulario y una variable contador para identificar el día.
 * Valida si el día es HOY para insertar la clase "hoy" con su css particular.
 */
function escribirMes(mes) {
    for (let i = comienzoDia(); i > 0; i--) {
        dias.innerHTML += `<div class="calendario__dias calendario__item pasado"><p>${totalDias(mes - 1) - (i - 1)}</p></div>`;
    }

    for (let i = 1; i <= totalDias(mes); i++) {
        if (i === diaActual && comprobarHoy()) {
            dias.innerHTML += `<div class="calendario__dias calendario__item hoy" onClick="ponerFecha(${i})"><p>${i}</p></div>`;
        } else {
            dias.innerHTML += `<div class="calendario__dias calendario__item" id="clicado`+i+`" onClick="ponerFecha(${i})"><p>${i}</p></div>`;
        }
    }
}
/**Leonardo Costa
 * Función que recibe un mes y comprueba si el mes es diciembre, si tiene 30 o 31 días o si es bisiesto.
 */
function totalDias(mes) {
    if (mes === -1) {
        mes = 11;
    }
    if (mes == 0 || mes == 2 || mes == 4 || mes == 6 || mes == 7 || mes == 9 || mes == 11) {
        return 31;
    } else if (mes == 3 || mes == 5 || mes == 8 || mes == 10) {
        return 30;
    } else {
        return esBisiesto() ? 29 : 28;
    }
}
/**Leonardo Costa
 * Comprueba si el año es bisiesto.
 */
function esBisiesto() {
    return ((anyoActual % 100 !== 0) && (anyoActual % 4 === 0) || (anyoActual % 400 === 0))
}
/**Leonardo Costa
 * Comprueba el primer día del mes.
 */
function comienzoDia() {
    let comienzo = new Date(anyoActual, numeroMes, 1)
    return ((comienzo.getDay() - 1) === -1) ? 6 : comienzo.getDay() - 1;
}
/**Leonardo Costa
 * Función para mover el calendario para atras en función del mes.
 * Si el mes es diferente a 0, se resta 1 para ir al mes anterior.
 * Si el mes es 11, se resta un año para ir al año anterior.
 */
function mesPrevio() {
    if (numeroMes !== 0) {
        numeroMes--;
    } else {
        numeroMes = 11;
        anyoActual--;
    }
    nuevaFecha();
}
/**Leonardo Costa
 * Mueve el calendario para adelante en función del mes.
 * Si el mes es diferente a 11, se suma un mes.
 * Si el mes es 0, se suma un año, para ir al año siguiente.
 */
function mesProximo() {
    if (numeroMes !== 11) {
        numeroMes++;
    } else {
        numeroMes = 0;
        anyoActual++;
    }
    nuevaFecha();
}
/**Leonardo Costa
 * Función que recoge el mes de las 2 funciones anteriores actualizando las variables mes y anyo.
 * Manda la fecha a la función escribirMes, para actualizar el calendario.
 */
function nuevaFecha() {
    fechaActual.setFullYear(anyoActual, numeroMes, diaActual);
    mes.textContent = nombreMes[numeroMes];
    anyo.textContent = anyoActual.toString();
    dias.textContent = "";
    escribirMes(numeroMes);
}