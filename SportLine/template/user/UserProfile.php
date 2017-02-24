<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once ("../../template/head.php");
    ?>
    <title>User Profile</title>
    <link rel="stylesheet" href="../../WebContent/assets/css/set.css" >
    <link rel="stylesheet" href="../../css/card.css">
</head>
<body>
<div class="wrapper">
    <?php
    require_once ("../../template/sidebar.php");
    ?>
    <div class="main-panel">
        <div id="fresh" class="header" style="position:relative;margin: 7% 0% -4% 0.5%;">
            <div class="contain-fluid">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-xs-0 col-sm-0"></div>
                    <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12" style="margin-top: 0.5%;">
                        <div class="card card-user">
                            <div class="image">
                                <img src="../../WebContent/assets/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a id="avatar_link" target="_blank"><img class="avatar border-white" id="avatar" style="background-color: white;"
                                                                             id="avatar"/></a>
                                    <h4 class="title" id="name"></h4>
                                </div>
                                <button class="btn btn-simple pull-left" disabled="disabled" id="follow1"></button>
                                <button class="btn btn-defalut pull-right" id="follow2"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 col-sm-0 col-xs-0 col-lg-1"></div>
                    <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">User Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="content">
                                        <div class="row">
                                            <form action="" method="">
                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <label class="control-label">
                                                        Username
                                                    </label>
                                                    <input class="form-control" name="name" type="text" readonly
                                                           autocomplete="on" id="username"/>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <label class="control-label">
                                                        Email Address
                                                    </label>
                                                    <input class="form-control" name="email" type="text" readonly
                                                           email="true" autocomplete="on"id="email" />
                                                </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">
                                                    Birthday
                                                </label>
                                                <input class="form-control selectpicker" name="birthday" readonly
                                                       placeholder="Choose Your Birthday" id="birthday"/>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                <label class="control-label">
                                                    Province
                                                </label>
                                                <input class="form-control selectpicker" name="province" readonly id="province"
                                                       />
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                <label class="control-label">
                                                    City
                                                </label>
                                                <input class="form-control selectpicker" name="city" readonly id="city"
                                                      />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">
                                                    Sex
                                                </label>
                                                <input type="text" class="form-control" name="sex" readonly id="sex"/>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <label class="control-label">
                                                    Profile
                                                </label>
                                                <input type="text" class="form-control" name="profile" readonly id="profile"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                        </div>
                                    </div>
                            </div>
                            </form>
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
<script src="../../WebContent/js/sidebar.js"></script>
<script src="../../js/userInformation.js"></script>
<script>
    show_user_information();
</script>
</body>
</html>