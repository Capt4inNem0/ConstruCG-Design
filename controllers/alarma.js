// left: 37, up: 38, right: 39, down: 40,
// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// Chrome necesita { passive: false } al añadir el evento
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// Desabilitar scroll
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); // Versiones viejas de escritorio
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // Escritorio
  window.addEventListener('touchmove', preventDefault, wheelOpt); // Celulares
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// Habilitar scroll
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}

// Se aplica una pantalla con un blur TODO: aunque me gustaria algo que hiciera opaco el fondo
function blurAll() {
    $('#contacto').css('filter', 'blur(3px)');
}

function unblurAll() {
    $('#contacto').css('filter', 'none');
}

// Cierra la ventana de error
function closeAlert() {
    $('#errorbox').css('display', 'none');
    $('#errorbox-text').text('');
    unblurAll();
    enableScroll();
}

// Abre la ventana de error
function loadAlert(message, timeout) {
    disableScroll();
    blurAll();
    $('#errorbox').css('display', 'block');
    $('#errorbox-text').text(message.toString());
    setTimeout(closeAlert, parseInt(timeout)*1000);
}