<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once("../../template/head.php");
    ?>
    <title>Sign In</title>

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
        <div class="register-background">
            <div class="container">
                <div class="row" >
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                    </div>

                    <div class="row" >
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                <h3 class="title">Welcome</h3>
                                <form id="form" name="form" class="register-form" >
                                    <label>Username</label>
                                    <input name="username" type="text" class="form-control" placeholder="Username">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                    <button class="btn btn-danger btn-block" onclick="submitForm();return false;">Log In</button>
                                </form>
                                <div class="forgot">
                                    <a href="#"
                                       class="btn btn-simple btn-danger" target="_blank">Forgot Password?</a>
                                </div>
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
<script>

        function submitForm() {

            var username = form.username.value;

            var password = form.password.value;
            if (username.length > 0 && password.length > 0) {

                $.ajax({
                    url: "../../server/welcome/login_server.php",
                    type: "post",
                    data: {
                        username: username,
                        password: password
                    },
                    async: false,
                    dataType: 'json',
                    success: function (msg) {
                        if (msg === "success") {
                            window.location.href = "../management/Home.php";
                        } else {
                            $.notify({
                                icon: 'ti-github',
                                message: 'Username and Password do not match.Please input again.'
                            }, {
                                type: 'danger',
                                timer: 200,
                                placement: {
                                    from: 'top',
                                    align: 'center'
                                }
                            });
                            form.password.value = "";
                        }
                    }
                });
            } else {
                if (username.length == 0) {
                    form.username.placeholder = "Please Input Username.";
                    form.username.className += " error";
                } else if (password.length == 0) {
                    form.password.placeholder = "Please Input Password.";
                    form.password.className += " error";
                }
            }
        }

</script>
</body>
</html>
