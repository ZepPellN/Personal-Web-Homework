/**
 * Created by zsq on 2016/11/30.
 */
var recordNum = 10;
var numOfDynamic = 0;
var dynamiclist = [];

var pages_user, curP_dynamic = 0, allpages_dynamic = 0;

function gotopage_dynamic(value) {
    if (value == "-1" && curP_dynamic > 0) {
        curP_dynamic--;
        writeDynamic(curP_dynamic);
    }
    if (value == "1" && curP_dynamic < allpages_dynamic - 1) {
        curP_dynamic++;
        writeUser(curP_dynamic);
    }
}

function getJsonLength(data) {
    var length = 0;
    for ( var item in data) {
        length++;
    }
    return length;
}

function loadDynamic() {
    $("#dynamic-panel").empty();
    // $("#user-num").text("We have found " + numOfUser + " users");

    if (numOfDynamic == 0) {
        $("#pages").text("0/0");
        return;
    }

    writeDynamic(0);
}

function writeDynamic(pno){
    $("#pages").text((curP_dynamic + 1) + "/" + allpages_dynamic);

    var avatar,publisher,level,content,time;
    var i;
    for(i = pno * recordNum; i < (pno + 1) * recordNum && i < numOfDynamic; i++){

        var temp = dynamiclist[i];

        content = temp.content;
        time = temp.mdate;
        avatar = temp.avatar;

        publisher = temp.name;
        level = temp.level;
        
        var card = $("<div></div>");
        card.attr("class","card");
        var row = $("<row></row>");
        row.attr("class","row");
        var col_1 = $("<div></div>");
        var col_2 = $("<div></div>");
        var col_3 = $("<div></div>");
        col_1.attr("class","col-md-12 col-lg-12 col-sm-12 col-xs-12");
        col_2.attr("class","col-md-1 col-lg-1 col-sm-1 col-xs-2");
        col_3.attr("class","col-md-11 col-lg-11 col-sm-11 col-xs-10");
        //col_2
        var content_ = $("<div></div>");
        content_.attr("class","content");

        var author = $("<div></div>");
        author.attr("class","author");
        content_.append(author);
        col_2.append(content_);

        var avatar_link = $("<a></a>");
        author.append(avatar_link);
        var image_ = $("<img>");

        image_.attr({
           "class":"avatar border-white",
            "style":"position:relative;margin-left: -200%;",
            "src" :avatar
        });
        // $("img").css({
        //    "position":"relative",
        //     "margin-left":"-200%"
        // });
        avatar_link.append(image_);
        var name_ = $("<h5></h5>");
        name_.attr({
            "class":"title",
            "style":"position:relative;margin-left: -145%;margin-top:50%"
        });
        var small_ = $("<small></small>");
        small_.append(publisher);
        name_.append(small_);
        author.append(name_);

        var level_ = $("<h5></h5>");
        level_.attr("style","position:relative;margin-left: -145%;margin-top:35%");
        var small = $("<small></small>");
        small.append("Level:" + level);
        level_.append(small);
        author.append(level_);

        //col_3
        var form = $("<form></form>")
        form.attr("role","form");
        var fieldset = $("<fieldset></fieldset>");
        var form_group = $("<div></div>");
        form_group.attr("class","form-group");
        var info = $("<p></p>");
        info.attr({
            "style":"margin-top:2%"
        });
        info.append(content);
        form_group.append(info);
        fieldset.append(form_group);
        form.append(fieldset);

        var publish_time = $("<p></p>");
        publish_time.attr({
            "style":"position:relative;margin-top:10%"
        });
        var small = $("<small></small>");
        small.append(time);
        var button = $("<button></button>");
        button.attr("class","btn btn-default pull-right");
        button.append("Delete");
        publish_time.append(small);
        publish_time.append(button);
        col_3.append(form);
        col_3.append(publish_time);

        col_1.append(col_2);
        col_1.append(col_3);
        row.append(col_1);
        card.append(row);
        $("#dynamic-panel").append(card);
    }
}

function show(type){
    $.ajax({
        url: "../../server/dynamic/dynamic.php",
        type: "post",
        data: {
            type:type
        },
        async: false,
        dataType: 'json',
        success: function(data,textStatus){
            if(typeof(data) != "string"){
                numOfDynamic = getJsonLength(data);
                allpages_dynamic = Math.ceil(numOfDynamic / recordNum);
                for (var i = 0;i < numOfDynamic; i++){
                    dynamiclist[i] = data[i];
                }
            }
        }
    });
    loadDynamic();
}
function getQueryString(name){
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if(r != null){
        return unescape(r[2]);
    }
    return null;
}
function showInformation(type){
    var name = getQueryString("name");
    $.ajax({
        url: "../../server/dynamic/dynamic.php",
        type: "post",
        data: {
            type:type,
            name:name
        },
        async: false,
        dataType: 'json',
        success: function(data,textStatus){
            if(typeof(data) != "string"){
                numOfDynamic = getJsonLength(data);
                allpages_dynamic = Math.ceil(numOfDynamic / recordNum);
                for (var i = 0;i < numOfDynamic; i++){
                    dynamiclist[i] = data[i];
                }
            }
        }
    });
    loadDynamic();
}