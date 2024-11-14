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
