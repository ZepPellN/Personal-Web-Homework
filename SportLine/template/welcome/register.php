<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once("../../template/head.php");
    ?>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../css/wickedpicker.min.css"/>

    <script src="../../js/Dropzone.js"></script>
    <link rel="stylesheet" href="../../css/dropzone.css"/>

    <style>
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px #ffffff inset !important;
        }

        input.error::-webkit-input-placeholder {
            color: #F9684B;
        }

        input.error:-moz-placeholder {
            color: #F9684B;
        }

        input.error::-moz-placeholder {
            color: #F9684B;
        }

        input.error:-ms-input-placeholder {
            color: #F9684B;
        }
    </style>
</head>

<body>
<div class="wrapper">
    <?php
        require_once("../../template/simple_sidebar.php");
    ?>
    
    <div class="main-panel">
        <div class="header" style="position:relative;margin: 7% 0% -4% 0.5%;">
            <div class="">
                <div class="row">
                    <div class="col-md-1 col-sm-0 col-xs-0">
                    </div>
                    <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12">
                        <div class="card">
                            <form id="registerFormValidation" name="form" action="../../server/welcome/register_server.php" method="post">
                                <div class="header">
                                    <h4 class="title" align="center" >
                                        Register
                                    </h4>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label">
                                                Username<star>*</star>
                                            </label>
                                            <input id="username"class="form-control" name="username" type="text" required="true"
                                                   autocomplete="on" placeholder="Username"/>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label">
                                                Email Address<star>*</star>
                                            </label>
                                            <input class="form-control" name="email" type="text" required="true"
                                                   email="true" autocomplete="on" placeholder="Email"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label">
                                                Password<star>*</star>
                                            </label>
                                            <input class="form-control" name="password" type="password" required="true"
                                                   autocomplete="true" placeholder="Password"/>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label">
                                                Birthday<star>*</star>
                                            </label>
                                            <input class="form-control timepicker" name="birthday" required="true"
                                                   placeholder="Choose Your Birthday"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label">
                                                Sex<star>*</star>
                                            </label>
                                            <br/>
                                            <label class="radio" >
                                                <input  type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                                Male
                                            </label>
                                            <label class="radio">
                                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                                Female
                                            </label>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <label class="control-label">
                                                Province<star>*</star>
                                            </label>
                                            <select class="form-control" name="province">
                                                <option>Nanjing</option>
                                                <option>Beiging</option>
                                                <option>Haikou</option>
                                                <option>Shanghai</option>
                                                <option>Jinan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <label class="control-label">
                                                City<star>*</star>
                                            </label>
                                            <select class="form-control" name="city">
                                                <option>Nanjing</option>
                                                <option>Beiging</option>
                                                <option>Haikou</option>
                                                <option>Shanghai</option>
                                                <option>Jinan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="control-label">
                                                Profile<star>*</star>
                                            </label>
                                            <input type="text" class="form-control" name="profile" required="false" placeholder="Introduce Yourself"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label class="control-label">
                                                Upload Image
                                            </label>
                                            <div id="upload" class="dropzone" action="" type="file"></div>
                                            <!--<form action="" class="dropzone" id="upload">-->
                                            <!--<div class="fallback">-->
                                            <!--<input name="file" type="file" multiple />-->
                                            <!--</div>-->
                                            <!--</form>-->
                                        </div>
                                    </div>
                                    <?php
//                                        if($_GET['error'] == "userExist"){
//                                            echo "<h5><small>The username has been used,please try another one.</small></h5>";
//                                        }
                                    ?>
                                    <div class="category"><star>*</star>Required fields</div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-default pull-right" onClick="submitForm();return false;">Register</button>
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
    require_once("../../template/foot.php");
?>
<script src="../../js/wickedpicker.min.js"></script>

<script >
    $(document).ready(function(){
        var options = {
//            now: "12:35", //hh:mm 24 hour format only, defaults to current time
            twentyFour: true,  //Display 24 hour format, defaults to false
            upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
            downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
            close: 'wickedpicker__close', //The close class selector to use, for custom CSS
            hoverState: 'hover-state', //The hover state class to use, for custom CSS
            title: 'Timepicker', //The Wickedpicker's title,
            showSeconds: false, //Whether or not to show seconds,
            secondsInterval: 1, //Change interval for seconds, defaults to 1,
            minutesInterval: 1, //Change interval for minutes, defaults to 1
            beforeShow: null, //A function to be called before the Wickedpicker is shown
            show: null, //A function to be called when the Wickedpicker is shown
            clearable: false, //Make the picker's input clearable (has clickable "x")
        };
        $('.timepicker').wickedpicker(options);

//        var dropz = new Dropzone("#upload", {
//            url: "handle-upload.php",
//            maxFiles: 10,
//            maxFilesize: 512,
//            acceptedFiles: ".js,.obj,.dae"
//        });

        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            accept: function(file, done) {
//                if (file.name == "justinbieber.jpg") {
//                    done("Naha, you don't.");
//                }
//                else { done(); }
            }
        };
    });

    function submitForm(){
        var email = form.email.value;
        varreg = /^([w-])+@([w-])+((.[w-]{2,3}){1,2})$/;
        if(reg.test(email)){
            form.email.placeholder = "Please Input Correct Email Address.";
            form.email.className += " error";
        }
        var username = form.name.value;
        var password = form.password.value;
        var birthday = form.timepicker.value;
        var profile = form.profile.value;
        var province = form.province.value;
        var city = form.city.value;
        var gender = form.gender.value;
        var image = form.image.value;
        $.ajax({
            url:form.action,
            type:form.method,
            data :{
                username:username,
                password:password,
                birthday:birthday,
                profile:profile,
                province:province,
                city:city,
                gender:gender,
                image:image
            },
            async:false,
            dataType:'json',
            success:function(msg){
                if(msg === "success"){
                    window.location.href = "../../template/management/Home.php";
                }else if(msg === "userexit"){
                    $.notify({
                        icon :'ti-github',
                        message : 'The username has been used,please try another one.'
                    },{
                        type:'danger',
                        timer:200,
                        placement:{
                            from:'top',
                            align:'center'
                        }
                    });
                    form.username.value = "";
                }
            }
        });
    }
</script>
</body>
</html>