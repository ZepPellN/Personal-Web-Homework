/**
 * Created by zsq on 2016/11/30.
 */
function submit(text){
    $.ajax({
        url:"../../server/dynamic/dynamic_add.php",
        type:"post",
        data:{
           info:text
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
           
        }
    });
}