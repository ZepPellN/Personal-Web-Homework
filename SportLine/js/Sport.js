/**
 * Created by zsq on 2016/11/30.
 */

function show(type){
    var temp1 = [],temp2 = [];
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:type,
            goal:'goal'
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp1 = data[0];
        }
    });
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:type,
            goal:'data'
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp2 = data[0];
        }
    });
    
    $("#distance_").val(temp1.distance);
    $("#time_").val(temp1.time);
    $("#calorie_").val(temp1.calorie);
    $("#step_").val(temp1.step);

    $("#_distance").html(temp2.distance +" km");
    $("#distance").attr("data-percent",temp2.dp);
    $("#distance").html(toDecimal(temp2.dp)+"%" );

    $("#_time").html(temp2.time +" hours");
    $("#time").attr("data-percent",temp2.tp);
    $("#time").html(toDecimal(temp2.tp)+"%" );

    $("#_calorie").html(temp2.calorie);
    $("#calorie").attr("data-percent",temp2.cp);
    $("#calorie").html(toDecimal(temp2.cp) +"%");

    $("#_step").html(temp2.step);
    $("#step").attr("data-percent",temp2.sp);
    $("#step").html(toDecimal(temp2.sp) +"%");

    $('#distance,#time,#step,#calorie').easyPieChart({
        lineWidth: 6,
        size: 160,
        scaleColor: false,
        trackColor: 'rgba(255,255,255,.25)',
        barColor: '#FFFFFF',
        animate: ({duration: 5000, enabled: true})
    });
}

function toDecimal(x) {
    var f = parseFloat(x);
    if (isNaN(f)) {
        return;
    }
    f = Math.round(x*100)/100;
    return f;
}

function  submit(type,distance,time,step,calorie){
    $.ajax({
        url:"../../server/user/user_sport_update.php",
        type:"post",
        data:{
            type:type,
            distance:distance,
            time:time,
            step:step,
            calorie:calorie
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){

        }
    });
}

function drawDistance(type){
    var temp,i;
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:"distance",
            state:type
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp = data;
        }
    });

    var myChart = echarts.init(document.getElementById("distance_curve"));
    var date= [];
    var datas = [];

    for(i = temp.length - 1;i >= 0;i--){
        date.push(temp[i].create_date);
        datas.push(temp[i].run_distance);
    }

    option = {
        title: {
            text: '',
            subtext: ''
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['Highest Distance']
        },
        toolbox: {
            show: true,
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                dataView: {readOnly: true},
                magicType: {type: ['line', 'bar']},
                restore: {},
                saveAsImage: {}
            }
        },
        xAxis:  {
            type: 'category',
            boundaryGap: false,
            data: date
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value} km'
            }
        },
        series: [
            {
                name:'Distance',
                type:'line',
                data:datas,
                markPoint: {
                    data: [
                        {name: 'The shortest a week', value: -2, xAxis: 1, yAxis: -1.5}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average'},
                        [{
                            symbol: 'none',
                            x: '90%',
                            yAxis: 'max'
                        }, {
                            symbol: 'circle',
                            label: {
                                normal: {
                                    position: 'start',
                                    formatter: 'Max'
                                }
                            },
                            type: 'max',
                            name: 'Highest Point'
                        }]
                    ]
                }
            }
        ]
    };
    myChart.setOption(option);
}

function drawTime(type){
    var temp ,i;
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:"time",
            state:type
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp = data;
        }
    });

    var date= [];
    var datas = [];
    for(i = temp.length - 1;i >= 0;i--){
        date.push(temp[i].create_date);
        datas.push(temp[i].run_time);
    }
    var myChart2 = echarts.init(document.getElementById("time_curve"));
    option = {
        title: {
            text: '',
            subtext: ''
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['Highest Hours']
        },
        toolbox: {
            show: true,
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                dataView: {readOnly: true},
                magicType: {type: ['line', 'bar']},
                restore: {},
                saveAsImage: {}
            }
        },
        xAxis:  {
            type: 'category',
            boundaryGap: false,
            data: date
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value} hours'
            }
        },
        series: [
            {
                name:'Hour',
                type:'line',
                data:datas,
                markPoint: {
                    data: [
                        {name: 'The shortest a week', value: -2, xAxis: 1, yAxis: -1.5}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average'},
                        [{
                            symbol: 'none',
                            x: '90%',
                            yAxis: 'max'
                        }, {
                            symbol: 'circle',
                            label: {
                                normal: {
                                    position: 'start',
                                    formatter: 'Max'
                                }
                            },
                            type: 'max',
                            name: 'Highest Point'
                        }]
                    ]
                }
            }
        ]
    };
    myChart2.setOption(option);
}

function drawStep(type){
    var temp ,i;
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:"step",
            state:type
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp = data;
        }
    });

    var date= [];
    var datas = [];
    for(i = temp.length - 1;i >= 0;i--){
        date.push(temp[i].create_date);
        datas.push(temp[i].run_step);
    }
    var myChart3 = echarts.init(document.getElementById("step_curve"));
    option = {
        title: {
            text: '',
            subtext: ''
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['Highest Steps']
        },
        toolbox: {
            show: true,
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                dataView: {readOnly: true},
                magicType: {type: ['line', 'bar']},
                restore: {},
                saveAsImage: {}
            }
        },
        xAxis:  {
            type: 'category',
            boundaryGap: false,
            data: date
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value} step'
            }
        },
        series: [
            {
                name:'Step',
                type:'line',
                data:datas,
                markPoint: {
                    data: [
                        {name: 'The shortest a week', value: -2, xAxis: 1, yAxis: -1.5}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average'},
                        [{
                            symbol: 'none',
                            x: '90%',
                            yAxis: 'max'
                        }, {
                            symbol: 'circle',
                            label: {
                                normal: {
                                    position: 'start',
                                    formatter: 'Max'
                                }
                            },
                            type: 'max',
                            name: 'Highest Point'
                        }]
                    ]
                }
            }
        ]
    };
    myChart3.setOption(option);

}

function drawCalorie(type){
    var temp ,i;
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:"calorie",
            state:type
        },
        async:false,
        dataType:'json',
        success:function(data,textStatus){
            temp = data;
        }
    });
    var date= [];
    var datas = [];
    for(i = 0;i <temp.length ;i++){
        date.push(temp[i].create_date);
        datas.push(temp[i].run_calorie);
    }
    var myChart4 = echarts.init(document.getElementById("calorie_curve"));
    option = {
        title: {
            text: '',
            subtext: ''
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['Highest Calorie']
        },
        toolbox: {
            show: true,
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                dataView: {readOnly: true},
                magicType: {type: ['line', 'bar']},
                restore: {},
                saveAsImage: {}
            }
        },
        xAxis:  {
            type: 'category',
            boundaryGap: false,
            data: date
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value} calorie'
            }
        },
        series: [
            {
                name:'Calorie',
                type:'line',
                data: datas,
                markPoint: {
                    data: [
                        {name: 'The shortest a week', value: -2, xAxis: 1, yAxis: -1.5}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average'},
                        [{
                            symbol: 'none',
                            x: '90%',
                            yAxis: 'max'
                        }, {
                            symbol: 'circle',
                            label: {
                                normal: {
                                    position: 'start',
                                    formatter: 'Max'
                                }
                            },
                            type: 'max',
                            name: 'Highest Point'
                        }]
                    ]
                }
            }
        ]
    };
    myChart4.setOption(option);
}
