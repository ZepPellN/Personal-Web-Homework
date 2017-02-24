/**
 * Created by zsq on 2016/11/13.
 */

var recordNum = 6;
var numOfUser = 9;
var userlist = [];
var namelist = [];
var pages_user, curP_user = 0, allpages_user = 0;
var randomBG = [];
var TREASURE_MAX = 20;

function generateRandom(){
    for(var i=0; i<TREASURE_MAX; i++){
        randomBG[i] = i;
    }
    for(var i=TREASURE_MAX; i>TREASURE_MAX-recordNum; i--){
        var rand_pos = Math.floor(Math.random()*i)+(TREASURE_MAX-i);
        //swap
        var temp = randomBG[TREASURE_MAX-i];
        randomBG[TREASURE_MAX-i] = randomBG[rand_pos];
        randomBG[rand_pos] = temp;
    }
}

function gotopage_user(value,type) {
    if (value == "-1" && curP_user > 0) {
        curP_user--;
        writeUser(curP_user,type);
    }
    if (value == "1" && curP_user < allpages_user - 1) {
        curP_user++;
        writeUser(curP_user,type);
    }
}

function getJsonLength(data) {
    var length = 0;
    for ( var item in data) {
        length++;
    }
    return length;
}

function loadUser(type) {
    $("#user-card-panel").empty();
    // $("#user-num").text("We have found " + numOfUser + " users");

    if (numOfUser == 0) {
        $("#pages").text("0/0");
        return;
    }

    writeUser(0,type);
}

function writeUser(pno,type) {
    generateRandom();
    $("#user-card-panel").empty();
    $("#pages").text((curP_user + 1) + "/" + allpages_user);

    var i, temp, avatar_url, info, description, sign, login, sex;
    for (i = pno * recordNum; i < (pno + 1) * recordNum && i < numOfUser; i++) {

        temp = userlist[i];
        login = temp.name;
        namelist[i] = login;
        sign = temp.sign;
        if (temp.sex === 0) {
            sex = "Male";
        } else {
            sex = "Female";
        }
        avatar_url = temp.avatar;
        var Info = "Formal User" + " | " + "Level" + temp.level + " | " + "Points:" + temp.point + " | " + sex + " | " + temp.province;
        description = temp.motto;

        var content = $("<div></div>");
        content.attr("class", "col-lg-4 col-md-4 col-sm-6 col-xs-12");

        var card = $("<div></div>");
        card.attr("class", "card card-user");

        var bg = $("<div></div>");
        bg.attr("class", "image");
        var image = $("<img>");
        image.attr("src", "../../WebContent/images/userbg/art" + randomBG[i % recordNum] + ".jpg");
        image.attr("alt", "...");
        bg.append(image);

        var info = $("<div></div>");
        info.attr("class", "content");

        var author = $("<div></div>");
        author.attr("class", "author");
        var avatarlink = $("<a></a>");
        avatarlink.attr("href", "../../template/user/UserProfile.php?name=" + login);
        var avatar = $("<img>");
        avatar.attr({
            "src": avatar_url,
            "class": "avatar border-white",
            "style": "background-color: white;",
            "href":"../../template/user/UserProfile.php?name=" + login
        });
        avatarlink.append(avatar);
        var userName = $("<h4></h4>");
        var login_show = (login.length > 17) ? (login.substring(0, 15) + "...") : login;
        var namelink = $("<a></a>").text(login_show);
        namelink.attr("href", "../../template/dynamic/User_Dynamic.php?name=" + login);
        namelink.attr("tips", login);
        userName.append(namelink);
        userName.attr("class", "title");
        userName.append("<br>");
        var information = $("<p></p>");
        var small = $("<small></small>");
        small.append(Info);

        information.append(small);
        // var join_small = $("<small></small>");
        // join_small.append("Joined on " + created_at);
        // join.append(join_small);
        userName.append(information);

        var Description = $("<p></p>");
        Description.append("Description: " + description);
        userName.append(Description);
        author.append(avatarlink, userName);

        var buttonGroup = $("<div></div>");
        buttonGroup.attr("class", "text-center");
        var subrow = $("<div></div>");
        subrow.attr("class", "row");

        var following_col = $("<h4></h4>");
        // following_col.attr("class", "col-md-6 col-lg-6 col-xs-6 col-sm-6");
        var following = $("<p align='center'></p>");
        var following_small = $("<small></small>");

        // following.attr({
        //     "disabled": "disable;"
        // });
        // following.attr("class", "btn btn-simple text-center")

        // var unfollow_col = $("<div></div>");
        // unfollow_col.attr("class", "col-md-6 col-lg-6 col-xs-6 col-sm-6");
        // var unfollow = $("<button></button>");
        // unfollow.attr("class","btn btn-default pull-right");
        if(sign === 1){ //已关注
            following_small.text("Following");
            // unfollow.text("Unfollow");
            // unfollow.addClass("unfollow")

            // $(".unfollow").on('click',{msg:login},handleUnfollow);


        }else if(sign === 0){   //未关注
            following_small.text("Unfollowing");
            // unfollow.text("Follow");
            // unfollow.addClass("follow");
            // $(".follow").on('click',{msg:login},function(event){
            //     var name = event.data.login;
            //     $.ajax({
            //         url:"../../server/user/user_operation.php",
            //         type:"post",
            //         data:{
            //             type: "follow",
            //             name:  name
            //
            //         },
            //         async:false,
            //         dataType:'json',
            //         success:function(data,textStatus){
            //
            //         }
            //     });
            //     following.text("Following");
            //     unfollow.text("Unfollow");
            //     unfollow.attr("class","unfollow btn btn-default pull-right");
            // });
        }
        following.append(following_small);
        following_col.append(following);
        // unfollow_col.append(unfollow);

        subrow.append(following_col);
        buttonGroup.append(subrow);

        info.append(author, buttonGroup);

        card.append(bg, info);

        content.append(card);
        $("#user-card-panel").append(content);
    }
}
function show(type){
    $.ajax({
        url: "../../server/user/user.php",
        type: "post",
        data: {
            type:type,
        },
        async: false,
        dataType: 'json',
        success: function(data,textStatus){
            if(typeof(data) != "string"){
                numOfUser = getJsonLength(data);
                allpages_user = Math.ceil(numOfUser / recordNum);
                for (var i = 0;i < numOfUser; i++){
                    userlist[i] = data[i];
                }
            }
        }
    });
    loadUser(type);
}