<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preload" as="image" href="bg/bg.jpg"  crossorigin="anonymous">
    <title>Monitoring Debit dan Ketinggian Air</title>

    <link href="css/styles.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>

    <style>
        .areaChart {
            margin-right: auto;
            margin-left: auto;
            text-align: center;
            width: 700px;
        }

        .areaBlock {
            margin-right: auto;
            margin-left: auto;
            text-align: center;
        }

        .areaBlock11 {
            margin-right: auto;
            margin-left: 400px;
            text-align: center;
        }

        .areaBlock22 {
            margin-right: 400px;
            margin-left: auto;
            text-align: center;
        }

        body {
            background-image: url("bg/bg.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }


        .invisible {
            width: 0;
            height: 0;
            overflow: hidden;
        }
        .chart-container {
        display: flex;
        justify-content: center;
        }
    </style>

</head>

<body class ="sb-nav-fixed">
                    <main>
                    <div class="container-fluid px-4">
                        <h1 style="color:white;" class="mt-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4 chart-container">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Grafik Kecepatan Air (m/L)
                                    </div>
                                    <div class="card-body"><canvas id="MyChart2" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4 chart-container">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Grafik Tinggi Air (cm)
                                    </div>
                                    <div class="card-body"><canvas id="MyChart3" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

    <div class="invisible" id="time"></div>

    <div class="invisible" id="kelembapan2"></div>
    <div class="invisible" id="suhu2"></div>

    <div class="invisible" id="kelembapan3"></div>
    <div class="invisible" id="suhu3"></div>
    <!-- Page level custom scripts -->

    <script type="text/javascript">



        //setup


        let data2 = {

            labels: [],
            datasets: [{
                label: "Debit Air (m/L)",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
                data: [],
            }],

        };
    

        let data3 = {

            labels: [],
            datasets: [{
                label: "Tinggi Air (cm)",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
                data: [],
            }],

        };


        const config2 = {
            type: 'line',
            data: data2,
            options: {
                scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
            }
        };

        const config3 = {
            type: 'line',
            data: data3,
            options: {
                scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }

            }
        };


        const myChart2 = new Chart(
            document.getElementById('MyChart2'),
            config2
        );

        const myChart3 = new Chart(
            document.getElementById('MyChart3'),
            config3
        );


        chartup2();
        async function chartup2() {
            $('#time').load('readingtime.php')
            let temp = $("#time").text().split(',')
            $("#kelembapan2").load('kelembapan2.php')
            let kelembaban1 = $("#kelembapan2").text().split(',')



            temp.pop()
            kelembaban1.pop()
            data2.labels = temp
            data2.datasets[0].data = kelembaban1
            myChart2.update()
            setTimeout(chartup2, 2000);
        }

        chartup3();
        async function chartup3() {
            $('#time').load('readingtime.php')
            let temp = $("#time").text().split(',')
            $("#suhu3").load('suhu3.php')
            let suhu3 = $("#suhu3").text().split(',');



            temp.pop()
            suhu3.pop()
            data3.labels = temp
            data3.datasets[0].data = suhu3
            myChart3.update()
            setTimeout(chartup3, 2000);
        }
    </script>


</body>

</html>