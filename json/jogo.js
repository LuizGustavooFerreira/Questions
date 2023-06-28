function selecionar(labelSelecionado) {
    var labels = document.getElementsByTagName("label");
    labels[0].className = "";
    labels[1].className = "";
    labels[2].className = "";

    labelSeleccionado.className = "opcaoSelecionada";

}

$(function() {
    $('.chart').easyPieChart({
        size: 160,
        barColor: "#36e617",
        scaleLength: 0,
        lineWidth: 15,
        trackColor: "#525151",
        lineCap: "circle",
        animate: 2000,
    });
});