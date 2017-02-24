/**
 * Created by zsq on 2016/10/19.
 */
/**
 * deal with results of repos and users
 */
var vagueName;
var recordNum = 6;
var numOfUser = 9;
var userlist = [];
var followerlist = [];
var  followinglist = [];
var friendlist = [];
var pages_user, curP_user = 0, allpages_user = 2;
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

    var i, temp, avatar_url, info, description,isFollow,login;
    for (i = pno * recordNum; i < (pno + 1) * recordNum && i < numOfUser; i++) {

        if(type === "all"){
            temp = userlist[i];
        }else if(type === "friends"){
            temp = friendlist[i];
        }else if(type === "following") {
            temp = followinglist[i];
        }else if(type === "follower"){
            temp = followerlist[i];
        }
        login = temp.login;
        avatar_url = temp.avatar_url;
        Info = temp.identifier + " | " + "Level" + temp.level + " | " + "Points:" + temp.points + " | " + temp.sex + " | " + temp.place;
        isFollow = temp.isFollow;
        description = temp.description;

        var content = $("<div></div>");
        content.attr("class", "col-lg-4 col-md-4 col-sm-6 col-xs-12");

        var card = $("<div></div>");
        card.attr("class", "card card-user");

        var bg = $("<div></div>");
        bg.attr("class", "image");
        var image = $("<img>");
        image.attr("src", "../../WebContent/images/userbg/art"+randomBG[i%recordNum]+".jpg");
        image.attr("alt", "...");
        bg.append(image);

        var info = $("<div></div>");
        info.attr("class", "content");

        var author = $("<div></div>");
        author.attr("class", "author");
        var avatarlink = $("<a></a>");
        avatarlink.attr("href", "#");
        var avatar = $("<img>");
        avatar.attr({
            "src" : avatar_url,
            "class" : "avatar border-white",
            "style" : "background-color: white;"
        });
        avatarlink.append(avatar);
        var userName = $("<h4></h4>");
        var login_show =(login.length>17)? (login.substring(0,15)+"..."):login;
        var namelink = $("<a></a>").text(login_show);
        namelink.attr("href", "#");
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

        var following_col = $("<div></div>");
        following_col.attr("class", "col-md-6 col-lg-6 col-xs-6 col-sm-6");
        var following = $("<button></button>");
        following.attr({
            "disable":"disabled;"
        });
        following.attr("class","btn btn-simple pull-left")

        var unfollow_col = $("<div></div>");
        unfollow_col.attr("class","col-md-6 col-lg-6 col-xs-6 col-sm-6");
        var unfollow = $("<button></button>");
        unfollow.attr("class","btn btn-simple pull-right");

        if(isFollow){
            following.append("Following");

            unfollow.append("Unfollow");
        }else{
            following.append("Unfollowing");

            unfollow.append("Follow");
        }
        following_col.append(following);
        unfollow_col.append(unfollow);

        subrow.append(following_col, unfollow_col);
        buttonGroup.append(subrow);

        info.append(author, buttonGroup);

        card.append(bg, info);

        content.append(card);
        $("#user-card-panel").append(content);
    }
}
function show(type){
    var userExample = {
        // info = temp.identifier + "|" + "Level" + temp.level + " | " + "Points:" + temp.points + "|" + temp.sex + " | " + temp.place;
        login:"Zhang J.K",
        identifier:"Formal User",
        points:100,
        sex:"Female",
        place:"Beijing",
        level:"5",
        description:"Just King",
        isFollow:true,
        avatar_url:"../../WebContent/images/zsq.jpg"
    };

    var followerExample = {
        login:"Zhang J.K",
        identifier:"Formal User",
        points:100,
        sex:"Female",
        place:"Beijing",
        level:"5",
        description:"Just King",
        isFollow:false,
        avatar_url:"../../WebContent/images/zsq.jpg"
    };

     var  followingExample = {
         login:"Zhang J.K",
         identifier:"Formal User",
         points:100,
         sex:"Female",
         place:"Beijing",
         level:"5",
         description:"Just King",
         isFollow:true,
         avatar_url:"../../WebContent/images/zsq.jpg"
     };

     var friendExample = {
         login:"Zhang J.K",
         identifier:"Formal User",
         points:100,
         sex:"Female",
         place:"Beijing",
         level:"5",
         description:"Just King",
         isFollow:true,
         avatar_url:"../../WebContent/images/zsq.jpg"
     }
    userlist.push(userExample);
    userlist.push(userExample);
    userlist.push(userExample);
    userlist.push(userExample);
    userlist.push(userExample);
    userlist.push(userExample);
    userlist.push(userExample);
    userlist.push(userExample);
    userlist.push(userExample);

    followinglist.push(followingExample);
    followinglist.push(followingExample);
    followinglist.push(followingExample);
    followinglist.push(followingExample);
    followinglist.push(followingExample);
    followinglist.push(followingExample);
    followinglist.push(followingExample);
    followinglist.push(followingExample);
    followinglist.push(followingExample);

    followerlist.push(followerExample);
    followerlist.push(followerExample);
    followerlist.push(followerExample);
    followerlist.push(followerExample);
    followerlist.push(followerExample);
    followerlist.push(followerExample);
    followerlist.push(followerExample);
    followerlist.push(followerExample);
    followerlist.push(followerExample);

    friendlist.push(friendExample);
    friendlist.push(friendExample);
    friendlist.push(friendExample);
    friendlist.push(friendExample);
    friendlist.push(friendExample);
    friendlist.push(friendExample);
    friendlist.push(friendExample);
    friendlist.push(friendExample);
    friendlist.push(friendExample);

    loadUser(type);
}
// function searchVague(keyword) {
//     var user_url = "/Gitmining/user/search?user_key=" + keyword;
//
//     $.ajax(user_url, {
//         type : 'GET',

//         async : false,
//         success : function(data, textStatus) {
//             if (typeof (data) != "string") {
//                 numOfUser = getJsonLength(data);
//                 allpages_user = Math.ceil(numOfUser / recordNum);
//                 for (var i = 0; i < numOfUser; i++) {
//                     userlist[i] = data[i];
//                 }
//             }
//         }
//     });
//     loadUser();
// }


