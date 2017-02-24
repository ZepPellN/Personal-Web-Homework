/**
 * Created by zsq on 2016/10/19.
 */
var vagueName;
var recordNum = 5;
var numOfActivity = 15;
var activitylist = [];
var pages_activity, curP_activity = 0, allpages_activity = 3;

var TREASURE_MAX = 20;


function getJsonLength(data) {
    var length = 0;
    for ( var item in data) {
        length++;
    }
    return length;
}
function gotopage_Activity(value) {
    if (value == "-1" && curP_activity > 0) {
        curP_activity--;
        writeActivity(curP_activity);
    }
    if (value == "1" && curP_activity < allpages_activity - 1) {
        curP_activity++;
        writeActivity(curP_activity);
    }
}
function loadActivity(type) {
    $("#table-panel").empty();
    $("#activity_num").text("We have found " + 15 + " activities.");
    //
    if (numOfActivity == 0) {
        $("#pages").text("0/0");
        return;
    }

    writeActivity(0,type);
}

function writeActivity(pno,type) {

    $("#table-panel").empty();
    $("#pages").text((curP_activity + 1) + "/" + allpages_activity);


    var i, temp, title,participant,starttime,endtime,place,bonus,level,join,leader;
    for (i = pno * recordNum; i < (pno + 1) * recordNum && i < numOfActivity; i++) {
        temp = activitylist[i];
        title = temp.title;
        participant = temp.participant;
        starttime = temp.starttime;
        endtime = temp.endtime;
        place = temp.place;
        bonus = temp.bonus;
        level = temp.level;
        leader = temp.leader;

        if(type === "my"){
            var tr1 = $("<tr></tr>");
            var th_title = $("<th></th>");
            th_title.attr("rowspan",2);
            var title_link = $("<a></a>");

            var th_participant = $("<th></th>");
            th_participant.append("Participant");

            var th_starttime = $("<th></th>");
            th_starttime.append("Start Time");

            var th_endtime = $("<th></th>");
            th_endtime.append("End Time");

            var th_place = $("<th></th>");
            th_place.append("Place");

            var th_bonus = $("<th></th>");
            th_bonus.append("Bonus");

            var th_level = $("<th></th>");
            th_level.append("Level");

            var th_leader = $("<th></th>");
            th_leader.attr("width","130px");
            th_leader.append("Leader");

            title_link.append(title);
            th_title.append(title_link);
            tr1.append(th_title);
            tr1.append(th_participant);
            tr1.append(th_starttime);
            tr1.append(th_endtime);
            tr1.append(th_place);
            tr1.append(th_bonus);
            tr1.append(th_level);
            tr1.append(th_leader);

            var tr2 = $("<tr></tr>")

            var td_participant = $("<td></td>");
            var td_starttime = $("<td></td>");
            var td_endtime = $("<td></td>");
            var td_place = $("<td></td>");
            var td_bonus = $("<td></td>");
            var td_level = $("<td></td>");
            var td_leader = $("<td></td>");
            var username_link = $("<a></a>");
            td_leader.attr("class","username");


            td_participant.append(participant);
            td_starttime.append(starttime);
            td_endtime.append(endtime);
            td_place.append(place);
            td_bonus.append(bonus);
            td_level.append(level);
            username_link.append(leader);
            td_leader.append(username_link);


            tr2.append(td_participant);
            tr2.append(td_starttime);
            tr2.append(td_endtime);
            tr2.append(td_place);
            tr2.append(td_bonus);
            tr2.append(td_level);
            tr2.append(td_leader);

            $("#table-panel").append(tr1,tr2);

        }else{
            join = temp.join;
            var tr1 = $("<tr></tr>");
            var th_title = $("<th></th>");
            th_title.attr("rowspan",2);
            var title_link = $("<a></a>");

            var th_participant = $("<th></th>");
            th_participant.append("Participant");

            var th_starttime = $("<th></th>");
            th_starttime.append("Start Time");

            var th_endtime = $("<th></th>");
            th_endtime.append("End Time");

            var th_place = $("<th></th>");
            th_place.append("Place");

            var th_bonus = $("<th></th>");
            th_bonus.append("Bonus");

            var th_level = $("<th></th>");
            th_level.append("Level");

            var th_join = $("<th></th>");
            th_join.append("Join");

            var th_leader = $("<th></th>");
            th_leader.attr("width","130px");
            th_leader.append("Leader");

            title_link.append(title);
            th_title.append(title_link);
            tr1.append(th_title);
            tr1.append(th_participant);
            tr1.append(th_starttime);
            tr1.append(th_endtime);
            tr1.append(th_place);
            tr1.append(th_bonus);
            tr1.append(th_level);
            tr1.append(th_join);
            tr1.append(th_leader);

            var tr2 = $("<tr></tr>")

            var td_participant = $("<td></td>");
            var td_starttime = $("<td></td>");
            var td_endtime = $("<td></td>");
            var td_place = $("<td></td>");
            var td_bonus = $("<td></td>");
            var td_level = $("<td></td>");
            var td_join = $("<td></td>");
            var td_leader = $("<td></td>");
            var username_link = $("<a></a>");
            td_leader.attr("class","username");


            td_participant.append(participant);
            td_starttime.append(starttime);
            td_endtime.append(endtime);
            td_place.append(place);
            td_bonus.append(bonus);
            td_level.append(level);
            td_join.append(join);
            username_link.append(leader);
            td_leader.append(username_link);


            tr2.append(td_participant);
            tr2.append(td_starttime);
            tr2.append(td_endtime);
            tr2.append(td_place);
            tr2.append(td_bonus);
            tr2.append(td_level);
            tr2.append(td_join);
            tr2.append(td_leader);

            $("#table-panel").append(tr1,tr2);

        }

        }
    }

