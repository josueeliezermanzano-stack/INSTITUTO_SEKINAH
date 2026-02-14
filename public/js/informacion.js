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

    

    const contenidoH2 = contenido.querySelector("h2");
    if (contenidoH2) {
        contenidoH2.style.textAlign = "center";
        contenidoH2.style.marginBottom = "25px";
        contenidoH2.style.color = "#1a2744";
    }

    
    const formPeriodo = document.querySelector(".form-informacion");
    document.querySelectorAll(".form-informacion .form-control").forEach(input => {
        input.style.width = "100%";
        input.style.padding = "10px 12px";
        input.style.borderRadius = "8px";
        input.style.border = "1px solid #cbd5e1";
        input.style.fontSize = "15px";
        input.style.transition = "all 0.2s ease";

        input.addEventListener("focus", () => {
            input.style.borderColor = "#2563eb";
            input.style.boxShadow = "0 0 0 2px rgba(37,99,235,0.25)";
        });

        input.addEventListener("blur", () => {
            input.style.borderColor = "#cbd5e1";
            input.style.boxShadow = "none";
        });
    });

    document.querySelectorAll(".form-informacion label").forEach(label => {
        label.style.fontWeight = "600";
        label.style.color = "#1a2744";
        label.style.display = "block";
        label.style.marginBottom = "6px";
    });

    const btnGuardar = document.querySelector(".btn-guardar");

    if (btnGuardar) {
        btnGuardar.style.backgroundColor = "#1a2744";
        btnGuardar.style.color = "#ffffff";
        btnGuardar.style.border = "none";
        btnGuardar.style.padding = "10px 22px";
        btnGuardar.style.borderRadius = "10px";
        btnGuardar.style.fontSize = "15px";
        btnGuardar.style.fontWeight = "600";
        btnGuardar.style.cursor = "pointer";
        btnGuardar.style.transition = "all 0.2s ease-in-out";
        btnGuardar.style.boxShadow = "0 4px 10px rgba(0,0,0,0.15)";

        btnGuardar.addEventListener("mouseenter", () => {
            btnGuardar.style.backgroundColor = "#2563eb";
            btnGuardar.style.transform = "scale(1.05)";
        });

        btnGuardar.addEventListener("mouseleave", () => {
            btnGuardar.style.backgroundColor = "#1a2744";
            btnGuardar.style.transform = "scale(1)";
        });
    }

});
