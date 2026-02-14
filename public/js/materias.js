document.addEventListener("DOMContentLoaded", function () {
    const contenedorMaterias = document.getElementById("materias-profesor");
    const selectMateria = document.querySelector(".select-materia");
    const btnMateria = document.getElementById("btn-materia");

    if (contenedorMaterias) {
        contenedorMaterias.style.display = "flex";
        contenedorMaterias.style.alignItems = "center";
        contenedorMaterias.style.justifyContent = "center";
        contenedorMaterias.style.gap = "12px";
        contenedorMaterias.style.marginBottom = "25px";
    }

    if (selectMateria) {
        selectMateria.style.width = "300px";
        selectMateria.style.padding = "10px 12px";
        selectMateria.style.borderRadius = "10px";
        selectMateria.style.border = "1px solid #cbd5e1";
        selectMateria.style.fontSize = "15px";
        selectMateria.style.backgroundColor = "#ffffff";
        selectMateria.style.color = "#1a2744";
        selectMateria.style.cursor = "pointer";
        selectMateria.style.transition = "all 0.2s ease";

        selectMateria.addEventListener("focus", () => {
            selectMateria.style.borderColor = "#2563eb";
            selectMateria.style.boxShadow = "0 0 0 3px rgba(37,99,235,0.25)";
        });

        selectMateria.addEventListener("blur", () => {
            selectMateria.style.borderColor = "#cbd5e1";
            selectMateria.style.boxShadow = "none";
        });
    }

    if (btnMateria) {
        btnMateria.style.backgroundColor = "#1a2744";
        btnMateria.style.color = "#ffffff";
        btnMateria.style.border = "none";
        btnMateria.style.padding = "10px 22px";
        btnMateria.style.borderRadius = "10px";
        btnMateria.style.fontSize = "15px";
        btnMateria.style.fontWeight = "600";
        btnMateria.style.cursor = "pointer";
        btnMateria.style.transition = "all 0.2s ease-in-out";
        btnMateria.style.boxShadow = "0 4px 10px rgba(0,0,0,0.15)";

        btnMateria.addEventListener("mouseenter", () => {
            btnMateria.style.backgroundColor = "#2563eb";
            btnMateria.style.transform = "scale(1.05)";
        });

        btnMateria.addEventListener("mouseleave", () => {
            btnMateria.style.backgroundColor = "#1a2744";
            btnMateria.style.transform = "scale(1)";
        });
    }
    const contenido = document.getElementById("contenido");
    if (contenido) {
        contenido.style.backgroundColor = "#fff";
        contenido.style.padding = "40px";
        contenido.style.maxWidth = "900px";
        contenido.style.margin = "40px auto";
        contenido.style.borderRadius = "12px";
        contenido.style.boxShadow = "0 0 12px rgba(0,0,0,0.15)";
        contenido.style.color = "#333";
        contenido.style.fontSize = "16px";
        contenido.style.lineHeight = "1.6";

        const h2s = contenido.querySelectorAll("h2");

        h2s.forEach(h2 => {
            h2.style.textAlign = "center";
            h2.style.marginBottom = "25px";
            h2.style.color = "#1a2744";
        });
    }

    const info = document.getElementById("info-materias");
    if (info) {
        info.style.display = "flex";
        info.style.justifyContent = "space-between";
        info.style.alignItems = "center";
        info.style.marginBottom = "20px";
        info.style.fontWeight = "600";

        info.querySelectorAll("div").forEach(div => div.style.flex = "1");
        info.children[0].style.textAlign = "left";
        info.children[1].style.textAlign = "center";
        info.children[2].style.textAlign = "right";
    }

    const tablas = document.querySelectorAll(".tabla-materias");
    if (!tablas.length) return;

    tablas.forEach(tabla => {

        tabla.style.width = "100%";
        tabla.style.borderCollapse = "collapse";
        tabla.style.marginTop = "20px";
        tabla.style.fontSize = "15px";

        tabla.querySelectorAll("thead th").forEach(th => {
            th.style.backgroundColor = "#1a2744";
            th.style.color = "#ffffff";
            th.style.padding = "12px";
            th.style.textAlign = "center";
            th.style.fontWeight = "600";
            th.style.borderBottom = "2px solid #dee2e6";
        });

        tabla.querySelectorAll("tbody td").forEach(td => {
            td.style.padding = "10px 12px";
            td.style.borderBottom = "1px solid #e5e7eb";
            td.style.verticalAlign = "middle";
        });

        tabla.querySelectorAll("tbody tr").forEach(tr => {
            tr.addEventListener("mouseenter", () => tr.style.backgroundColor = "#f4f6f9");
            tr.addEventListener("mouseleave", () => tr.style.backgroundColor = "transparent");
        });

        tabla.querySelectorAll("select").forEach(select => {
            select.style.width = "100%";
            select.style.padding = "6px 10px";
            select.style.borderRadius = "8px";
            select.style.border = "1px solid #cbd5e1";
            select.style.fontSize = "14px";
            select.style.backgroundColor = "#ffffff";
            select.style.cursor = "pointer";
            select.style.transition = "all 0.2s ease";

            select.addEventListener("focus", () => {
                select.style.borderColor = "#2563eb";
                select.style.boxShadow = "0 0 0 2px rgba(37,99,235,0.25)";
            });

            select.addEventListener("blur", () => {
                select.style.borderColor = "#cbd5e1";
                select.style.boxShadow = "none";
            });
        });

        tabla.querySelectorAll(".btn-asignar").forEach(btn => {
            btn.style.backgroundColor = "#1a2744";
            btn.style.color = "#ffffff";
            btn.style.border = "none";
            btn.style.padding = "6px 14px";
            btn.style.borderRadius = "8px";
            btn.style.fontSize = "14px";
            btn.style.fontWeight = "600";
            btn.style.cursor = "pointer";
            btn.style.transition = "all 0.2s ease-in-out";
            btn.style.boxShadow = "0 2px 6px rgba(0,0,0,0.15)";
        });

        tabla.querySelectorAll("tbody tr").forEach(fila => {

            const selectProfesor = fila.querySelector(".select-profesor");
            const selectRegion   = fila.querySelector(".select-region");
            const boton          = fila.querySelector(".btn-asignar");

            if (!selectProfesor || !selectRegion || !boton) return;

            const validar = () => {
                boton.disabled = !(selectProfesor.value && selectRegion.value);
                boton.style.opacity = boton.disabled ? "0.5" : "1";
                boton.style.cursor = boton.disabled ? "not-allowed" : "pointer";
            };

            selectProfesor.addEventListener("change", validar);
            selectRegion.addEventListener("change", validar);
            validar();

            boton.addEventListener("click", () => {

                if (boton.dataset.cargando === "1") return;

                boton.dataset.cargando = "1";
                boton.disabled = true;
                boton.innerHTML = `<span class="spinner"></span> Asignando...`;
                boton.style.cursor = "wait";

                fetch("/materias/asignar", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content")
                    },
                    body: JSON.stringify({
                        materia: boton.dataset.materia,
                        periodo: boton.dataset.periodo,
                        profesor: selectProfesor.value,
                        region: selectRegion.value
                    })
                })
                .then(r => r.json())
                .then(data => {
                    if (data.ok) {
                        location.reload();
                    } else {
                        throw new Error();
                    }
                })
                .catch(() => {
                    boton.dataset.cargando = "0";
                    boton.innerHTML = "Asignar";
                    boton.disabled = false;
                    validar();
                    alert("Error al asignar");
                });
            });
        });
    });
    document.querySelectorAll('.btn-eliminar').forEach(btn => {
        btn.style.backgroundColor = "#dc2626";
        btn.style.color = "#fff";
        btn.style.border = "none";
        btn.style.padding = "6px 12px";
        btn.style.borderRadius = "8px";
        btn.style.cursor = "pointer";
    });

    const btnMateria1 = document.getElementById("btn-materia");
    const selectMateria1 = document.getElementById("materia");
    const tbody = document.getElementById("tbody-materias");

    if (btnMateria1 && selectMateria1 && tbody) {
    btnMateria1.addEventListener("click", () => {
        const selectedOption = selectMateria1.options[selectMateria1.selectedIndex];

        if (!selectedOption || !selectMateria1.value) {
            alert("Selecciona una materia primero");
            return;
        }

        const materia  = selectedOption.dataset.materia;
        const profesor = selectedOption.dataset.profesor;
        const periodo  = selectedOption.dataset.periodo;
        const region   = selectedOption.dataset.region;

        fetch("/materias/ver", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content")
            },
            body: JSON.stringify({
                materia: materia,
                profesor: profesor,
                periodo: periodo,
                region: region
            })
        })
        .then(res => res.json())
        .then(data => {
            if (!data.ok) {
                alert("Error en la consulta");
                return;
            }

            tbody.innerHTML = "";

            if (data.data.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" style="text-align:center;">No hay alumnos registrados</td>
                    </tr>`;
            } else {
                data.data.forEach(row => {
                    tbody.innerHTML += `
                        <tr>
                            <td style="text-align:center;">${row.NOMBRE_MATERIA}</td>
                            <td style="text-align:center;">${row.NOMBRE_COMPLETO}</td>
                            <td style="text-align:center;">${row.CUATRIMESTRE}</td>
                            <td style="text-align:center;">
                                <input 
                                    type="number"
                                    min="0"
                                    max="10"
                                    step="1"
                                    class="input-calificacion"
                                    value="${row.CALIFICACION ?? ''}"
                                    data-id="${row.ID}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, ''); 
                                            if (this.value > 10) this.value = 10;"
                                    style="
                                        width: 70px;
                                        padding: 6px 10px;
                                        border-radius: 8px;
                                        border: 1px solid #cbd5e1;
                                        text-align: center;
                                        font-size: 14px;
                                    "
                                >
                            </td>
                            <td style="text-align:center;">
                                <button 
                                    class="btn-guardar-calificacion"
                                    data-id="${row.ID}"
                                >
                                    Guardar
                                </button>
                            </td>
                        </tr>
                    `;
                });
            }

            document.querySelectorAll(".input-calificacion").forEach(input => {
                input.style.width = "80px";
                input.style.padding = "6px 10px";
                input.style.borderRadius = "8px";
                input.style.border = "1px solid #cbd5e1";
                input.style.fontSize = "14px";
                input.style.textAlign = "center";
            });

            document.querySelectorAll(".btn-guardar-calificacion").forEach(btn => {
                btn.style.backgroundColor = "#1a2744";
                btn.style.color = "#ffffff";
                btn.style.border = "none";
                btn.style.padding = "8px 18px";
                btn.style.borderRadius = "10px";
                btn.style.fontSize = "14px";
                btn.style.fontWeight = "600";
                btn.style.cursor = "pointer";
                btn.style.transition = "all 0.2s ease-in-out";
                btn.style.boxShadow = "0 4px 10px rgba(0,0,0,0.15)";

                btn.addEventListener("mouseenter", () => {
                    btn.style.backgroundColor = "#2563eb";
                    btn.style.transform = "scale(1.05)";
                });

                btn.addEventListener("mouseleave", () => {
                    btn.style.backgroundColor = "#1a2744";
                    btn.style.transform = "scale(1)";
                });

            });
        })
        .catch(err => {
            console.error(err);
            alert("Error al consultar la materia");
        });
    });
}

    const btnAlumnos = document.querySelector(".btn-alumnos");

    if (btnAlumnos) {
        btnAlumnos.style.backgroundColor = "#1a2744";
        btnAlumnos.style.color = "#ffffff";
        btnAlumnos.style.border = "none";
        btnAlumnos.style.padding = "10px 22px";
        btnAlumnos.style.borderRadius = "10px";
        btnAlumnos.style.fontSize = "15px";
        btnAlumnos.style.fontWeight = "600";
        btnAlumnos.style.cursor = "pointer";
        btnAlumnos.style.transition = "all 0.2s ease-in-out";
        btnAlumnos.style.boxShadow = "0 4px 10px rgba(0,0,0,0.15)";

        btnAlumnos.addEventListener("mouseenter", () => {
            btnAlumnos.style.backgroundColor = "#2563eb";
            btnAlumnos.style.transform = "scale(1.05)";
        });

        btnAlumnos.addEventListener("mouseleave", () => {
            btnAlumnos.style.backgroundColor = "#1a2744";
            btnAlumnos.style.transform = "scale(1)";
        });

        btnAlumnos.addEventListener("click", () => {

            if (btnAlumnos.dataset.cargando === "1") return;

            btnAlumnos.dataset.cargando = "1";
            btnAlumnos.disabled = true;
            btnAlumnos.innerHTML = `<span class="spinner"></span> Asignando alumnos...`;
            btnAlumnos.style.cursor = "wait";
            btnAlumnos.style.opacity = "0.85";

            fetch("/materias/asignar-alumnos", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content")
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) {
                    alert("Alumnos asignados correctamente");
                    location.reload();
                } else {
                    throw new Error(data.mensaje);
                }
            })
            .catch(() => {
                btnAlumnos.dataset.cargando = "0";
                btnAlumnos.disabled = false;
                btnAlumnos.innerHTML = "Asignar Alumnos";
                btnAlumnos.style.cursor = "pointer";
                btnAlumnos.style.opacity = "1";
                alert("Error al asignar alumnos");
            });
        });
    }
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("btn-guardar-calificacion")) {

            const btn = e.target;
            const id = btn.dataset.id;
            const input = btn.closest("tr").querySelector(".input-calificacion");
            const calificacion = input.value;

            if (calificacion === "" || calificacion < 0 || calificacion > 10) {
                alert("La calificación debe ser un número entre 0 y 10");
                return;
            }

            fetch("/materias/guardar-calificacion", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content")
                },
                body: JSON.stringify({
                    id: id,
                    calificacion: calificacion
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) {
                    alert("Calificación guardada correctamente ✅");
                } else {
                    alert("Error al guardar la calificación ❌");
                }
            })
            .catch(err => {
                console.error(err);
                alert("Error de comunicación con el servidor");
            });
        }
    });
    

});
