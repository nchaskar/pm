if($('#line-chart').length)
{
    var options = {
        series: [{ name: "Completed", data: [4,2,0,5,6,3,2,0,0,3,2,1,4,5,7,0,5,6,1,0,3,2,4] }],
        chart: { height: 320, type: "line", toolbar: "false", dropShadow: { enabled: !0, color: "#000", top: 18, left: 7, blur: 8, opacity: 0.2 } },
        dataLabels: { enabled: !1 },
        colors: ["#556ee6"],
        stroke: { curve: "smooth", width: 3 },
    },
    chart = new ApexCharts(document.querySelector("#line-chart"), options);
    chart.render();
}

if($('#donut-chart').length)
{
    options = { series: [4,10], chart: { type: "donut", height: 262 }, labels: ["Completed", "Pending"], colors: ["#34c38f", "#f46a6a"], legend: { show: !1 }, plotOptions: { pie: { donut: { size: "70%" } } } };
    (chart = new ApexCharts(document.querySelector("#donut-chart"), options)).render();
}

if($('#radialchart-1').length)
{
    var radialoptions1 = {
        series: [37],
        chart: { type: "radialBar", width: 60, height: 60, sparkline: { enabled: !0 } },
        dataLabels: { enabled: !1 },
        colors: ["#556ee6"],
        plotOptions: { radialBar: { hollow: { margin: 0, size: "60%" }, track: { margin: 0 }, dataLabels: { show: !1 } } },
    },
    radialchart1 = new ApexCharts(document.querySelector("#radialchart-1"), radialoptions1);
    radialchart1.render();
}

if($('#radialchart-2').length)
{
    var radialoptions2 = {
        series: [72],
        chart: { type: "radialBar", width: 60, height: 60, sparkline: { enabled: !0 } },
        dataLabels: { enabled: !1 },
        colors: ["#34c38f"],
        plotOptions: { radialBar: { hollow: { margin: 0, size: "60%" }, track: { margin: 0 }, dataLabels: { show: !1 } } },
    },
    radialchart2 = new ApexCharts(document.querySelector("#radialchart-2"), radialoptions2);
    radialchart2.render();
}

if($('#radialchart-3').length)
{
    var radialoptions3 = {
        series: [54],
        chart: { type: "radialBar", width: 60, height: 60, sparkline: { enabled: !0 } },
        dataLabels: { enabled: !1 },
        colors: ["#f46a6a"],
        plotOptions: { radialBar: { hollow: { margin: 0, size: "60%" }, track: { margin: 0 }, dataLabels: { show: !1 } } },
    },
    radialchart3 = new ApexCharts(document.querySelector("#radialchart-3"), radialoptions3);
    radialchart3.render();
}
