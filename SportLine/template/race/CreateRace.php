<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>Launch Race</title>
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
                        <form id="registerFormValidation" role="form" method="post" action="../../server/race/race_add.php">
                            <div class="header">
                                <h4 class="title" align="center" >
                                    Launch Race
                                </h4>
                            </div>
                            <br/>

                            <label class="control-label">
                                Race Category<star>*</star>
                            </label>

                            <select class="form-control" name="type">
                                <option>PK</option>
                                <option>Multiple</option>
                            </select>
<!--                            <label class="radio" name="single" id="single">-->
<!--                                <input type="radio" data-toggle="radio" name="optionRadios" value="" checked="">-->
<!--                                Single Race-->
<!--                            </label>-->
<!--                            <label class="radio" name="multiple" id="multiple">-->
<!--                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>-->
<!--                                Multiply Race-->
<!--                            </label>-->
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label">Race Description</label><star>*</star>
                                    <textarea class="form-control"name="info" placeholder="Here can be race description" rows="5" required></textarea>
                                </div>
                            </fieldset>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        Title
                                    </label><star>*</star>
                                    <input type="text" class="form-control" name="title" placeholder="Title" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        Start Time
                                    </label><star>*</star>
                                    <input type="text" class="form-control datetimepicker"  name="start_time" placeholder="Start Time" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">
                                       End Time
                                    </label><star>*</star>
                                    <input type="text" class="form-control datetimepicker" name="end_time" placeholder="End Time" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">
                                       Place
                                    </label><star>*</star>
                                    <input type="text" class="form-control" name="place" placeholder="Place" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        Level
                                    </label><star>*</star>
                                    <input type="text" class="form-control" name="level" placeholder="1~5 level" required/>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        Bonus
                                    </label><star>*</star>
                                    <input type="text" class="form-control" name="bonus" placeholder="Bonus" required/>
                                </div>
                            </div>
                            <button type="reset" class="btn btn-default pull-right" onclick="clean_all();return false;">Cancel</button>
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
<!--datetime picker-->
<script src="../../WebContent/js/sidebar.js"></script>

<script>
    $(document).ready(function(){

    });

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
        var start_time = form.start_time.value;
        var end_time = form.end_time.value;
        var place = form.place.value;
        var bonus = form.bonus.value;
        var level = form.level.value;
        var type = form.type.value;
        $.ajax({
            url:"../../server/race/race_add.php",
            type:"post",
            data:{
                title:title,
                info :info,
                start_time:start_time,
                end_time:end_time,
                place:place,
                bonus:bonus,
                level:level,
                type:type
            },
            async: false,
            dataType: 'json',
            success: function () {
//                window.location.href = 'singleRace.php';
            }
        });
    }
</script>
</body>
</html>