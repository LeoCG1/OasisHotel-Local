let adminButton = document.getElementById('adminBarra');
let abrirBarra = document.getElementById('abrirBarra');
abrirBarra.addEventListener('click', crecer, false);
let cerrarButton = document.getElementById('cerrarBarra');
cerrarButton.addEventListener('click', cerrar, false);

/**Leonardo Costa
 * La función reemplaza la clase adminNormal por adminAni. Admin normal es el estado normal de la barra del
 * administrador y se reemplaza por la clase que tiene la animación de crecer.
 */
function crecer(){
    adminButton.classList.replace('adminNormal', 'adminAni');
}
/**Leonardo Costa
 * Misma función que la anterior, pero reemplazando adminAni por adminNormal, para cuando se cierra la barra administrador.
 */
function cerrar(){
    adminButton.classList.replace('adminAni', 'adminNormal');
}