document.addEventListener("DOMContentLoaded", function () {    
    const body = document.body;
    const contenido = document.getElementById("contenido");

    body.style.minHeight = "100vh";
    body.style.display = "flex";
    body.style.flexDirection = "column";

    contenido.style.flex = "1";

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

    const modalApro = document.getElementById("modalAprobar");
    const cerrarApro = document.getElementById("cerrarAprobar");

    const modalCerr = document.getElementById("modalRechazar");
    const cerrarCerr = document.getElementById("cerrarRechazar");

    const hAprob = document.getElementById("hAprob");
    const hRecha = document.getElementById("hRecha");

    document.addEventListener("click", e => {

        if (e.target.classList.contains("btn-aprobar")) {
            const id = e.target.dataset.id;

            hAprob.textContent =id;
            modalApro.dataset.id = id;
            const aprobarBtn = document.getElementById('aprobarSolicitud');
            aprobarBtn.dataset.id = id;
            modalApro.style.display = "flex";
        }

        if (e.target.classList.contains("btn-rechazar")) {
            const id = e.target.dataset.id;

            hRecha.textContent =id;
            modalCerr.dataset.id = id;
            const rechazarBtn = document.getElementById('rechazarSolicitud');
            rechazarBtn.dataset.id = id;
            modalCerr.style.display = "flex";
        }
    });

    cerrarApro.onclick = () => modalApro.style.display = "none";
    cerrarCerr.onclick = () => modalCerr.style.display = "none";

    modalApro.onclick = e => {
        if (e.target === modalApro) modalApro.style.display = "none";
    };

    modalCerr.onclick = e => {
        if (e.target === modalCerr) modalCerr.style.display = "none";
    };

    document.getElementById('aprobarSolicitud').addEventListener('click', function () {
        const id = this.dataset.id;
        console.log("id",id);
        fetch('/adminInscripcion/aprobar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.mensaje);
            modalApro.style.display = "none";
            location.reload(); 
        })
        .catch(error => console.error(error));
    });
     document.getElementById('rechazarSolicitud').addEventListener('click', function () {
        const id = this.dataset.id;
        console.log("id",id);
        fetch('/adminInscripcion/rechazar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.mensaje);
            modalApro.style.display = "none";
            location.reload(); 
        })
        .catch(error => console.error(error));
    });

    const tabla = document.querySelector(".tabla-registros");
    const wrapper = document.querySelector(".tabla-wrapper");
    if (!tabla || !wrapper) return;

    wrapper.style.overflowX = "auto";
    wrapper.style.borderRadius = "10px";
    wrapper.style.boxShadow = "0 0 10px rgba(0,0,0,0.08)";
    wrapper.style.marginTop = "20px";

    tabla.style.width = "100%";
    tabla.style.minWidth = "1400px";
    tabla.style.borderCollapse = "collapse";
    tabla.style.fontSize = "14px";
    tabla.style.backgroundColor = "#ffffff";

    tabla.querySelectorAll("thead th").forEach(th => {
        th.style.backgroundColor = "#1a2744";
        th.style.color = "#ffffff";
        th.style.padding = "10px 12px";
        th.style.textAlign = "center";
        th.style.fontWeight = "600";
        th.style.position = "sticky";
        th.style.top = "0";
        th.style.zIndex = "2";
        th.style.borderBottom = "2px solid #dee2e6";
        th.style.whiteSpace = "nowrap";
    });

    tabla.querySelectorAll("tbody td").forEach(td => {
        td.style.padding = "8px 10px";
        td.style.borderBottom = "1px solid #e5e7eb";
        td.style.whiteSpace = "nowrap";
        td.style.verticalAlign = "middle";
    });

    tabla.querySelectorAll("tbody tr").forEach(tr => {
        tr.addEventListener("mouseenter", () => {
            tr.style.backgroundColor = "#f4f6f9";
        });
        tr.addEventListener("mouseleave", () => {
            tr.style.backgroundColor = "transparent";
        });
    });

    tabla.querySelectorAll("a").forEach(a => {
        a.style.color = "#1a2744";
        a.style.fontWeight = "600";
        a.style.textDecoration = "none";
    });

    tabla.querySelectorAll("a").forEach(a => {
        a.addEventListener("mouseenter", () => a.style.textDecoration = "underline");
        a.addEventListener("mouseleave", () => a.style.textDecoration = "none");
    });

    tabla.querySelectorAll(".btn-aprobar").forEach(btn => {
        btn.style.backgroundColor = "#1a2744";
        btn.style.color = "#fff";
        btn.style.border = "none";
        btn.style.padding = "6px 10px";
        btn.style.borderRadius = "6px";
        btn.style.cursor = "pointer";
        btn.style.fontWeight = "600";
    });

    tabla.querySelectorAll(".btn-rechazar").forEach(btn => {
        btn.style.backgroundColor = "#8b0000";
        btn.style.color = "#fff";
        btn.style.border = "none";
        btn.style.padding = "6px 10px";
        btn.style.borderRadius = "6px";
        btn.style.cursor = "pointer";
        btn.style.fontWeight = "600";
    });

    document.querySelectorAll(".btn-aprobar, .btn-rechazar").forEach(btn => {
        btn.addEventListener("mouseenter", () => {
            btn.style.opacity = "0.85";
        });
        btn.addEventListener("mouseleave", () => {
            btn.style.opacity = "1";
        });
    });
});
