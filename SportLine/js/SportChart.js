/**
 * Created by zsq on 2016/10/13.
 */
$(document).ready(function(){
    var myChart = echarts.init(document.getElementById("distance_curve"));
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
            data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']
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
                data:[10,20,5,4,4,7,15],
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
            data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']
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
                data:[10,20,5,4,4,7,15],
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
            data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']
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
                data:[10,20,5,4,4,7,15],
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
            data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']
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
                data:[10,20,5,4,4,7,15],
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
});