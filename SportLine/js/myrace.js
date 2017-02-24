/**
 * Created by zsq on 2016/10/19.
 */
/**
 * Created by zsq on 2016/10/19.
 */
var recordNum = 10;
var numOfRace = 0;
var racelist = [];
var pages_race, curP_race = 0, allpages_race = 3;


function getJsonLength(data) {
    var length = 0;
    for ( var item in data) {
        length++;
    }
    return length;
}
function gotopage_Race(value,type) {
    if (value === "-1" && curP_race > 0) {
        curP_race--;
        writeRace(curP_race,type);
    }
    if (value === "1" && curP_race < allpages_race - 1) {
        curP_race++;
        writeRace(curP_race,type);
    }
}
function loadRace(type) {
    $("#table-panel").empty();
    $("#race_num").text("We have found " + numOfRace + " races.");
    //
    if (numOfRace == 0) {
        $("#pages").text("0/0");
        return;
    }

    writeRace(0,type);
}

function writeRace(pno,type) {

    if(type === "single"){
        $("#table-panel").empty();

        $("#pages").text((curP_race + 1) + "/" + allpages_race);
    }else if(type === "multiple"){
        $("#table-panel2").empty();

        $("#pages2").text((curP_race + 1) + "/" + allpages_race);
    }

    var i, temp, title,participant,starttime,endtime,bonus,join,sponor,leader,place;
    for (i = pno * recordNum; i < (pno + 1) * recordNum && i < numOfRace; i++) {

        temp = racelist[i];
        title = temp.title;
        participant = temp.num;
        starttime = temp.start_time;
        endtime = temp.end_time;
        bonus = temp.bonus;
        leader = temp.leader;
        place = temp.place;
        if(type === "single"){
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

            var th_bonus = $("<th></th>");
            th_bonus.append("Bonus");

            var th_place = $("<th></th>");
            th_place.append("Place");

            var th_leader = $("<th></th>");
            th_leader.attr("width","130px");
            th_leader.append("Leader");

            title_link.append(title);
            title_link.attr("href","../../template/race/RaceInformation.php?title=" + title + "&&join=1");
            th_title.append(title_link);
            tr1.append(th_title);
            tr1.append(th_participant);
            tr1.append(th_starttime);
            tr1.append(th_endtime);
            tr1.append(th_bonus);
            tr1.append(th_place);
            tr1.append(th_leader);

            var tr2 = $("<tr></tr>")
            var td_participant = $("<td></td>");
            var td_starttime = $("<td></td>");
            var td_endtime = $("<td></td>");
            var td_bonus = $("<td></td>");
            var td_place = $("<td></td>");
            var td_leader = $("<td></td>");
            var username_link = $("<a></a>");
            username_link.attr("href","../../template/user/Profile.php");
            td_leader.attr("class","username");

            td_participant.append(participant);
            td_starttime.append(starttime);
            td_endtime.append(endtime);
            td_bonus.append(bonus);
            td_place.append(place);
            username_link.append(leader);
            td_leader.append(username_link);


            tr2.append(td_participant);
            tr2.append(td_starttime);
            tr2.append(td_endtime);
            tr2.append(td_bonus);
            tr2.append(td_place);
            tr2.append(td_leader);

            $("#table-panel").append(tr1,tr2);

        }else{
            sponor = temp.sponor;
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

            var th_bonus = $("<th></th>");
            th_bonus.append("Bonus");

            var th_join = $("<th></th>");
            th_join.append("Join");

            var th_leader = $("<th></th>");
            th_leader.attr("width","130px");
            th_leader.append("Sponor");

            title_link.append(title);
            th_title.append(title_link);
            tr1.append(th_title);
            tr1.append(th_participant);
            tr1.append(th_starttime);
            tr1.append(th_endtime);
            tr1.append(th_bonus);
            tr1.append(th_join);
            tr1.append(th_leader);

            var tr2 = $("<tr></tr>")

            var td_participant = $("<td></td>");
            var td_starttime = $("<td></td>");
            var td_endtime = $("<td></td>");
            var td_bonus = $("<td></td>");
            var td_join = $("<td></td>");
            var td_leader = $("<td></td>");
            var username_link = $("<a></a>");
            td_leader.attr("class","username");


            td_participant.append(participant);
            td_starttime.append(starttime);
            td_endtime.append(endtime);
            td_bonus.append(bonus);
            td_join.append(join);
            username_link.append(sponor);
            td_leader.append(username_link);


            tr2.append(td_participant);
            tr2.append(td_starttime);
            tr2.append(td_endtime);
            tr2.append(td_bonus);
            tr2.append(td_join);
            tr2.append(td_leader);

            $("#table-panel2").append(tr1,tr2);

        }

    }
}

function show(type,state,own){

    $.ajax({
        url:"../../server/race/race.php",
        type:"post",
        data:{
            type:type,
            state:state,
            own:own
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            if(typeof(data) != "string"){
                numOfRace = getJsonLength(data);
                allpages_race = Math.ceil(numOfRace / recordNum);
                for(var i = 0 ;i < numOfRace; i++){
                    racelist[i] = data[i];
                }
            }
        }
    });
    loadRace(type);
}

function search(keyword,type,state,own){
    $.ajax({
        url: "../../server/race/race_find.php",
        type:"post",
        data:{
            key:keyword,
            type:type,
            state:state,
            own:own
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            if(typeof(data) != "string"){
                numOfRace = getJsonLength(data);
                allpages_race = Math.ceil(numOfRace/ recordNum);
                for(var i = 0 ;i < numOfRace; i++){
                    racelist[i] = data[i];
                }
            }
        }
    });
    loadRace(type);
}
