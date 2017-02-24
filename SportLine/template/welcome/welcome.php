<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once("../../template/head.php");
    ?>
    
    <style>
        h1>p {
            transition: all 2s;
            -moz-transition: all 2s;
            webkit-transition: all 2s;
            o-transition: all 2s;
            font-size: 0.5em;
            margin: 20px 0 0;
        }

        h1:hover>p {
            font-size: 0.6em;
        }

        @-webkit-keyframes bouncedelay {
            0%, 80%, 100% { -webkit-transform: scale(0.0) }
            40% { -webkit-transform: scale(1.0) }
        }

        @keyframes bouncedelay {
            0%, 80%, 100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0);
            } 40% {
                  transform: scale(1.0);
                  -webkit-transform: scale(1.0);
              }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php
            require_once("../../template/simple_sidebar.php");
        ?>
        <div class="main-panel">
            <div class="landing-header">
                <figure class="effect-oscar">
                    <figcaption>
                        <h2>SPORTLINE</h2>
                        <p>Sports is the art arisen from life<br />In this gallery<br />
                            Each activity and each competition is a masterpiece<br />The more you do sports<br />
                            The deeper you wallow<br/>
                            <strong>Personal Sport and Social Platform!</strong>
                            <strong>Join us now!</strong>
                        </p>
                    </figcaption>
                </figure>
            </div>

            <div class="section text-center  landing-section">

                <div class="container">
                    <div class="row">
                        <div class="col-md-4 column">
                            <img alt="..." src="../../images/homebackground.jpeg" style="width: 100%;">
                        </div>
                        <div class="col-md-8 column">
                            <h2>Sport,Health and Social</h2>
                            <h5>
                                Piece your sport data together.<br>
                                Supervise your health situation.<br>
                                Show you where your future is located.<br>
                                Doing exercise with friends.
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="section text-center section-light-brown landing-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 column">
                                <h2>Your World, Unique World</h2>
                                <h5>
                                    One and only sport platform that belongs to you.<br>
                                    The more you know about it, the more it knows about you.
                                    Change everything before you realize.
                                </h5>
                            </div>
                            <div class="col-md-4 column">
                                <img alt="..." src="../../images/welcomepage2.jpg" style="width: 100%; height: 13em;">
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

</body>
</html>