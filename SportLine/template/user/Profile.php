<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>My Profile</title>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 col-sm-0 col-xs-0 col-lg-1"></div>
                    <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">My Profile</h4>
                            </div>
                            <div class="content">
                                <form role="form">
                                    <div class="content">
                                        <div class="row">
                                            <form action="" method="">
                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <label class="control-label">
                                                        Username<star>*</star>
                                                    </label>
                                                    <input class="form-control" name="name" type="text" required="true"
                                                           autocomplete="on"  id="username"/>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <label class="control-label">
                                                        Email Address<star>*</star>
                                                    </label>
                                                    <input class="form-control" name="email" type="text" required="true"
                                                           email="true" autocomplete="on" placeholder="" id="email"/>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">
                                                    Password<star>*</star>
                                                </label>
                                                <input class="form-control" name="password" type="password" required="true"
                                                       autocomplete="true" placeholder="" id="password"/>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">
                                                    Birthday<star>*</star>
                                                </label>
                                                <input class="form-control selectpicker" name="birthday" required="true"
                                                       placeholder="" id="birthday"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">
                                                    Sex<star>*</star>
                                                </label>
                                                <br/>
                                                <label class="radio" id="male">
                                                    <input type="radio" data-toggle="radio" name="optionRadios" value="" />
                                                    Male
                                                </label>
                                                <label class="radio"id="female">
                                                    <input type="radio" data-toggle="radio" name="optionRadios" value="" />
                                                    Female
                                                </label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <label class="control-label">
                                                    Province<star>*</star>
                                                </label>
                                                <input class="form-control" name="province" required="true"
                                                       placeholder="" id="province"/>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                <label class="control-label">
                                                    City<star>*</star>
                                                </label>
                                                <input class="form-control" name="city" required="true"
                                                       placeholder="" id="city"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label class="control-label">
                                                    Profile<star>*</star>
                                                </label>
                                                <input type="text" class="form-control" name="profile" required="false" placeholder=""id="profile" required="true"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-default pull-right" onclick="submitForm();return false;">Modify</button>
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
    show();
    function submitForm(){
        submit();
    }
</script>
</body>
</html>