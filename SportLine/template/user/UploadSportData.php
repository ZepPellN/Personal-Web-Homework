<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once ("../../template/head.php");
    ?>
    <title>Upload Daily Sport Data</title>
    <link rel="stylesheet" href="../../WebContent/assets/css/set.css" >
    <link rel="stylesheet" href="../../css/card.css">
</head>
<body>
<div class="wrapper">
    <div class="main-panel">
        <div class="header" style="position:relative; margin:7% 0% -4% 0.5%;">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <form  role="form" action="../../server/user/user_upload_sport.php" method="post" >
                            <div class="header">
                                <h4 class="title" align="center" >
                                    Upload daily sport data
                                </h4>
                            </div>
                            <br/>
                            <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                <div class="form-group">
                                    <label for="Title" class="control-label">
                                        Distance(km)
                                    </label><star>*</star>
                                    <input id="distance" name="distance" type="text" class="form-control" placeholder="" required/>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                <div class="form-group">
                                    <label class="control-label" for="start_time">
                                        Time(hour)
                                    </label><star>*</star>
                                    <input id="time" name="time"  type="text" class="form-control" placeholder="" required/>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                <div class="form-group">
                                    <label class="control-label" for="end_time">
                                        Step
                                    </label><star>*</star>
                                    <input id= "step" name="step" type="text" class="form-control " placeholder="" required/>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                <div class="form-group">
                                    <label class="control-label" for="place">
                                       Calorie
                                    </label><star>*</star>
                                    <input id="calorie" name="calorie" type="text" class="form-control" placeholder="" required/>
                                </div>
                            </div>
                            <button  class="btn btn-default pull-right" onclick="clean_all();return false;">Cancel</button>
                            <button type="submit" class="btn btn-default pull-right" onclick="submitForm();return false;">Launch</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once ("../../template/sidebar.php");
    ?>
</div>
<?php
require_once ("../../template/foot.php");
?>
<script src="../../WebContent/js/sidebar.js"></script>
</body>
</html>