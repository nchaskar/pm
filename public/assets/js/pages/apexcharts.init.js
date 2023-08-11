var options = {
    chart: { height: 380, type: "line", zoom: { enabled: !1 }, toolbar: { show: !1 } },
    colors: ["#556ee6", "#34c38f"],
    dataLabels: { enabled: !1 },
    stroke: { width: [3, 3], curve: "straight" },
    series: [
        { name: "0-5 years", data: [6, 4, 3, 4, 2, 1, 3] },
        { name: "6-10", data: [5, 2, 1, 2, 7, 3, 1] },
        { name: "11-15", data: [8, 3, 5, 5, 4, 0, 3] },
        { name: "16-20", data: [3, 4, 6, 8, 5, 1, 6] },
        { name: "21-25", data: [7, 5, 6, 3, 2, 7, 4] },
        { name: "26-30", data: [2, 6, 2, 1, 1, 4, 2] },
        { name: "31-35", data: [9, 7, 3, 12, 4, 2, 1] },
        { name: "36-40", data: [10, 8, 8, 5, 3, 1, 5] },
        { name: "41-45", data: [1, 9, 6, 8, 6, 6, 7] },
        { name: "46-50", data: [8, 2, 6, 1, 2, 3, 6] },
        { name: "51-55", data: [0, 4, 5, 7, 5, 2, 2] },
    ],
    title: { text: "Average High & Low Temperature", align: "left", style: { fontWeight: "500" } },
    grid: { row: { colors: ["transparent", "transparent"], opacity: 0.2 }, borderColor: "#f1f1f1" },
    markers: { style: "inverted", size: 6 },
    xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"], title: { text: "Month" } },
    yaxis: { title: { text: "Temperature" }, min: 5, max: 10 },
    legend: { position: "top", horizontalAlign: "right", floating: !0, offsetY: -25, offsetX: -5 },
    responsive: [{ breakpoint: 600, options: { chart: { toolbar: { show: !1 } }, legend: { show: !1 } } }],
},
chart = new ApexCharts(document.querySelector("#line_chart_datalabel"), options);
chart.render();
options = {
chart: { height: 380, type: "line", zoom: { enabled: !1 }, toolbar: { show: !1 } },
colors: ["#192461", "#85D24C", "#C00389", "#489694", "#DF7A6F"],
dataLabels: { enabled: !1 },
stroke: { width: [3, 4, 3], curve: "straight", dashArray: [0, 8, 5] },
series: [
    { name: "Pre-primary", data: [1, 2, 3, 2, 5, 2, 6, 3, 1, 2, 5, 1] },
    { name: "Primary", data: [3, 5, 3, 4, 6, 2, 2, 10, 12, 10, 8, 6] },
    { name: "Middle", data: [6, 4, 7, 8, 2, 4, 8, 5, 3, 7, 8, 9] },
    { name: "Secondary", data: [2, 6, 5, 8, 2, 8, 4, 6, 4, 8, 6, 9] },
    { name: "Senior Secondary", data: [8, 5, 7, 9, 7, 3, 6, 4, 8, 5, 4, 4] },
],
title: { text: "Daily Tracking", align: "left", style: { fontWeight: "500" } },
markers: { size: 0, hover: { sizeOffset: 6 } },
xaxis: { categories: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan", "08 Jan", "09 Jan", "10 Jan", "11 Jan", "12 Jan"] },
tooltip: {
    y: [
        {
            title: {
                formatter: function (e) {
                    return e + " ";
                },
            },
        },
        {
            title: {
                formatter: function (e) {
                    return e + " ";
                },
            },
        },
        {
            title: {
                formatter: function (e) {
                    return e;
                },
            },
        },
    ],
},
grid: { borderColor: "#f1f1f1" },
};
(chart = new ApexCharts(document.querySelector("#line_chart_dashed"), options)).render();

options = {
chart: { height: 350, type: "bar", toolbar: { show: !1 } },
plotOptions: { bar: { horizontal: !1, columnWidth: "45%", endingShape: "rounded" } },
dataLabels: { enabled: !1 },
stroke: { show: !0, width: 2, colors: ["transparent"] },
series: [
    { name: "Pre-primary", data: [11, 7, 9, 5, 3, 8, 4, 6, 6] },
    { name: "Primary", data: [13, 8, 10, 7, 6, 4, 9, 4, 4] },
    { name: "Middle", data: [3, 12, 5, 6, 4, 5, 4, 5, 4] },
    { name: "Secondary", data: [10, 2, 8, 6, 7, 5, 7, 5, 3] },
    { name: "Senior Secondary", data: [6, 4, 3, 6, 4, 5, 4, 5, 4] }
],
colors: ["#34c38f", "#556ee6", "#f46a6a"],
xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"] },
yaxis: { title: { text: "Completed", style: { fontWeight: "500" } } },
grid: { borderColor: "#f1f1f1" },
fill: { opacity: 1 },
tooltip: {
    y: {
        formatter: function (e) {
            return "" + e + " Completed";
        },
    },
},
};
(chart = new ApexCharts(document.querySelector("#column_chart"), options)).render();

options = {
chart: { height: 320, type: "pie" },
series: [10, 15, 20, 17, 12],
labels: ["Pre-primary", "Primary", "Middle", "Secondary", "Senior Secondary"],
colors: ["#34c38f", "#556ee6", "#f46a6a", "#50a5f1", "#f1b44c"],
legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0 },
responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
};
(chart = new ApexCharts(document.querySelector("#pie_chart"), options)).render();
