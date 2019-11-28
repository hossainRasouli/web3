
<div class="row" class="col-md-12 col-sm-12" style="margin: 2%; margin-bottom: 10%">
        <h3 style="text-align: center">سیستم آرشیف تذکره الکترونیکی</h3>
        <hr>
    <div class="row">
        <br><h5><b>ویژگی های دیتابیس:</b></h5>
        <h5>۱- تمامی اطلاعات افراد قابل ثبت می باشد.</h5>
        <h5>۲- قادر به دادن گزارش به صورت هفته وار، ماهوار، و سالانه افراد میباشد.</h5> 
        <h5>۳- قادر به تعیین دو نوع مدیر(مدیر درجه اول و مدیر درجه دوم) خواهید بود.</h5>
        <br>
    </div>
<script src="{{ asset("js/chart.js") }}"></script>
{{--<script src="{{ asset("scripts/pie.js") }}"></script>--}}

<script>
    $(document).ready(function () {


        $('.select2').select2();
        var lineChartData = {
            labels: ["1398","1399","1400","1401","1402","1403","1404","1405","1406"] ,
            datasets: [
                {
                    label: "Benfits",
                    fillColor: "rgba(0,220,220,0.2)",
                    strokeColor: "rgba(0,220,220,1)",
                    pointColor: "rgba(0,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data:[2000,400]                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(221,75,57,0.2)",
                    strokeColor: "rgba(221,75,57,1)",
                    pointColor: "rgba(221,75,57,1)",
                    pointStrokeColor: "#ccc",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(221,75,57,1)",
                    data: "";
            ]

        }
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });

    });


    $(document).ready(function () {



        $('.select2').select2();
        var lineChartData = {
            labels: ["جدی","دلو","حوت","حمل","ثور","جوزا","سرطان","اسد","سنبله","میزان","عقرب","قوس"] ,
            datasets: [
                {
                    label: "Benfits",
                    fillColor: "rgba(0,220,220,0.2)",
                    strokeColor: "rgba(0,220,220,1)",
                    pointColor: "rgba(0,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data:[2000,400]                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(221,75,57,0.2)",
                    strokeColor: "rgba(221,75,57,1)",
                    pointColor: "rgba(221,75,57,1)",
                    pointStrokeColor: "#ccc",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(221,75,57,1)",
                    data: "";
            ]

        }
        var ctx = document.getElementById("canvas2").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });

    });



    $(document).ready( $(function(){

        //get the pie chart canvas
        var ctx1 = $("#pie-chartcanvas-1");
        var ctx2 = $("#pie-chartcanvas-2");

        //pie chart data
        var data1 = {
            labels: ["match1", "match2", "match3", "match4", "match5"],
            datasets: [
                {
                    label: "TeamA Score",
                    data: [10, 50, 25, 70, 40],
                    backgroundColor: [
                        "#DEB887",
                        "#A9A9A9",
                        "#DC143C",
                        "#F4A460",
                        "#2E8B57"
                    ],
                    borderColor: [
                        "#CDA776",
                        "#989898",
                        "#CB252B",
                        "#E39371",
                        "#1D7A46"
                    ],
                    borderWidth: [1, 1, 1, 1, 1]
                }
            ]
        };

        //pie chart data
        var data2 = {
            labels: ["match1", "match2", "match3", "match4", "match5"],
            datasets: [
                {
                    label: "TeamB Score",
                    data: [20, 35, 40, 60, 50],
                    backgroundColor: [
                        "#FAEBD7",
                        "#DCDCDC",
                        "#E9967A",
                        "#F5DEB3",
                        "#9ACD32"
                    ],
                    borderColor: [
                        "#E9DAC6",
                        "#CBCBCB",
                        "#D88569",
                        "#E4CDA2",
                        "#89BC21"
                    ],
                    borderWidth: [1, 1, 1, 1, 1]
                }
            ]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Pie Chart",
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            }
        };

        //create Chart class object
        var chart1 = new Chart(ctx1, {
            type: "pie",
            data: data1,
            options: options
        });

        //create Chart class object
        var chart2 = new Chart(ctx2, {
            type: "pie",
            data: data2,
            options: options
        });
    })
    );


</script>



