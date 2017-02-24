<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/SportLine/"
               class="simple-text"> SportLine </a>
        </div>

        <ul class="nav">
            <li style="text-align: center;" class="form-group"><a
                    onclick="javascript:openHomepage();">
                    <p>Homepage</p>
                </a>
                <ul id="homepage" class="nav collapse">
                    <li ><a onclick="" href="../../template/management/Home.php">Home</a></li>
                    <li><a onclick="" href="../../template/management/crazysport.php">Sport Center</a></li>
                    <li><a onclick="" href="../../template/management/Health.php">Health Center</a></li>
<!--                    <li><a onclick="" href="../../template/management/Friends' Circle.php">Friends'Circle</a></li>-->
                </ul>
            </li>
            <li style="text-align: center;" class="form-group"><a
                    onclick="javascript:openPersonal();">
                    <p>Personal</p>
                </a>
                <ul id="personal" class="nav collapse">
                    <li><a onclick="" href="../../template/user/Profile.php">My Profile</a></li>
                    <li ><a onclick="" href="../../template/user/UploadHealthData.php">Upload Health Data</a></li>
                    <li><a onclick="" href = "../../template/user/UploadSportData.php">Upload Sport Data</a></li>
                </ul>
            </li>
            <li style="text-align: center;" class="form-group"><a
                    onclick="javascript:openActivity();">
                    <p>Activity</p>
                </a>
                <ul id="activity" class="nav collapse">
                    <li><a onclick="" href="../../template/activity/CreateActivity.php">Create Activity</a></li>
                    <li ><a onclick="" href="../../template/activity/Activity.php">All Activities</a></li>
                    <li><a onclick="" href="../../template/activity/MyActivity.php">My Activity</a></li>
                </ul>
            </li>
            <li style="text-align: center;" class="form-group"><a
                    onclick="javascript:openRace();">
                    <p>Race</p>
                </a>
                <ul id="race" class="nav collapse">
                    <li><a onclick="" href="../../template/race/CreateRace.php">Launch Race</a></li>
                    <li><a onclick="" href="../../template/race/singleRace.php">PK Race</a></li>
<!--                    <li><a onclick="" href="../../template/race/multipleRace.php">Mutiple Race</a></li>-->
                    <li><a onclick="" href="../../template/race/MyRace.php">My Race</a></li>
                </ul>
            </li>
            <li style="text-align: center;" class="form-group"><a
                    onclick="javascript:openDynamic();">
                    <p>Dynamic</p>
                </a>
                <ul id="dynamic" class="nav collapse">
                    <li ><a onclick="" href="../../template/dynamic/All Dynamic.php">All Dynamic</a></li>
                    <li><a onclick="" href="../../template/dynamic/Following's Dynamic.php">Followings' Dynamic</a></li>
<!--                    <li><a onclick="" href="../../template/dynamic/Friends' Dynamic.php">Friends' Dynamic</a></li>-->
                    <li><a onclick="" href="../../template/dynamic/MyDynamic.php">My Dynamic</a></li>
                </ul>
            </li>
            <li style="text-align: center;" class="form-group"><a
                    onclick="javascript:openUser();">
                    <p>User</p>
                </a>
                <ul id="user" class="nav collapse">
                    <li><a onclick=""href="../../template/user/AllUser.php">All User</a></li>
                    <li ><a onclick=""href="../../template/user/Follower.php">My Followers</a></li>
                    <li><a onclick="" href="../../template/user/Following.php">My Following</a></li>
<!--                    <li ><a onclick="" href="../../template/user/MyFriends.php">My Friends</a></li>-->
                </ul>
            </li>
        </ul>
    </div>
</div>
<script src="../../WebContent/js/sidebar.js"></script>
</body>
</html>
