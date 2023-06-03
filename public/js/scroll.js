let botonArriba = document.getElementById('scrollUp');
let navSinScroll = document.getElementById('posicionNatural');
let sinScrollPic = document.getElementById('posicionSinScroll');

window.onload = midWay;
/**Leonardo Costa
 * Función anónima que activa la función scrollFunction cuando window.onscroll cambie.
 */
window.onscroll = function() {scrollFunction()};
/**Leonardo Costa
 * Función anónima que activa la función ancho cuando window.onresize cambie.
 */
window.onresize = function() {ancho()};
/**Leonardo Costa
 * Comprueba el ancho de la pantalla y el scroll.
 * Si esta en scroll 0 y la pantalla mide menos de 992, se quita el NAV sinScroll.
 */
function ancho(){
  if (window.innerWidth < 992 || document.body.scroll == 0 || document.documentElement.scrollTop == 0) {
    navSinScroll.classList.remove('sinScrollNav');
    sinScrollPic.classList.remove('sinScroll');
  }
}
/**Leonardo Costa
 * Función que se usa para cuando se actualiza la página. Si está en scroll 0 pone el nav sinScroll.
 * Si está fuera del scroll 0, se quita el nav sinScroll, se cambia el display al botón de subir y se quitan las clases de visible.
 */
function midWay(){
  if(document.body.scroll == 0 || document.documentElement.scrollTop == 0){
    botonArriba.style.display = "none";
    navSinScroll.classList.add('sinScrollNav');
    sinScrollPic.classList.add('sinScroll');
    if(window.innerWidth < 992){
      ancho();
      }
  }else{
    botonArriba.style.display = "block";
    navSinScroll.classList.remove('sinScrollNav');
    sinScrollPic.classList.remove('sinScroll');
    let elementos = document.getElementsByClassName('scroll-content');
    for(const elemento of elementos){
      elemento.classList.add('visible');
    }
  }
}
/**Leonardo Costa
 * Función que cambia el display y las clases al NAV si el scroll es mayor a 20.
 */
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    botonArriba.style.display = "block";
    navSinScroll.classList.remove('sinScrollNav');
    sinScrollPic.classList.remove('sinScroll');
  } else {
    botonArriba.style.display = "none";
    navSinScroll.classList.add('sinScrollNav');
    sinScrollPic.classList.add('sinScroll');
  }
  if (window.innerWidth < 992) {
    navSinScroll.classList.remove('sinScrollNav');
    sinScrollPic.classList.remove('sinScroll');
  }
}
/**Leonardo Costa
 * Función que envía al usuario al principio de la pantalla, cambiando el nav a sinScroll.
 */
function topFunction() {
    document.body.scrollTop = 0; 
    document.documentElement.scrollTop = 0;
    navSinScroll.classList.remove('sinScrollNav');
    sinScrollPic.classList.remove('sinScroll');
    ancho();
  }
/**Leonardo Costa
 * Función dentro del evento "scroll" que recoge los elementos "scroll-content" para iterarlos e insertar
 * o remover la clase "visible" según el scroll esté a vista del usuario o no.
 */
  window.addEventListener('scroll', function(){
    let elementos = document.getElementsByClassName('scroll-content');
    let screenSize = window.innerHeight;

    for(let i = 0; i< elementos.length; i++){
      let elemento = elementos[i];

      if(elemento.getBoundingClientRect().top < screenSize){
        elemento.classList.add('visible');
      }else{
        elemento.classList.remove('visible');
      }
    } 
  })