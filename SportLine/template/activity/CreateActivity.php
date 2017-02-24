<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>Launch Activity</title>
    <link rel="stylesheet" href="../../WebContent/assets/css/set.css" >
    <link rel="stylesheet" href="../../css/card.css">
    <style>
        textarea.form-control {
            max-width: 100%;
            padding: 10px 18px;
            resize: none;
            height: auto;

        }
        textarea{
            font-size: 1em;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <?php
        require_once ("../../template/sidebar.php");
    ?>
    <div class="main-panel">
        <div class="header" style="position:relative; margin:7% 0% -4% 0.5%;">

            <div class="card">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <form  role="form" action="../../server/activity/activity_add.php" method="post" >
                            <div class="header">
                                <h4 class="title" align="center" >
                                    Launch Activity
                                </h4>
                            </div>
                            <br/>
                            <fieldset>
                                <div class="form-group">
                                    <label for="info" class="control-label">Description</label><star>*</star>
                                    <textarea  id="info" class="form-control"name="info" placeholder="Here can be race description" rows="5" required></textarea>
                                </div>
                            </fieldset>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label for="Title" class="control-label">
                                        Title
                                    </label><star>*</star>
                                    <input id="title" name="title" type="text" class="form-control" placeholder="Title" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="start_time">
                                        StartTime
                                    </label><star>*</star>
                                    <input id="start_time" name="start_time"  type="text" class="form-control datetimepicker" placeholder="Start Time" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="end_time">
                                        EndTime
                                    </label><star>*</star>
                                    <input id= "end_time" name="end_time" type="text" class="form-control datetimepicker" placeholder="End Time" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="place">
                                        Place
                                    </label><star>*</star>
                                    <input id="place" name="place" type="text" class="form-control" placeholder="Place" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="bonus">
                                        Bonus
                                    </label><star>*</star>
                                    <input id="bonus" name="bonus" type="text" class="form-control" placeholder="Bonus" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="level">
                                        Level
                                    </label><star>*</star>
                                    <input id="level" name="level" type="text" class="form-control" placeholder="1~5 for Level" required/>
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
</div>
<?php
    require_once ("../../template/foot.php");
?>
<script src="../../WebContent/js/sidebar.js"></script>

<script>

    function clean_all(){

        document.getElementById("info").value = "";
        document.getElementById("title").value = "";
        document.getElementById("starttime").value="";
        document.getElementById("endtime").value="";
        document.getElementById("level").value="";
        document.getElementById("bonus").value="";
        document.getElementById("place").value="";
    }
    
    function submitForm(){

        var title = form.title.value;
        var info = form.info.value;
        var start_time = form.starttime.value;
        var end_time = form.endtime.value;
        var place = form.place.value;
        var bonus = form.bonus.value;
        var level = form.level.value;
        $.ajax({
            url:"../../server/activity/activity_add.php",
            type:"post",
            data:{
                title:title,
                info :info,
                start_time:start_time,
                end_time:end_time,
                place:place,
                bonus:bonus,
                level:level
            },
            async: false,
            dataType: 'json',
            success: function () {
                window.location.href = 'Activity.php';
            }
        });
    }
</script>
</body>
</html>