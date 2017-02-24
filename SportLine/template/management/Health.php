<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>

    <title>Health Management</title>
    <link rel="stylesheet" href="../../WebContent/assets/css/set.css" >
    <link rel="stylesheet" href="../../css/card.css">

    <style>
        .bmi {
            float: left;
            text-align: center;
            margin-left: 10%;
            margin-top:10%;
            width: 30%;
        }

        .bmi input[type="submit"] {
            float: none;
            margin: 10px 0;
        }

        .bmi_img {
            margin: 20px auto;
            text-align: center;
        }

        .bmi_val {
            float: right;
            text-align: center;
            line-height: 130px;
            color: #EEE;
            border-radius: 50%;
            width: 130px;
            height: 130px;
            margin-right: 10%;
            background: #F3726D;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <?php
        require_once ("../../template/sidebar.php");
    ?>
    <div class="main-panel">
        <div class="header" style="position:relative;margin: 7% 0% -4% 0.5%;">
            <div class="card">
                <h3 class="title" align="center">
                    Health Management
                </h3>
                <div class="row">
                    <h4>Height And Weight</h4>

                    <form method="post" action="../../server/user/user_health_update.php">
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                            <label class="control-label">
                                Weight(kg)
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="weight_" name="weight">
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                            <label class="control-label">
                                Height(cm)
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="height_" name="height">
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                            <label class="control-label">
                                Walking Step(cm)
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" id="ws" name="walking_step">
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                            <label class="control-label">
                                Running Step(cm)
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" id="rs"  name="running_step">
                            </div><!-- /input-group -->
                        </div>
                        <button class="btn btn-default pull-right"type="submit">Change</button>
                    </form>
                    <div class="bmi_img">
                        <img align=center src="../../images/per.png" />
                        <div class="bmi_val">BMI<span id="bmi_val"></span></div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <p align="center">Your ideal weight is <strong id="idealWeight"></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="card">
                <div class="row">
                    <h3 class="title " align="center">Height Curve</h3>
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <div id="height" class="ct-chart2" style="max-width:100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <h3 class="title " align="center">Weight Curve</h3>
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <div id="weight" class="ct-chart2" style="max-width:100%">;
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <h3 class="title " align="center">Blood Pressure</h3>
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <div id="bp" class="ct-chart2" style="max-width:100%">;
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <h3 class="title " align="center">Heatbeat Rate</h3>
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <div id="hr" class="ct-chart2" style="max-width:100%">;
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                        <div class="content chart">
                            <h4 class="title">HeartBeat<span class="em-big">:</span> </h4>
                            <div class="graph__wrapper">
                                <div class="coordinates">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <svg  viewBox="0 0 315 107" version="1.1">
                                    <defs>
                                        <linearGradient x1="0%" y1="100%" x2="100%" y2="100%" id="linearGradient-1">
                                            <stop stop-color="#2090F8" offset="0%"></stop>
                                            <stop stop-color="#01FCE4" offset="41.7610013%"></stop>
                                            <stop stop-color="#0BFF8C" offset="78.6870217%"></stop>
                                            <stop stop-color="#51FF00" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" >//sketch:type="MSPage"
                                        <path
                                            d="M0,95
						  L40,68
						  L55,81
						  L65,76
						  L96,86
						  L131,19
						  L142,23
						  L183,2
						  L211,22
						  L234,71
						  L234,83
						  L244,83
						  L247,88
						  L315,100"
                                            id="Path-1" stroke="url(#linearGradient-1)" stroke-width="4"  class="path">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                        <div class="content chart">
                            <h4 class="title">Blood Presure:<span class="em-big">bph/bpl</span></h4>
                            <div class="graph__wrapper">
                                <div class="coordinates_bp">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <svg viewBox="0 0 315 107" version="1.1">
                                    <defs>
                                        <linearGradient x1="0%" y1="100%" x2="100%" y2="100%" id="linearGradient-1">
                                            <stop stop-color="#2090F8" offset="0%"></stop>
                                            <stop stop-color="#01FCE4" offset="41.7610013%"></stop>
                                            <stop stop-color="#0BFF8C" offset="78.6870217%"></stop>
                                            <stop stop-color="#51FF00" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" >
                                        <path
                                            d="M0,35
						  L40,18
						  L55,28
						  L65,36
						  L96,26
						  L131,9
						  L142,3
						  L183,22
						  L211,20
						  L234,41
						  L244,33
						  L247,28
						  L315,30"
                                            id="Path-1" stroke="url(#linearGradient-1)" stroke-width="4"  class="path">
                                        </path>
                                        <path
                                            d="M0,95
						  L40,88
						  L55,71
						  L65,66
						  L96,86
						  L131,59
						  L142,73
						  L183,82
						  L211,92
						  L234,71
						  L244,99
						  L247,88
						  L315,100"
                                            id="Path-1" stroke="url(#linearGradient-1)" stroke-width="4"  class="path">
                                        </path>
                                    </g>
                                </svg>
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
<!--Charts Plugins-->
<script src="../../js/echarts.js"></script>
<script src="../../WebContent/js/sidebar.js"></script>
<script src="../../js/Health.js"></script>
<script>
    $(document).ready(function(){
        show("health");
        drawHeight("height");
        drawWeight("weight");
        drawBP("bp");
        drawHR("hr");
    });
</script>
</body>
</html>