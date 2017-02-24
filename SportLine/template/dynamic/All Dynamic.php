<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once ("../../template/head.php");
    ?>
    <title>All Users' Dynamic</title>
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
        <div class="header" style="position:relative;margin: 7% 0% -4% 0.5%;">
            <div class="card" >
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <form  action="../../server/dynamic/dynamic_add.php" method="post" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label">Share interesting things with friends!</label>
                                    <textarea class="form-control" placeholder="Here can be your nice text" rows="3" id="content" name="info"></textarea>
                                </div>
                            </fieldset>
                            <button class="btn btn-default pull-right" type="submit" >Release</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content" id="dynamic-panel">
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6 ">
            </div>
        </div>
    </div>
</div>
<?php
require_once ("../../template/foot.php");
?>
<script src="../../WebContent/js/sidebar.js"></script>
<script src="../../WebContent/assets/js/manhua_hoverTips.js"></script>
<script src ="../../js/dynamic.js"></script>
<script src="../../js/mydynamic.js"></script>
<script>
    show("all");
    function submitForm(){
        var text = $("#content").value;
        if(text === ""){
            $("#content").value("Please input your opinion then try again!");
        }else{
            submit(text);
        }
    }
</script>
</body>
</html>