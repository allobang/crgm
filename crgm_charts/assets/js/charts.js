var chart1 = document.getElementById("linechart");
var chart2 = document.getElementById('barchart');
var chart3 = document.getElementById("piechart");
var chart4 = document.getElementById("doughnutchart").getContext('2d');

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}// Assuming productNames is already defined and filled with product names from your PHP script
var backgroundColors = productNames.map(() => getRandomColor()); // Generate a color for each product


// new
var myChart1 = new Chart(chart1, {
type: 'line',
data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
        data: monthlyTotals,
        backgroundColor: "rgba(48, 164, 255, 0.2)",
        borderColor: "rgba(48, 164, 255, 0.8)",
        fill: true,
        borderWidth: 1
    }]
},
options: {
    animation: {
        duration: 2000,
        easing: 'easeOutQuart',
    },
    plugins: {
        legend: {
            display: false,
            position: 'right',
        },
        title: {
            display: true,
            text: 'Sales volume',
            position: 'left',
        },
    },
}
});

// new
var myChart2 = new Chart(chart2, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Cash',
                backgroundColor: "rgba(54, 162, 235, 0.5)",
                borderColor: "rgb(54, 162, 235)",
                borderWidth: 1,
                data: totalAmountCash,
            }, {
                label: 'Credit',
                backgroundColor: "rgba(244, 67, 54, 0.5)",
                borderColor: "rgb(255, 99, 132)",
                borderWidth: 1,
                data: totalAmountCredit,
        }]
    },
    options: {
        animation: {
            duration: 2000,
            easing: 'easeOutQuart',
        },
        plugins: {
            legend: {
                display: true,
                position: 'top',
            },
            title: {
                display: true,
                text: 'Revenue',
                position: 'left',
            },
        },
    }
    });

    // new
    var myChart3 = new Chart(chart3, {
        type: 'pie',
        data: {
            labels: productNames, // Use productNames from PHP
            datasets: [{
                data: totalAmounts, // Use totalAmounts from PHP
                backgroundColor: backgroundColors,
                hoverOffset: 4
            }]
        },
        options: {
            animation: {
                duration: 2000,
                easing: 'easeOutQuart',
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                },
                title: {
                    display: false, // Set to true if you want to show a title
                    text: 'Sales Performance by Product',
                    position: 'top',
                },
            },
        }
    });
// new
var myChart4 = new Chart(chart4, {
    type: 'doughnut',
    data: {
        labels: percentageLabels,
        datasets: [{
            data: yearlyAmounts,
            backgroundColor: ["#F44336", "#2196F3", "#795548", "#6da252", "#f39c12", "#009688", "#673AB7"],
            hoverOffset: 4
        }]
    },
    options: {
        animation: {
            duration: 2000,
            easing: 'easeOutQuart',
        },
        plugins: {
            legend: {
                display: true,
                position: 'right',
            },
            title: {
                display: false,
                text: 'Total Value',
                position: 'left',
            },
        },
    }
    });
    