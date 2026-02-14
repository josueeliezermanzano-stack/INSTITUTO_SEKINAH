document.addEventListener("DOMContentLoaded", function () {    const body = document.body;
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

    const btnExp = document.getElementById("btnExplicacion");
    const modalExp = document.getElementById("modalExplicacion");
    const cerrarExp = document.getElementById("cerrarExplicacion");

    btnExp.onclick = () => modalExp.style.display = "flex";
    cerrarExp.onclick = () => modalExp.style.display = "none";

    modalExp.onclick = e => { 
        if (e.target === modalExp) modalExp.style.display = "none";
    };

    const contenidoH2 = contenido.querySelector("h2");
    if (contenidoH2) {
        contenidoH2.style.textAlign = "center";
        contenidoH2.style.marginBottom = "25px";
        contenidoH2.style.color = "#1a2744";
    }

    const form = document.getElementById("form-preregistro");
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

    const inputs = form.querySelectorAll("input[type='text'], input[type='date'], input[type='number'], textarea");
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

    const textareas = form.querySelectorAll("textarea");
    textareas.forEach(t => {
        t.style.height = "80px";
        t.style.resize = "vertical";
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
    document.getElementById('motivoVirtual').style.display = 'none';
    const motivoVirtual = document.getElementById("motivoVirtual");
    const chkVirtual = document.getElementById("chkVirtual");

    motivoVirtual.style.display = "none";

    const selectRegion = document.getElementById("region");

    chkVirtual.addEventListener("change", () => {
        if (chkVirtual.checked) {
            motivoVirtual.style.display = "flex";
            motivoVirtual.style.flexDirection = "column";

            if (selectRegion) {
                selectRegion.value = "3";
            }
        } else {
            motivoVirtual.style.display = "none";
        }
    });

    const cargoDesem = document.getElementById("cargoDesem");
    const cargoSi = document.getElementById("cargoSi");
    const cargoNo = document.getElementById("cargoNo");

    cargoDesem.style.display = "none";

    cargoSi.addEventListener("change", () => {
        if (cargoSi.checked) {
            cargoDesem.style.display = "flex";
            cargoDesem.style.flexDirection = "column";
        }
    });

    cargoNo.addEventListener("change", () => {
        if (cargoNo.checked) {
            cargoDesem.style.display = "none";
        }
    });
    const motivoVirtual1 = document.getElementById("RegionList");
    const chkPresencial = document.getElementById("chkPresencial");
    const chkDiplomado = document.getElementById("chkDiplomado");
    function actualizarOpciones() {
        if (chkPresencial.checked) {
            motivoVirtual1.style.display = "flex";
            chkVirtual.disabled = true;
            chkDiplomado.disabled = true;
        } else if (chkVirtual.checked) {
            motivoVirtual1.style.display = "none";
            chkPresencial.disabled = true;
            chkDiplomado.disabled = true;
        } else if(chkDiplomado.checked){
            motivoVirtual1.style.display = "none";
            chkVirtual.disabled = true;
            chkPresencial.disabled = true;
        }else {
            motivoVirtual1.style.display = "none";
            chkVirtual.disabled = false;
            chkPresencial.disabled = false;
            chkDiplomado.disabled = false;
        }
    }

    chkPresencial.addEventListener("change", actualizarOpciones);
    chkVirtual.addEventListener("change", actualizarOpciones);
    chkDiplomado.addEventListener("change", actualizarOpciones);
    actualizarOpciones();
    chkDiplomado.addEventListener("change", () => {
        if (chkDiplomado.checked) {
            if (selectRegion) {
                selectRegion.value = "4";
            }
        } else {
        }
    });
    chkPresencial.addEventListener("change", () => {
        const opciones = selectRegion.options;

        if (chkPresencial.checked) {
            for (let i = 0; i < opciones.length; i++) {
                const value = opciones[i].value;
                opciones[i].disabled = !(value === "1" || value === "2");
            }

            if (selectRegion.value !== "1" && selectRegion.value !== "2") {
                selectRegion.value = "1";
            }
        } else {
            for (let i = 0; i < opciones.length; i++) {
                opciones[i].disabled = false;
            }
        }
    });
    const radiosEscolaridad = document.querySelectorAll('input[name="escolaridad"]');
    const otraEscolaridad = document.getElementById("otraEscolaridad");
     otraEscolaridad.style.display = "none";
    radiosEscolaridad.forEach(radio => {
        radio.addEventListener("change", () => {
            if (radio.value === "otra") {
                otraEscolaridad.style.display = "flex";
            } else {
                otraEscolaridad.style.display = "none";
            }
        });
    });
});
