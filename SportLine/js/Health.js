/**
 * Created by zsq on 2016/11/30.
 */

function show(type){
    var temp = [] ;
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:type
        },
        async:false,
        dataType:"json",
        success:function(data,textStatus){
            temp = data[0];
        }
    });
    $("#weight_").val(temp.weight);
    $("#height_").val(temp.height);
    $("#ws").val(temp.walking_step);
    $("#rs").val(temp.running_step);
    $("#bmi_val").text(temp.bmi);
    $("#idealWeight").text(temp.standard_weight + "kg!");
}

function drawWeight(type){
    var temp = [];
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:type,
        },
        async:false,
        dataType:"json",
        success:function(data,textStatus){
            temp = data;
        }
    });
    var myChart2 = echarts.init(document.getElementById("weight"));
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
            data: [temp[6].create_date,temp[5].create_date,temp[4].create_date,temp[3].create_date,temp[2].create_date,temp[1].create_date,temp[0].create_date]
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value} kg'
            }
        },
        series: [
            {
                name:'Weight',
                type:'line',
                data:[temp[6].weight,temp[5].weight,temp[4].weight,temp[3].weight,temp[2].weight,temp[1].weight,temp[0].weight],
                markPoint: {
                    data: [
                        {type: 'max', name: 'Max Value'},
                        {type: 'min', name: 'Min Value'}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average Value'}
                    ]
                }
            }
        ]
    };
    myChart2.setOption(option);
}

function drawHeight(type){
    var temp = [];
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:type,
        },
        async:false,
        dataType:"json",
        success:function(data,textStatus){
            temp = data;
        }
    });
    var myChart = echarts.init(document.getElementById("height"));
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
            data: [temp[6].create_date,temp[5].create_date,temp[4].create_date,temp[3].create_date,temp[2].create_date,temp[1].create_date,temp[0].create_date]
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value} cm'
            }
        },
        series: [
            {
                name:'Height',
                type:'line',
                data:[temp[6].height,temp[5].height,temp[4].height,temp[3].height,temp[2].height,temp[1].height,temp[0].height],
                markPoint: {
                    data: [
                        {type: 'max', name: 'Max Value'},
                        {type: 'min', name: 'Min Value'}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average Value'}
                    ]
                }
            }
        ]
    };
    myChart.setOption(option);

}

function drawBP(type){
    var temp = [];

    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:type,
        },
        async:false,
        dataType:"json",
        success:function(data,textStatus){
            temp = data;
        }
    });


    var myChart = echarts.init(document.getElementById("bp"));
    option = {
        title: {
            text: '',
            subtext: ''
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['Heart Beat']
        },
        toolbox: {
            show: true,
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                dataView: {readOnly: false},
                magicType: {type: ['line', 'bar']},
                restore: {},
                saveAsImage: {}
            }
        },
        xAxis:  {
            type: 'category',
            boundaryGap: false,
            data: [temp[6].create_date,temp[5].create_date,temp[4].create_date,temp[3].create_date,temp[2].create_date,temp[1].create_date,temp[0].create_date]
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value}'
            }
        },
        series: [
            {
                name:'BPH',
                type:'line',
                data:[temp[6].bph,temp[5].bph,temp[4].bph,temp[3].bph,temp[2].bph,temp[1].bph,temp[0].bph],
                markPoint: {
                    data: [
                        {type: 'max', name: 'Max Value'},
                        {type: 'min', name: 'Min Value'}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average Value'}
                    ]
                }
            },
            {
                name:'BPL',
                type:'line',
                data:[temp[6].bpl,temp[5].bpl,temp[4].bpl,temp[3].bpl,temp[2].bpl,temp[1].bpl,temp[0].bpl],
                markPoint: {
                    data: [
                        {type: 'max', name: 'Max Value'},
                        {type: 'min', name: 'Min Value'}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average Value'}
                    ]
                }
            }

        ]
    };
    myChart.setOption(option);
}

function drawHR(type){
    var temp = [];
    $.ajax({
        url:"../../server/user/user.php",
        type:"post",
        data:{
            type:type,
        },
        async:false,
        dataType:"json",
        success:function(data,textStatus){
            temp = data;
        }
    });
    var myChart = echarts.init(document.getElementById("hr"));
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
            data: [temp[6].create_date,temp[5].create_date,temp[4].create_date,temp[3].create_date,temp[2].create_date,temp[1].create_date,temp[0].create_date]
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value} cm'
            }
        },
        series: [
            {
                name:'Height',
                type:'line',
                data:[temp[6].hr,temp[5].hr,temp[4].hr,temp[3].hr,temp[2].hr,temp[1].hr,temp[0].hr],
                markPoint: {
                    data: [
                        {type: 'max', name: 'Max Value'},
                        {type: 'min', name: 'Min Value'}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average Value'}
                    ]
                }
            }
        ]
    };
    myChart.setOption(option);

}