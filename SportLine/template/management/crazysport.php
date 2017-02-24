<!DOCTYPE html>
<html lang="en">
<head>

    <?php
        require_once("../../template/head.php");
    ?>
    <title>Crazy Sports</title>
    <link rel="stylesheet" href="../../css/CirclePercentage.css"/>
    <link rel="stylesheet" href="../../css/table.css">
</head>
<body>
<div class="wrapper">
    <?php
        require_once ("../../template/sidebar.php");
    ?>
    <div class="main-panel">
        <div class="header" style="position:relative;margin: 7% 0% -4% 0.5%;">
            <div class="card">
                <div class="row">
                    <h3 class="title" style="margin-top: 1%;" align="center">
                        Crazy Sports
                    </h3>
                    <h5>Sport Situation</h5>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label class="radio" id="day">
                            <input type="radio" data-toggle="radio" name="optionRadios" value="" checked=""/>
                            Today
                        </label>
                        <label class="radio" id="week">
                            <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                            This Week
                        </label>
                        <label class="radio" id="total">
                            <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                            Total
                        </label>
                    </div>
                </div>
                <div class="row">
                    <h5>Goal</h5>
                    <div class="col-md-3 col-sm-3 col-xs-3 ">
                        <label class="control-label">
                            Distance(km)
                        </label>
                        <div class="input-group" >
                            <input id="distance_" type="text"value=""  class="form-control"  required/>
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 ">
                        <label class="control-label">
                            Time(hours)
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" id="time_" required>
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 ">
                        <label class="control-label">
                            Step
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" id="step_" required>
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label">
                            Calorie
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" id="calorie_" required>
                        </div><!-- /input-group -->
                    </div>
                        <button class="btn btn-default pull-right" type="submit"style="position:relative;margin-left:-5%" onclick="submitGoal();return false;">Change</button>
                </div>

                <div class="row">
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
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style="margin-top: 1%;" align="center">
                            Distance Curve
                        </h3>
                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                            <label class="control-label">
                                Distance Variation
                            </label>
                            <label class="radio" id="dv_week">
                                <input type="radio" data-toggle="radio" name="optionRadios" value="" />
                                This Week
                            </label>
                            <label class="radio" id="dv_total">
                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                Total
                            </label>
                        </div>
                    </div>
                    <div id="distance_curve" class="ct-chart2">
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style="margin-top: 1%;" align="center">
                            Sport Time Curve
                        </h3>
                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                            <label class="control-label">
                                Sport Time Variation
                            </label>
                            <label class="radio" id="tv_week">
                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                This Week
                            </label>
                            <label class="radio" id="tv_total">
                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                Total
                            </label>
                        </div>
                    </div>
                    <div id="time_curve" class="ct-chart2">
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style="margin-top: 1%;" align="center">
                            Step Curve
                        </h3>
                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                            <label class="control-label">
                                Step Variation
                            </label>
                            <label class="radio" id="sv_week">
                                <input type="radio" data-toggle="radio" name="optionRadios" value="" />
                                This Week
                            </label>
                            <label class="radio" id="sv_total">
                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                Total
                            </label>
                        </div>
                    </div>
                    <div id="step_curve" class="ct-chart2">
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="header">
                        <h3 class="title" style="margin-top: 1%;" align="center">
                            Calorie Curve
                        </h3>
                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                            <label class="control-label">
                                Calorie Variation
                            </label>
                            <label class="radio" id="cv_week">
                                <input type="radio" data-toggle="radio" name="optionRadios" value="" />
                                This Week
                            </label>
                            <label class="radio" id="cv_total">
                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                Total
                            </label>
                        </div>
                    </div>
                    <div id="calorie_curve" class="ct-chart2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once ("../../template/foot.php");
?>
<!--Charts Plugins-->
<script src="../../js/echarts.js"></script>
<script src="../../js/bootstrap-table.js"></script>
<script src="../../js/table.js"></script>
<!--Circla Percentage-->
<script src="../../js/jquery.easypiechart.min.js"></script>
<script src="../../WebContent/js/Sidebar.js"></script>
<script src="../../js/Sport.js"></script>
<!--  Checkbox, Radio, Switch and Tags Input Plugins -->

<script>
    var type = "";
    var distance,time,step,calorie;
    type = "day";
    show(type);

    $("#dv_week").addClass("checked");
    $("#tv_week").addClass("checked");
    $("#sv_week").addClass("checked");
    $("#cv_week").addClass("checked");
    drawDistance("week");
    drawTime("week");
    drawStep("week");
    drawCalorie("week");

    $("#day").click(function(){
        type = "day";
        show(type);
    });
    $("#week").click(function(){
        type = "week";
        show(type);
    });
    $("#total").click(function(){
        type = "total";
        show(type);
    });
    $("#dv_week").click(function(){

        drawDistance("week");
    });
    $("#dv_total").click(function(){

        drawDistance("total");
    });

    $("#tv_week").click(function(){
        drawTime("week");
    });
    $("#tv_total").click(function(){
        drawTime("total");
    });

    $("#sv_week").click(function(){
        drawStep("week");
    });

    $("#sv_total").click(function(){
        drawStep("total");
    });

    $("#cv_week").click(function(){
        drawCalorie("week");
    });
    $("#cv_total").click(function(){
        drawCalorie("total");
    });

    function submitGoal(){
        alert("submit");
        distance = $("#distance_").val();
        time = $("#time_").val();
        step = $("#step_").val();
        calorie = $("#calorie_").val();
        submit(type,distance,time,step,calorie);
    }

    $('#distance,#time,#step,#calorie').easyPieChart({
        lineWidth: 6,
        size: 160,
        scaleColor: false,
        trackColor: 'rgba(255,255,255,.25)',
        barColor: '#FFFFFF',
        animate: ({duration: 5000, enabled: true})
    });
</script>
</body>
</html>