function show(type) {
    var activityExample = {
        title:"Bend it like Zhang J.K",
        participant:30,
        starttime:"2016-10-15",
        endtime:"2016-10-20",
        place:"NJU",
        bonus:"100 golds",
        level:"1",
        join:"Joined",
        leader:"Zhang J.K"

    };
    var activityExample2 = {
        title:"Black Mamba",
        participant:5,
        starttime:"2016-10-15",
        endtime:"2016-10-20",
        place:"NJU",
        bonus:"100 golds",
        level:"1",
        join:"Joined",
        leader:"Kobe Bryant"
    }
    var activityExample3 = {
        title:"F1 Sukuza GP",
        participant:22,
        starttime:"2016-10-15",
        endtime:"2016-10-20",
        place:"Sukuza",
        bonus:"100 golds",
        level:"1",
        join:"Joined",
        leader:"Lewis Hamilton"
    }
    activitylist.push(activityExample);
    activitylist.push(activityExample2);
    activitylist.push(activityExample3);
    activitylist.push(activityExample3);
    activitylist.push(activityExample2);
    activitylist.push(activityExample);
    activitylist.push(activityExample3);
    activitylist.push(activityExample);
    activitylist.push(activityExample2);
    activitylist.push(activityExample2);
    activitylist.push(activityExample3);
    activitylist.push(activityExample);
    activitylist.push(activityExample);
    activitylist.push(activityExample2);
    activitylist.push(activityExample3);
    // var user_url = "/Gitmining/user/search?user_key=" + keyword;
    //
    // $.ajax(user_url, {
    //     type : 'GET',
    //

    //     async : false,
    //     success : function(data, textStatus) {
    //         if (typeof (data) != "string") {
    //             numOfUser = getJsonLength(data);
    //             allpages_user = Math.ceil(numOfUser / recordNum);
    //             for (var i = 0; i < numOfUser; i++) {
    //                 userlist[i] = data[i];
    //             }
    //         }
    //     }
    // });
    loadActivity(type);
}


