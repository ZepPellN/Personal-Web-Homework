/**
 * Created by zsq on 2016/12/1.
 */
var avatar_url = "";
function show(){
    var temp = [];
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:"info"
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp = data[0];
        }
    });
    $("#avatar").attr("src",temp.avatar);
    $("#username").val(temp.name);
    $("#email").val(temp.email);
    $("#password").val(temp.pass);
    $("#birthday").val(temp.birthday);
    $("#province").val(temp.province);
    $("#city").val(temp.city);
    $("#profile").val(temp.motto);
    if(temp.sex === 0){
        $("#male").addClass("checked");
    }else if(temp.sex === 1){
        $("#female").addClass("checked");
    }
    avatar_url = temp.avatar;
}

function submit(){
    var name =  $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var birthday = $("#birthday").val();
    var province = $("#province").val();
    var city = $("#city").val();
    var profile = $("#profile").val();
    if($("#male").hasClass("checked")){
        var gender = 0;
    }else{
        var gender = 1;
    }
    $.ajax({
        url:"../../server/user/user_update.php",
        type:"post",
        data:{
            username:name,
            email:email,
            password:password,
            province:province,
            birthday:birthday,
            city:city,
            profile:profile,
            avatar:avatar_url,
            gender:gender
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){

        }
    });
}
function getQueryString(name){
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if(r != null){
        return unescape(r[2]);
    }
    return null;
}

function show_user_information(){
    var name = getQueryString("name");
    var sign = getQueryString("sign");
    if(sign === "0"){
        $("#follow1").text("Unfollowing");
        $("#follow2").text("Follow");
        $("#follow2").addClass("follow");
    }else{
        $("#follow1").text("Following");
        $("#follow2").text("Unfollow");
        $("#follow2").addClass("unfollow");
    }

    $("#follow2").click(function(){
        alert("click");
        if($("#follow2").hasClass("follow")){
            alert("follow");
            $.ajax({
                url:"../../server/user/user_operation.php",
                type:"post",
                data:{
                    type:"follow",
                    name: name
                },
                async:false,
                dataType:'json',
                success:function(data,textStatus){

                }
            });
            $("#follow1").text("Following");
            $("#follow2").text("Unfollow");
            $("#follow2").removeClass("follow");
            $("#follow2").addClass("unfollow");
        }else if($("#follow2").hasClass("unfollow")){
            alert("unfollow");
            $.ajax({
                url:"../../server/user/user_operation.php",
                type:"post",
                data:{
                    type:"unfollow",
                    name: name
                },
                async:false,
                dataType:'json',
                success:function(data,textStatus){

                }
            });
            $("#follow1").text("Unfollowing");
            $("#follow2").text("Follow");
            $("#follow2").removeClass("unfollow");
            $("#follow2").addClass("follow");
        }

    });
    var temp = [];
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:"userinfo",
            name:name
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp = data[0];
        }
    });
    $("#avatar").attr("src",temp.avatar);
    $("#username").val(temp.name);
    $("#email").val(temp.email);
    $("#birthday").val(temp.birthday);
    $("#province").val(temp.province);
    $("#city").val(temp.city);
    $("#profile").val(temp.motto);
    if(temp.sex === 0){
        $("#sex").val("male");
    }else if(temp.sex === 1){
        $("#sex").val("female");
    }
}
