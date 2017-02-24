<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>Activity Information</title>
    <link rel="stylesheet" href="../../css/table.css">
    <style>
        .bootstrap-table .table, .bootstrap-table .table > tbody > tr > th, .bootstrap-table .table > tfoot > tr > th, .bootstrap-table .table > thead > tr > td, .bootstrap-table .table > tbody > tr > td, .bootstrap-table .table > tfoot > tr > td {
            padding: 8px !important;
        }
        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
            padding: 12px 11px;
            vertical-align: middle;
        }
        
        
        .table thead tr > th, .table thead tr > td, .table tbody tr > th, .table tbody tr > td, .table tfoot tr > th, .table tfoot tr > td {
            border-top: 1px solid #CCC5B9;
        }
        .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }
        .table th, .table td {
            vertical-align: middle;
            box-sizing: border-box;
        }
        td, th {
            display: table-cell;
            vertical-align: inherit;
        }
        .bootstrap-table .table {
            margin-bottom: 0 !important;
            border-bottom: 1px solid #cfcfca;
            border-collapse: collapse !important;
            border-radius: 1px;
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
                <h3 class="title" style="margin-top: 1%;" align="center">
                    Activity Information
                </h3>
                <div class="row">
                    <h4>Members:</h4>
                    <div class="col-md-12 col-xs-12  col-lg-12 col-sm-12" id="member">
<!--                        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-2">-->
<!--                            <div class="content">-->
<!--                                <div class="author">-->
<!--                                    <a id="avatar_link" target="_blank"><img class="avatar border-white" id="avatar" style="margin-left: -180%;" src="../../WebContent/images/zsq.jpg" /></a>-->
<!--                                    <br/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-2">-->
<!--                            <div class="content">-->
<!--                                <div class="author">-->
<!--                                    <a id="avatar_link2" target="_blank"><img class="avatar border-white" id="avatar2" style="margin-left: -180%;" src="../../WebContent/images/zsq.jpg" /></a>-->
<!--                                    <br/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-2">-->
<!--                            <div class="content">-->
<!--                                <div class="author">-->
<!--                                    <a id="avatar_link3" target="_blank"><img class="avatar border-white" id="avatar3" style="margin-left: -180%;" src="../../WebContent/images/zsq.jpg" /></a>-->
<!--                                    <br/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <button class="btn btn-default pull-right" type="submit" onclick="join();return false;" id="join">Join</button>-->
<!--                        <button class="btn btn-simple pull-right"  id="joined">Joined</button>-->
                    </div>
                    <h4 style="position:relative; padding-top:8%">Activity Details:</h4>
                    <br/>
                    <div class="col-md-3 col-xs-6 col-lg-3 col-sm-3">
                        <!--<img class="avatar border-white" src="/SportLine/images/clock/clockmedia.png"/>-->
                        <h5 style=" text-align: center;">Start Time</h5>
                        <h5 style=" text-align: center;"><small id="starttime"></small></h5>
                    </div>
                    <div class="col-md-3 col-xs-6 col-lg-3 col-sm-3">
                        <!--<img class="avatar border-white" src="/SportLine/images/clock/clockmedia.png"/>-->
                        <h5 style=" text-align: center;">End Time</h5>
                        <h5 style=" text-align: center;" ><small  id="endtime" ></small></h5>
                    </div>
                    <div class="col-md-3 col-xs-6 col-lg-3 col-sm-3">
                        <!--<img class="avatar border-white" src="/SportLine/images/clock/clockmedia.png"/>-->
                        <h5  style=" text-align: center;">Place</h5>
                        <h5 style=" text-align: center;"><small  id="place"></small></h5>
                    </div>
                    <div class="col-md-3 col-xs-6 col-lg-3 col-sm-3">
                        <!--<img class="avatar border-white" src="/SportLine/images/clock/clockmedia.png"/>-->
                        <h5 style=" text-align: center;">Bonus</h5>
                        <h5 style=" text-align: center;"><small id="bonus"></small></h5>
                    </div>

                    <h4 style="position:relative; padding-top:6.5%">Description:</h4>
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <p id="description" class="category">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once ("../../template/foot.php");
?>
<!--Table plugins-->
<script src="../../js/bootstrap-table.js"></script>
<script src="../../js/activityInformation.js"></script>
<script src="../../js/table.js"></script>
<script src="../../WebContent/js/sidebar.js"></script>
<script>
//    $(document).ready(function(){
//    });
    showInformation();
</script>
</body>
</html>