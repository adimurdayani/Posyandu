var colors = ["#f1556c"];
(dataColors = $("#total-revenue").data("colors")) && (colors = dataColors.split(","));
var options = {
    series: [68],
    chart: { height: 220, type: "radialBar" },
    plotOptions: {
        radialBar: { hollow: { size: "65%" } }
    },
    colors: colors,
    labels: ["Revenue"]
};