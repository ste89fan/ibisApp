$(document).ready(function(){

$(".fa-eye").on("click",function(){
    $(this).toggleClass;
    let type = $("#password").attr("type");
    if(type=="text") {
        $("#password").prop("type","password");
    } else {
        $("#password").prop("type","text");
    }
});

var logOut = $(".logout-button");
var applyBtn = $(".apply-filters");
var macField = $("#mac");
var macForm = $(".mac-form");
var generateMacId = $(".generate-mac-id");
var macNavbar = $(".mac-navbar");
var contractField = $("#contract");
var applyFilters = $(".apply-filters-field");
var resetBtnArea = $(".reset-btn-area");
resetBtnArea.hide();
var highCharCont = $(".highchart-container");
highCharCont.hide();
var ulForFields = $(".ul-for-fields");

// NE RADI,PROUCITI STA NE FUNKCIONISE !!!!

// LoginBtn.on("click",function() {
//     $.ajax({
//         method:"POST",
//         url: "users_model/macIP.php",
//         data: "json",
//         success:function(result) {
//             let res = JSON.parse(result);
//             $(res).each(function(i,data) {
//                 macField.easyAutocomplete(data["mac"]);
//             })
//         }
//     })
// })


generateMacId.on("click",function(e) {
    e.preventDefault();
    var regexp = /^(([A-Fa-f0-9]{2}[:]){5}[A-Fa-f0-9]{2}[,]?)+$/i;
    
    $.ajax({
        method:"POST",
        url: "users_model/macIP.php",
        data: "json",
        success:function(result) {
            let res = JSON.parse(result);
                 $(res).each(function(i,data) {

                    if(macField.val()!="" && macField.val()===data["mac"] && regexp.test(macField.val())) {

                        contractField.val(data["contract_id"]);
                        macField.val();
                    }
               
                    if(contractField.val()===data["contract_id"]) {
                        macField.val(data["mac"]);
                           
                    }                                   
                })
            }   
        })
    })

    

    applyBtn.on("click",function() {
        if(macField.val()==="" || contractField.val()==="") {
            location.reload();
        } else {
            resetBtnArea.show();
            applyFilters.hide();
            macField.hide();
            contractField.hide();
            macNavbar.addClass("d-flex flex-row-reverse justify-content-between").append(`<div class='info-data bg-white d-flex flex-column'><span style='color:blue'>Currently viewing data :</span><p>Mac address : <span style='color:blue'>${macField.val()}</span></p><p>Contract ID : <span style='color:blue'>${contractField.val()}</span></p></div>`);
            macForm.addClass("d-flex justify-content-end");
            highCharCont.show();
            ulForFields.removeClass("w-100");
        }
    })

    resetBtnArea.on("click",function() {
        resetBtnArea.hide();
        applyFilters.show();
        macField.show();
        contractField.show();
        $(".info-data").remove();
        ulForFields.addClass("w-100");
        highCharCont.hide();
    })

    // HIGH CHARTS CODE

    Highcharts.chart('first-chart', {

        chart: {
            scrollablePlotArea: {
                minWidth: 700
            }
        },
           
        data: {
            csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
            beforeParse: function (csv) {
                return csv.replace(/\n\n/g, '\n');
            }
        },
    
        title: {
            text: 'Daily sessions'
        },
    
        subtitle: {
            text: 'Daily users sessions'
        },
    
        xAxis: {
            tickInterval: 7 * 24 * 3600 * 1000, // one week
            tickWidth: 0,
            gridLineWidth: 1,
            labels: {
                align: 'left',
                x: 3,
                y: -3
            }
        },
    
        yAxis: [{ // left y axis
            title: {
                text: null
            },
            labels: {
                align: 'left',
                x: 3,
                y: 16,
                format: '{value:.,0f}'
            },
            showFirstLabel: false
        }, { // right y axis
            linkedTo: 0,
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: null
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                format: '{value:.,0f}'
            },
            showFirstLabel: false
        }],
    
        legend: {
            align: 'left',
            verticalAlign: 'top',
            borderWidth: 0
        },
    
        tooltip: {
            shared: true,
            crosshairs: true
        },
    
        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function (e) {
                            hs.htmlExpand(null, {
                                pageOrigin: {
                                    x: e.pageX || e.clientX,
                                    y: e.pageY || e.clientY
                                },
                                headingText: this.series.name,
                                maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                    this.y + ' sessions',
                                width: 200
                            });
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },
    
        series: [{
            name: 'All sessions',
            lineWidth: 4,
            marker: {
                radius: 4
            }
        }, {
            name: 'New users'
        }]
    });

    //SECOND CHART CODE

    Highcharts.chart('second-chart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Average Temperature'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });

    //THIRD CHART

    $.getJSON(
        'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json',
        function (data) {
    
            Highcharts.chart('third-chart', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'USD to EUR exchange rate over time'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: 'Exchange rate'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },
    
                series: [{
                    type: 'area',
                    name: 'USD to EUR',
                    data: data
                }]
            });
        }
    );

    // FOURTH CHART

    Highcharts.chart('fourth-chart', {
        chart: {
            type: 'spline',
            inverted: true
        },
        title: {
            text: 'Atmosphere Temperature by Altitude'
        },
        subtitle: {
            text: 'According to the Standard Atmosphere Model'
        },
        xAxis: {
            reversed: false,
            title: {
                enabled: true,
                text: 'Altitude'
            },
            labels: {
                format: '{value} km'
            },
            maxPadding: 0.05,
            showLastLabel: true
        },
        yAxis: {
            title: {
                text: 'Temperature'
            },
            labels: {
                format: '{value}°'
            },
            lineWidth: 2
        },
        legend: {
            enabled: false
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br/>',
            pointFormat: '{point.x} km: {point.y}°C'
        },
        plotOptions: {
            spline: {
                marker: {
                    enable: false
                }
            }
        },
        series: [{
            name: 'Temperature',
            data: [[0, 15], [10, -50], [20, -56.5], [30, -46.5], [40, -22.1],
                [50, -2.5], [60, -27.7], [70, -55.7], [80, -76.5]]
        }]
    });
    
})
