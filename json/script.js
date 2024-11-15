document.addEventListener('DOMContentLoaded', function() {
    fetch('/php/generar_resumen.php')
        .then(response => response.json())
        .then(data => {
            const linksResumen = document.getElementById('linksResumen');
            data.forEach(link => {
                const a = document.createElement('a');
                a.href = `/php/resumen.php?mes=${link.mes}&anio=${link.anio}`;
                a.innerText = `${link.mes}-${link.anio}`;
                linksResumen.appendChild(a);
                linksResumen.appendChild(document.createElement('br'));
            });
        });
});

document.addEventListener("DOMContentLoaded", function () {
    const selectEstado = document.getElementById("estado");

    // Función para actualizar el color del fondo según el valor seleccionado
    const actualizarColor = () => {
        const valor = selectEstado.value;
        if (valor === "presente") {
            selectEstado.style.backgroundColor = "green";
            selectEstado.style.color = "white";
        } else if (valor === "ausente") {
            selectEstado.style.backgroundColor = "red";
            selectEstado.style.color = "white";
        } else if (valor === "tardanza") {
            selectEstado.style.backgroundColor = "yellow";
            selectEstado.style.color = "black";
        } else {
            selectEstado.style.backgroundColor = ""; // Fondo por defecto
            selectEstado.style.color = "black"; // Texto negro por defecto
        }
    };

    // Actualizar color al cambiar la selección
    selectEstado.addEventListener("change", actualizarColor);

    // Inicializar el color según el valor por defecto
    actualizarColor();
});

