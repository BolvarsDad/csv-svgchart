const chart = document.querySelector("#dataChart");
chart.getContext("2d");

// FILE(s)

let barChart = new Chart(chart, {
    // instead of having to use rotational and translational properties in SVG, Chart.js does it automatically.
    type: 'bar',
    data: {
        // chart rows
        labels: [
        "Ensam-stående med barn",
        "Ensam- stående utan barn",
        "Samman-boende  med barn",
        "Samman-boende utan barn",
        "Övriga samman-boende med barn",
        "Övriga",
        "Samtliga hushåll"
        ],
        datasets: [{
            label: "Hushållsgrupp - utgifter i kronor per hushåll, 2007-2009",
            data: [12, 19, 3, 12, 1, 3, 15],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(10, 242, 157, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(0, 161, 102, 1)'
            ],
            borderWidth: 1
        }],
    },
    options: {
        scales: {
            yAxes: [{   
                // adds 'kr' to tick labels
                ticks: {
                    callback: function(value) {
                        return value + "kr"
                    },
                },
            }],
        },

    },

});

