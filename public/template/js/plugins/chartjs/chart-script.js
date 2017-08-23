/*
* Trending line chart
*/
//var randomScalingFactor = function(){ return Math.round(Math.random()*10)};
var data = {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUNE", "JULY", "AUG", "SEP", "OCT", "NOV", "DEC"],
    datasets: [
        {
            label: "First dataset",
            fillColor: "rgba(128, 222, 234, 0.6)",
            strokeColor: "#ffffff",
            pointColor: "#00bcd4",
            pointStrokeColor: "#ffffff",
            pointHighlightFill: "#ffffff",
            pointHighlightStroke: "#ffffff",
            data: [1, 5, 2, 4, 8, 5, 8, 12]
        },
        {
            label: "Second dataset",
            fillColor: "rgba(128, 222, 234, 0.3)",
            strokeColor: "#80deea",
            pointColor: "#00bcd4",
            pointStrokeColor: "#80deea",
            pointHighlightFill: "#80deea",
            pointHighlightStroke: "#80deea",
            data: [6, 2, 9, 2, 5, 10, 4, 3]
        }
    ]
};

var nReloads = 0;
var min = 1;
var max = 10;
var l = 0;
var trendingLineChart;

function update() {
    nReloads++;

    var x = Math.floor(Math.random() * (max - min + 1)) + min;
    var y = Math.floor(Math.random() * (max - min + 1)) + min;
    trendingLineChart.addData([x, y], data.labels[l]);
    trendingLineChart.removeData();
    l++;
    if (l == data.labels.length) {
        l = 0;
    }
}

setInterval(update, 3000);


/*
Polor Chart Widget
*/

var doughnutData = [
    {
        value: 3000,
        color: "#F7464A",
        highlight: "#FF5A5E",
        label: "Mobile"
    },
    {
        value: 500,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Kitchen"
    },
    {
        value: 1000,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Home"
    }

];

/*
Trending Bar Chart
*/

var dataBarChart = {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY"],
    datasets: [
        {
            label: "Bar dataset",
            fillColor: "#46BFBD",
            strokeColor: "#46BFBD",
            highlightFill: "rgba(70, 191, 189, 0.4)",
            highlightStroke: "rgba(70, 191, 189, 0.9)",
            data: [6, 9, 8, 4, 6]
        }
    ]
};


var nReloads1 = 0;
var min1 = 1;
var max1 = 10;
var l1 = 0;
var trendingBarChart;

function updateBarChart() {
    nReloads1++;
    var x = Math.floor(Math.random() * (max1 - min1 + 1)) + min1;
    trendingBarChart.addData([x], dataBarChart.labels[l1]);
    trendingBarChart.removeData();
    l1++;
    if (l1 == dataBarChart.labels.length) {
        l1 = 0;
    }
}

setInterval(updateBarChart, 3000);


window.onload = function () {
    var trendingLineChart = document.getElementById("trending-line-chart").getContext("2d");
    window.trendingLineChart = new Chart(trendingLineChart).Line(data, {
        scaleShowGridLines: true,///Boolean - Whether grid lines are shown across the chart
        scaleGridLineColor: "rgba(255,255,255,0.4)",//String - Colour of the grid lines
        scaleGridLineWidth: 1,//Number - Width of the grid lines
        scaleShowHorizontalLines: true,//Boolean - Whether to show horizontal lines (except X axis)
        scaleShowVerticalLines: false,//Boolean - Whether to show vertical lines (except Y axis)
        bezierCurve: true,//Boolean - Whether the line is curved between points
        bezierCurveTension: 0.4,//Number - Tension of the bezier curve between points
        pointDot: true,//Boolean - Whether to show a dot for each point
        pointDotRadius: 5,//Number - Radius of each point dot in pixels
        pointDotStrokeWidth: 2,//Number - Pixel width of point dot stroke
        pointHitDetectionRadius: 20,//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        datasetStroke: true,//Boolean - Whether to show a stroke for datasets
        datasetStrokeWidth: 3,//Number - Pixel width of dataset stroke
        datasetFill: true,//Boolean - Whether to fill the dataset with a colour
        animationSteps: 60,// Number - Number of animation steps
        animationEasing: "easeOutQuart",// String - Animation easing effect
        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
        scaleFontSize: 12,// Number - Scale label font size in pixels
        scaleFontStyle: "normal",// String - Scale label font weight style
        scaleFontColor: "#fff",// String - Scale label font colour
        tooltipEvents: ["mousemove", "touchstart", "touchmove"],// Array - Array of string names to attach tooltip events
        tooltipFillColor: "rgba(255,255,255,0.8)",// String - Tooltip background colour
        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
        tooltipFontSize: 12,// Number - Tooltip label font size in pixels
        tooltipFontColor: "#000",// String - Tooltip label font colour
        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
        tooltipTitleFontSize: 14,// Number - Tooltip title font size in pixels
        tooltipTitleFontStyle: "bold",// String - Tooltip title font weight style
        tooltipTitleFontColor: "#000",// String - Tooltip title font colour
        tooltipYPadding: 8,// Number - pixel width of padding around tooltip text
        tooltipXPadding: 16,// Number - pixel width of padding around tooltip text
        tooltipCaretSize: 10,// Number - Size of the caret on the tooltip
        tooltipCornerRadius: 6,// Number - Pixel radius of the tooltip border
        tooltipXOffset: 10,// Number - Pixel offset from point x to tooltip edge
        responsive: true
    });

    var doughnutChart = document.getElementById("doughnut-chart").getContext("2d");
    window.myDoughnut = new Chart(doughnutChart).Doughnut(doughnutData, {
        segmentStrokeColor: "#fff",
        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
        percentageInnerCutout: 50,
        animationSteps: 100,
        segmentStrokeWidth: 4,
        animateScale: true,
        percentageInnerCutout: 60,
        responsive: true
    });

    var trendingBarChart = document.getElementById("trending-bar-chart").getContext("2d");
    window.trendingBarChart = new Chart(trendingBarChart).Bar(dataBarChart, {
        scaleShowGridLines: false,///Boolean - Whether grid lines are shown across the chart
        showScale: true,
        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
        responsive: true
    });
};
