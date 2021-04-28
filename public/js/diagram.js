
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Місяць', 'Кількість токенів'],
            ["Грудень 2019", 45],
            ["Листопад 2019", 34],
            ["Жовтень 2019", 29],
            ["Вересень 2019", 31],
            ["Серпень 2019", 24],
            ["Липень 2019", 20],
            ["Червень 2019", 21],
            ["Травень 2019", 15],
            ["Квітень 2019", 15],
            ["Березень 2019", 12],
            ["Лютий 2019", 5],
            ["Січень 2019", 3]
        ]);

        var options = {
            title: 'Chess opening moves',
            legend: { position: 'none' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Кількість токенів'} // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    };




