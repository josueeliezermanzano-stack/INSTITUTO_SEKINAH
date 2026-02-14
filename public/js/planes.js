document.addEventListener("DOMContentLoaded", function () {    const body = document.body;
   
});
function estilizarSeccion(id) {
    const sec = document.getElementById(id);
    sec.style.backgroundColor = "#fff";
    sec.style.padding = "30px";
    sec.style.margin = "40px auto";
    sec.style.maxWidth = "900px";
    sec.style.borderRadius = "12px";
    sec.style.boxShadow = "0 0 12px rgba(0,0,0,0.15)";
}

function estilizarTitulo(id) {
    const h2 = document.querySelector(`#${id} h2`);
    h2.style.textAlign = "center";
    h2.style.color = "#333";
    h2.style.marginBottom = "20px";
}

function estilizarListas(id) {
    const lista = document.querySelector(`#${id} ul`);
    if(lista){
        lista.style.lineHeight = "1.8";
        lista.style.fontSize = "17px";
        lista.style.color = "#444";
    }
}

["Pcuatrimestre", "Scuatrimestre", "Tcuatrimestre", "Ccuatrimestre", "Qcuatrimestre", "Secuatrimestre", "Diplomado"].forEach(id => {
    estilizarSeccion(id);
    estilizarTitulo(id);
    estilizarListas(id);
});