document.addEventListener("DOMContentLoaded", function () {    
    const body = document.body;
    const contenido = document.getElementById("contenido");
    contenido.style.backgroundColor = "#fff";
    contenido.style.padding = "40px";
    contenido.style.maxWidth = "900px";
    contenido.style.margin = "40px auto";
    contenido.style.borderRadius = "12px";
    contenido.style.boxShadow = "0 0 12px rgba(0,0,0,0.15)";
    contenido.style.color = "#333";
    contenido.style.fontSize = "16px";
    contenido.style.lineHeight = "1.6";

    

    const contenidoH2 = contenido.querySelector("h2");
    if (contenidoH2) {
        contenidoH2.style.textAlign = "center";
        contenidoH2.style.marginBottom = "25px";
        contenidoH2.style.color = "#1a2744";
    }
    const form = document.getElementById("form-registro");
    form.style.display = "flex";
    form.style.flexDirection = "column";
    form.style.gap = "20px";

    const grupos = form.querySelectorAll(".form-group");
    grupos.forEach(g => {
        g.style.display = "flex";
        g.style.flexDirection = "column";
    });

    const labels = form.querySelectorAll("label");
    labels.forEach(l => {
        l.style.fontWeight = "bold";
        l.style.marginBottom = "5px";
        l.style.color = "#1a2744";
    });

    const inputs = form.querySelectorAll("input[type='text'], input[type='date'], input[type='number'],input[type='password'], textarea");
    inputs.forEach(inp => {
        inp.style.padding = "10px";
        inp.style.border = "1px solid #ccc";
        inp.style.borderRadius = "8px";
        inp.style.fontSize = "15px";
        inp.style.outline = "none";
        inp.style.transition = "0.3s";

        inp.onfocus = () => {
            inp.style.borderColor = "#1a2744";
            inp.style.boxShadow = "0 0 6px rgba(26,39,68,0.3)";
        };
        inp.onblur = () => {
            inp.style.borderColor = "#ccc";
            inp.style.boxShadow = "none";
        };
    });
    const boton = form.querySelector("button");
    if (boton) {
        boton.style.padding = "12px 25px";
        boton.style.backgroundColor = "#1a2744";
        boton.style.color = "#fff";
        boton.style.fontWeight = "bold";
        boton.style.border = "none";
        boton.style.borderRadius = "8px";
        boton.style.cursor = "pointer";
        boton.style.fontSize = "16px";
        boton.style.marginTop = "20px";
        boton.style.transition = "0.3s";

        boton.onmouseover = () => {
            boton.style.backgroundColor = "#24365e";
        };
        boton.onmouseout = () => {
            boton.style.backgroundColor = "#1a2744";
        };
    }
});
