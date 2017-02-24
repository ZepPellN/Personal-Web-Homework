<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once("../../template/head.php");
    ?>
    <title>Home</title>
    <link rel="stylesheet" href="../../css/CirclePercentage.css"/>
    <link rel="stylesheet" href="../../css/table.css">
</head>
<body>

<div class="wrapper">

    <?php
        require_once("../../template/sidebar.php");
    ?>
    <div class="main-panel">
        <div class="header" style="position:relative; margin:7% 0% -4% 0.5%;">
            <div class="card">

                <div class="row">
                    <h4 style="position:relative">The sport situation of today:</h4>
                    <br/>
                    <div class="col-lg-3 col-sm-6 col-xs-6 col-md-3">
                        <div class="card card-circle-chart" data-background="color" data-color="blue">
                            <div class="header text-center">
                                <h5 class="title" align="center">Distance</h5>
                                <p class="description" align="center" id="_distance"></p>
                            </div>
                            <div class="content">
                                <div id="distance" class="chart-circle" data-percent="70"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-6 col-md-3">
                        <div class="card card-circle-chart" data-background="color" data-color="green">
                            <div class="header text-center">
                                <h5 class="title"align="center">Time</h5>
                                <p class="description" align="center" id="_time"></p>
                            </div>
                            <div class="content">
                                <div id="time" class="chart-circle" data-percent=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-6 col-md-3">
                        <div class="card card-circle-chart" data-background="color" data-color="orange">
                            <div class="header text-center">
                                <h5 class="title" align="center">Step</h5>
                                <p class="description"align="center" id="_step"></p>
                            </div>
                            <div class="content">
                                <div id="step" class="chart-circle" data-percent=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-6 col-md-3">
                        <div class="card card-circle-chart" data-background="color" data-color="brown">
                            <div class="header text-center">
                                <h5 class="title" align="center">Calorie</h5>
                                <p class="description"align="center" id="_calorie"></p>
                            </div>
                            <div class="content">
                                <div id="calorie" class="chart-circle" data-percent=""></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <h4 style="position:relative">Amount of Exercise since you registered:</h4>
                        <br/>
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-3">
                            <h5  style=" text-align: center;" id="Distance"></h5>
                            <h5 style=" text-align: center;"><small >Distance(km)</small></h5>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-3">
                            <h5  style=" text-align: center;"id="Time"></h5>
                            <h5 style=" text-align: center;"><small >Time(hour)</small></h5>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-3">
                            <h5 style=" text-align: center;"id="Step"></h5>
                            <h5 style=" text-align: center;"><small >Step</small></h5>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-3">
                            <h5  style=" text-align: center;" id="Calorie"></h5>
                            <h5 style=" text-align: center;"><small>Calorie</small></h5>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <h4 style="position:relative">This can be used to:</h4>
                        <br/>
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-3">
                            <h5  style=" text-align: center;" id="lap"></h5>
                            <h5 style=" text-align: center;"><small>绕环形跑道(lap)</small></h5>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-3">
                            <h5 style=" text-align: center;" id="calorie_"></h5>
                            <h5 style=" text-align: center;"><small>消耗脂肪(g)</small></h5>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-3">
                            <h5 style=" text-align: center;" id="gas"></h5>
                            <h5 style=" text-align: center;"><small>消耗汽油(gallon)</small></h5>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-6 col-sm-3">
                            <h5  style=" text-align: center;" id="light"></h5>
                            <h5 style=" text-align: center;"><small>点亮灯光(hour)</small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
    require_once ("../../template/foot.php");
?>
<script src="../../js/table.js"></script>
<!--Circla Percentage-->
<script src="../../js/jquery.easypiechart.min.js"></script>
<!--Table plugins-->
<script src="../../js/bootstrap-table.js"></script>
<script src="../../js/Sport.js"></script>
<script>
    show("day");
    var temp = [];
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:"total",
            goal:'data'
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp = data[0];
        }
    });
    $("#Distance").html(temp.distance );
    $("#Step").html(temp.step );
    $("#Time").html(temp.time);
    $("#Calorie").html(temp.calorie);

    $("#lap").html(toDecimal(temp.calorie / 200) );
    $("#calorie_").html(toDecimal(temp.calorie / 9) );
    $("#gas").html(toDecimal(temp.calorie / 1500) );
    $("#light").html(toDecimal(temp.calorie / 14400 ));
</script>
</body>
</html>