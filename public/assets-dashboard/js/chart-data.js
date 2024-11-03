"use strict";
$(document).ready(function () {
  var options = {
    series: [
      { name: "Terjual", data: [31, 40, 28, 51, 42, 109, 100] },
      { name: "Stok", data: [11, 32, 45, 32, 34, 52, 41] },
    ],
    chart: { height: 350, type: "area" },
    dataLabels: { enabled: false },
    stroke: { curve: "smooth" },
    colors: ["#8944D7", "#00B871"],
    xaxis: {
      type: "datetime",
      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
    },
    legend: { position: "top" },
    tooltip: { x: { format: "dd/MM/yy HH:mm" } },
  };
  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();
  var options = {
    series: [
      { name: "Total", data: [44, 55, 57, 56, 61, 58, 63, 60, 66] },
      { name: "Bersih", data: [31, 41, 45, 39, 50, 45, 52, 43, 60] },
    ],
    chart: { type: "bar", height: 350 },
    plotOptions: { bar: { horizontal: false, columnWidth: "55%", endingShape: "rounded" } },
    dataLabels: { enabled: false },
    stroke: { show: true, width: 2, colors: ["transparent"] },
    xaxis: { categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"] },
    // yaxis: { title: { text: "$ (thousands)" } },
    colors: ["#8944D7", "#00B871"],
    fill: { opacity: 1 },
    tooltip: {
      y: {
        formatter: function (val) {
          return "Rp " + val + "Jt Rupiah";
        },
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#chart2"), options);
  chart.render();
  var options = {
    series: [{ name: "Value Rp", data: [10, 41, 35, 51, 49, 62, 69, 91, 148] }],
    chart: { height: 450, type: "line", zoom: { enabled: false } },
    dataLabels: { enabled: false },
    stroke: { curve: "straight" },
    markers: { size: 6, colors: ["#00B871"], strokeColors: "#fff", strokeWidth: 2, hover: { size: 7 } },
    colors: ["#8944D7"],
    grid: { row: { colors: ["transparent", "transparent"], opacity: 0.5 } },
    xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"] },
  };
  var chart = new ApexCharts(document.querySelector("#chart4"), options);
  chart.render();
  Morris.Donut({
    element: "chart3",
    data: [
      { label: "Total", value: 60000, labelColor: "#8944D7" },
      { label: "Teachers", value: 15000, labelColor: "#2FDF84" },
      { label: "Parents", value: 15000, labelColor: "#00B871" },
      { label: "Students", value: 30000, labelColor: "#86B1F2" },
    ],
    colors: ["#8944D7", "#2FDF84", "#00B871", "#86B1F2"],
    resize: true,
    redraw: true,
  });
});
