<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>My Dynamic</title>
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
        <div class="header" style="position:relative; margin:7% 0% -4% 0.5%;" id="dynamic-panel">
        </div>
        <div class="row">
            <ul class="nav navbar-nav navbar-right">
                <li style="position:relative;margin-left:48%"><a href="javascript:gotopage_user('-1');"> <i
                            class="ti-angle-left"></i>
                    </a></li>
                <li id="pages" style="position:relative;margin-left:50%; margin-top:-2.3%">0/0</li>
                <li style="position:relative;margin-left:52.5%;margin-top:-2.05%"><a href="javascript:gotopage_user('1');"> <i
                            class="ti-angle-right"></i>
                    </a></li>
            </ul>
        </div>
    </div>
</div>
<?php
    require_once ("../../template/foot.php");
?>
<script src="../../WebContent/js/sidebar.js"></script>
<script src="../../js/mydynamic.js"></script>
<script>
    show("person");
</script>

</body>
</html>