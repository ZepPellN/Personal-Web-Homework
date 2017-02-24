<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>Upload daily health data</title>
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
                            <form  role="form" action="../../server/user/user_upload_health.php" method="post" >
                                <div class="header">
                                    <h4 class="title" align="center" >
                                       Upload daily health data
                                    </h4>
                                </div>
                                <br/>
                                <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="Title" class="control-label">
                                            Height(cm)
                                        </label><star>*</star>
                                        <input id="height" name="height" type="text" class="form-control" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" for="start_time">
                                           Weight(kg)
                                        </label><star>*</star>
                                        <input id="weight" name="weight"  type="text" class="form-control" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" for="end_time">
                                           Walking_step(cm)
                                        </label><star>*</star>
                                        <input id= "ws" name="ws" type="text" class="form-control " placeholder="" required/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" for="place">
                                            Running_step(cm)
                                        </label><star>*</star>
                                        <input id="rs" name="rs" type="text" class="form-control" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="bonus">
                                           Heart beat
                                        </label><star>*</star>
                                        <input id="hr" name="hr" type="text" class="form-control" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="level">
                                            BPL
                                        </label><star>*</star>
                                        <input id="bpl" name="bpl" type="text" class="form-control" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="level">
                                            BPH
                                        </label><star>*</star>
                                        <input id="bph" name="bph" type="text" class="form-control" placeholder="" required/>
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