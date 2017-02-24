<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>Activity</title>
    <link rel="stylesheet" href="../../WebContent/assets/css/set.css" >
    <link rel="stylesheet" href="../../css/card.css">

    <style>
        .input-group-addon {
            cursor: pointer;
            -webkit-transition: all 300ms linear;
            -moz-transition: all 300ms linear;
            -o-transition: all 300ms linear;
            -ms-transition: all 300ms linear;
            transition: all 300ms linear;
            background-color: #F3F2EE;
            border: 1px solid #e8e7e3;
            border-radius: 4px;
        }
        .input-group-addon + .form-control {
            padding-left: 0;
        }
        .form-control:focus + .input-group-addon, .form-control:focus ~ .input-group-addon {
            background-color: #FFFFFF;
        }
        .input-group-focus .input-group-addon .fa-search{
            background-color: #FFFFFF;
        }
        .input-group-addon:first-child{
            border-right:0 none;
        }
        .input-group-addon:last-child{
            border-left:0 none;
        }
        table.race-item {
            text-align: center;
            font-size: 14px;
            color: #303030;
            border-color: rgba(0,0,0,0);
            border-collapse: collapse;
            width: 97%;
            margin: 20px auto;
        }
        table .race-item{
            padding-left:16px;
            padding-right:16px;
        }
        table.race-item th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: rgba(0,0,0,0);
            background-color: #DEDEDE;
            text-align: center;
        }

        table.race-item td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: rgba(0,0,0,0);
            background-color: #FFFFFF;
            text-align: center;
        }

        table.race-item th[rowspan] {
            width: 150px;
            background-color: #F3726D;
        }

        table.race-item td.username {
            background-color: #F3726D;
        }

        table.race-item a:link, a:visited {
            display: block;
            font-weight: bold;
            color: #FFFFFF;
            width: 120px;
            text-align: center;
            text-decoration: none;
        }

        table.race-item a:hover,a:active {
            color: #FAC648;
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
                <h3 class="title" style="..." align="center">
                    Activity List
                </h3>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 pull-left ">
                        <label class="radio"id="running">
                            <input type="radio" data-toggle="radio" name="optionRadios"  checked=""value=""  />
                            Running
                        </label>
                        <label class="radio"id="ending">
                            <input type="radio" data-toggle="radio" name="optionRadios" value="" />
                            Ending
                        </label>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 pull-right">
                        <form role="search">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input id="search" type="text" value="" class="form-control" placeholder="Search Activity" onkeyup="searchVague();return false;"/>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                            <table class="race-item tab-responsive" id="table-panel">
                                <h4 id="activity_num" align="center" ></h4>
                            </table>
                        </div>
                    </div>
                    <div class="row">

                        <ul class="nav navbar-nav navbar-right">
                            <li style="position:relative;margin-left:48%"><a href="javascript:gotopage_Activity('-1');"> <i
                                        class="ti-angle-left"></i>
                                </a></li>
                            <li id="pages" style="position:relative;margin-left:50%; margin-top:-2.3%">0/0</li>
                            <li style="position:relative;margin-left:52.5%;margin-top:-2.05%"><a href="javascript:gotopage_Activity('1');"> <i
                                        class="ti-angle-right"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once ("../../template/foot.php");
?>
<script src="../../WebContent/js/sidebar.js"></script>
<script src="../../js/activity.js"></script>
<script>
    var type = ""
    var state = "";
    $(document).ready(function(){
        type = "all";
        state = "running";
        show(type,state);
        
        $("#running").click(function(){
            type = "all";
            state = "running";
            show(type,state);
        });
        $("#ending").click(function(){
            type = "all";
            state = "ending";
            show(type,state);
        });

    });
    function searchVague(){
        var keyword = $("#search").value;
        if(keyword !== ""){
            search(keyword,type,state);
        }
    }

</script>
</body>
</html>