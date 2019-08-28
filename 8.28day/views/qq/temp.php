<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"><link rel="icon" href="https://jscdn.com.cn/highcharts/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* css 代码  */
    </style>
    <script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
    <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
    <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
</head>
<body>
<div id="container" style="min-width:400px;height:400px"></div>
<script>
    // JS 代码
    var chart = Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: '温度变化范围'
        },
        subtitle: {
            text: '数据来源: WorldClimate.com'
        },
        xAxis: {
            categories: ['日','一', '二', '三', '四', '五', '六',
                ]
        },
        yAxis: {
            title: {
                text: '温度'
            },
            labels: {
                formatter: function () {
                    return this.value + '°';
                }
            }
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: '最高',
            marker: {
                symbol: 'square'
            },
            data: [<?php echo $temp_high;?>]
        }, {
            name: '最低',
            marker: {
                symbol: 'diamond'
            },
            data: [<?php echo $temp_low;?>]
        }]
    });
</script>
</body>
</html>