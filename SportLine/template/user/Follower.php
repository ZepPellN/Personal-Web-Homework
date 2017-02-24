<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>My Followers</title>
    <link rel="stylesheet" href="../../css/card.css">
    <link href="../../WebContent/assets/css/manhua_hoverTips.css" rel="stylesheet" />
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

    </style>
</head>
<body>
<div class="wrapper">
    <?php
        require_once ("../../template/sidebar.php");
    ?>
    <div class="main-panel">
        <div id="fresh" class="header" style="position:relative;margin: 7% 0% -4% 0.5%;">
            <div class="card">
<!--                <div id="row">-->
<!--                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6"></div>-->
<!--                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-0"></div>-->
<!--                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">-->
<!--                        <form role="search">-->
<!--                            <div class="input-group">-->
<!--                                <span class="input-group-addon"><i class="fa fa-search"></i></span>-->
<!--                                <input type="text" value="" class="form-control" placeholder="Search User"/>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="row" id="user-card-panel">
                </div>
                <div class="row">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="position:relative;margin-left:48%"><a href="javascript:gotopage_user('-1','follower');"> <i
                                    class="ti-angle-left"></i>
                            </a></li>
                        <li id="pages" style="position:relative;margin-left:50%; margin-top:-2.3%">0/0</li>
                        <li style="position:relative;margin-left:52.5%;margin-top:-2.05%"><a href="javascript:gotopage_user('1','follower');"> <i
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
<script src="../../WebContent/assets/js/manhua_hoverTips.js"></script>
<script src="../../js/user.js"></script>
<script>
    show("follower");
</script>
</body>
</html>