/**
 * Created by zsq on 2016/11/29.
 */

var avatarlist = [];
var numOfAvatar;
function getQueryString(name){
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if(r != null){
        return unescape(r[2]);
    }
    return null;
}

function getJsonLength(data) {
    var length = 0;
    for ( var item in data) {
        length++;
    }
    return length;
}

function showInformation(){

    var title  = getQueryString("title");

    $.ajax({
        url: "../../server/activity/activity_information.php",
        type: "post",
        data: {
            title:title,
            type:"info"
        },
        async: false,
        dataType: 'json',
        success: function(data,textStatus){
            var temp = data[0];
            var starttime = temp.start_time;
            var endtime = temp.end_time;
            var place = temp.place;
            var bonus = temp.bonus;
            var description = temp.info;
            $("#starttime").text(starttime);
            $("#endtime").text(endtime);
            $("#place").text(place);
            $("#bonus").text(bonus);
            $("#description").text(description);

        }
    });

    $.ajax({
        url:"../../server/activity/activity_information.php",
        type :"post",
        data:{
            title :title,
            type : "member"
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
             if(typeof(data) != "string"){
                numOfAvatar = getJsonLength(data);
                for (var i = 0;i < numOfAvatar; i++){
                    avatarlist[i] = data[i];
                }
            }

        }
    });
    writeMember();
}

function writeMember(){
    $("#member").empty();
    var i, length;
    if(avatarlist.length > 9){
        length = 9;
    }else{
        length = avatarlist.length;
    }
    for(i = 0;i < length; i++){

        var avatar_url = avatarlist[i].avatar;

        var col = $("<div></div>")
        var content = $("<div></div>");
        var author = $("<div></div>");
        var avatar = $("<a></a>");
        var img = $("<img>");

        col.attr("class","col-md-1 col-lg-1 col-sm-1 col-xs-2");
        content.attr("class","content");
        author.attr("class","author");
        avatar.attr("target","_blank");
        img.attr({
            "src": avatar_url,
            "class": "avatar border-white",
            "style": "background-color: white;margin-left: -180%;",
            "href":"#"
        });
        avatar.append(img);
        author.append(avatar);
        content.append(author);
        col.append(content);
        $("#member").append(col);
    }

    if(getQueryString("join") === "1"){
        var joined = $("<button></button>");
        joined.attr({
            "class":"btn btn-simple pull-right",
            "id":"joined"
        });
        joined.append("joined");
        $("#member").append(joined);
        $("#joined").attr("disabled","disable");

    }else if(getQueryString("join") === "0"){
        var join = $("<button></button>");
        join.attr({
            "class":"btn btn-default pull-right",
            "type":"submit",
            "id":"join"
        });
        join.append("Join");
        $("#member").append(join);
        $("#join").click(function(){
            joinActivity();
            $("#join").text("joined");
            $("#join").attr({
                "class":"btn btn-simple pull-right",
                "disabled":"disable"
            });
        });
    }
}




function joinActivity(){
    var title = getQueryString("title");

    $.ajax({
        url:'../../server/activity/activity_operation.php',
        type:"post",
        data: {
            title: title,
            op:"join"
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            alert(data);
        }
    });
}
